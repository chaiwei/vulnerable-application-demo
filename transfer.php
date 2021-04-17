<?php

require 'includes/php_header.php';

if (! isset($_SESSION['user_id'])) {
    header('Location: login.php');
}

 
if (isset($_POST['submit'])) {
    
    $sql = "
    SELECT * FROM wallets 
    WHERE user_id = '". $_SESSION['user_id']."'";
    $result = $db->query($sql);
    $user_wallet = $db->fetch_assoc($result);

    $sql = "
    SELECT * FROM users 
    WHERE username = '". $_POST['username']."'";
    $recipient_result = $db->query($sql);
    $recipient = $db->fetch_assoc($recipient_result);

    $sql = "
    SELECT * FROM wallets 
    WHERE user_id = '". $recipient['id']."'";
    $recipient_wallet_result = $db->query($sql);
    $recipient_wallet = $db->fetch_assoc($recipient_wallet_result);

    $errors = array();

    if (! $recipient) {
        $errors[] = 'Unable to identified recipient ' . $_POST['username'];
    }
    if ($_POST['amount'] > $user_wallet['amount']) {
        $errors[] = 'Amount exceeded your balance';
    } 
         
    if ($errors) {
        echo '<script>alert(`'. implode("\n", $errors) .'`);</script>';
    } else {
        // no errors

        $sql = "
        UPDATE wallets SET amount = '" . ($user_wallet['amount'] - $_POST['amount']) . "'
        WHERE user_id = '" . $_SESSION['user_id'] . "'";
        $db->query($sql);

        $sql = "
        UPDATE wallets SET amount = '" . ($recipient_wallet['amount'] + $_POST['amount']) . "'
        WHERE user_id = '" . $recipient['id'] . "'";
        $db->query($sql);

        $sql = "
        INSERT INTO wallet_transactions (date, wallet_id, amount, description)
        VALUES ( 
            NOW(), 
            '".$user_wallet['id']."', 
            '". ($_POST['amount'] * -1) ."', 
            '" . $_POST['description'].  "' 
        )";
        $db->query($sql);

        $sql = "
        INSERT INTO wallet_transactions (date, wallet_id, amount, description)
        VALUES ( 
            NOW(), 
            '".$recipient_wallet['id']."', 
            '". ($_POST['amount']) ."', 
            'Transfer from " . $user['username'] . "'
        )";
        $db->query($sql);

        header('Location: index.php?transfer=success');
        exit();
    }
}

$_SESSION['csrf_token'] = md5(rand(100000,999999));

include $root_path.'/includes/html_header.php';
require $root_path. '/includes/html_user_header.php';
?>
<div class="max-w-lg max-w-xs bg-gray-100 shadow-2xl rounded-lg mx-auto text-center py-12 mt-4 rounded-xl">
    <h1 class="text-gray-800 text-center font-extrabold -mt-3 text-3xl">Transfer</h1>
    <div class="container py-5 max-w-md mx-auto">
        <form method="post" action="">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?>" />
            <div class="mb-4">
                <input placeholder="Recipient Username"
                    class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="username" type="text">
            </div>
            <div class="mb-4">

                <input placeholder="Amount"
                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="amount" type="number">

            </div>
            <div class="mb-6">

                <textarea placeholder="Description"
                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    name="description"></textarea>

            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    name="submit" type="submit">
                    Transfer
                </button> 
            </div>
        </form>
    </div>
</div>
<?php 
include $root_path.'/includes/html_footer.php'; 
?>
