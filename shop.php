<?php

require 'includes/php_header.php';
 
include $root_path.'/includes/html_header.php';
require $root_path. '/includes/html_user_header.php';
?>
<main class="my-8">
    <div class="flex flex-wrap">
        <div class="w-1/5">
            <?php include $root_path . '/includes/sidebar_categories.php'; ?>
        </div>
        <div class="w-4/5"> 
            <h1 class="text-2xl font-bold">
                <?php echo isset($_GET['category'])
                    ? htmlspecialchars(
                        $_GET['category'], 
                        ENT_QUOTES, 
                        'UTF-8'
                    )
                    : 'SHOP' 
                ?>
            </h1>
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
    
                <?php 
                    $sql = "
                    SELECT * FROM products WHERE 1";
                    if (isset($_GET['category_id'])) {
                        $sql .= " 
                        AND category_id = '" . $_GET['category_id'] . "'";
                    }
                    $results = $db->query($sql);
                    while ($product = $db->fetch_assoc($results)) { 
                ?>
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <a href="product.php?id=<?php echo $product['id']; ?>" class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('https://picsum.photos/id/<?php echo $product['id']; ?>0/200')">
                            <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </button>
                        </a>
                        <div class="px-5 py-3">
                            <a href="product.php?id=<?php echo $product['id']; ?>" class="block text-gray-700 uppercase">
                                <?php echo $product['product_name']; ?>
                            </a>
                            <span class="text-gray-500 mt-2">
                                $ <?php echo $product['price']; ?>
                            </span>
                        </div>
                    </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
</main>
<?php 
include $root_path.'/includes/html_footer.php'; 
?>

