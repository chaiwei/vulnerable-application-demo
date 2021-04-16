<?php

require 'includes/php_header.php';

if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
}
 
if (isset($_POST['submit'])) {
    
    $sql = "
    SELECT * FROM users 
    WHERE username = '". $_POST["username"]."'
    AND password = '".md5($_POST["password"])."'";
    $result = $db->query($sql);

    if ($db->num_rows($result) > 0) { 
        $user = $db->fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        header('Location: index.php');
    } else {
        echo '<script>alert("Invalid User");</script>';
    }
}

include $root_path.'/includes/html_header.php';
require $root_path. '/includes/html_user_header.php';
?>
<div class="max-w-lg max-w-xs bg-blue-800 shadow-2xl rounded-lg mx-auto text-center py-12 mt-4 rounded-xl">
    <h1 class="text-gray-200 text-center font-extrabold -mt-3 text-3xl">Login</h1>
    <div class="container py-5 max-w-md mx-auto">
        <form method="post" action="">
            <div class="mb-4">
                <input placeholder="Username"
                    class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="username" type="text">
            </div>
            <div class="mb-6">

                <input placeholder="Password"
                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    name="password" type="password">

            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    name="submit" type="submit">
                    Sign In
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-gray-400 " href="#">
                    Forgot Password?
                </a>
            </div>
        </form>
    </div>
</div>
<?php 
include $root_path.'/includes/html_footer.php'; 
?>