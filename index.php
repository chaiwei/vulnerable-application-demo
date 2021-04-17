<?php

require 'includes/php_header.php';

if (! isset($user)) {
    header('Location: login.php');
}

$sql = "
SELECT * FROM wallets WHERE user_id = '".$user_id."'";
$results = $db->query($sql);
$wallet = $db->fetch_assoc($results);

include $root_path.'/includes/html_header.php';
require $root_path. '/includes/html_user_header.php';
?>
<div class="flex flex-col md:flex-row justify-center">
    <div class="md:w-11/12">
        <div class="flex md:flex-row space-x-8">
            <div class="shadow-md p-4">
                <div class="">
                    <div class="flex flex-col">
                        <div class="flex space-x-8 w-56">
                            <div class="">
                                <div class="uppercase text-sm text-gray-400">
                                    Wallet Balance
                                </div>
                                <div class="mt-1">
                                    <div class="flex space-x-2 items-center">
                                        <div class="text-2xl">
                                            $ <?php echo $wallet['amount']; ?>
                                        </div>
                                         
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <svg class="h-16 w-20 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>                                
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <a href="transfer.php" class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
                    Transfer
                </a>
            </div>
        </div>
        <div class="mt-8 w-full">
            <?php include $root_path . '/includes/wallet_transaction_tables.php'; ?>
        </div>
    </div>
</div>
<?php 
include $root_path.'/includes/html_footer.php'; 
?>