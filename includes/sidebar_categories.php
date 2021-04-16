<?php
 
$sql = "
SELECT * FROM categories";
$results = $db->query($sql);
?>
<h3 class="mb-6 font-bold">Categories</h3>
<ul>
    <?php while ($category = $db->fetch_assoc($results)) { ?>
        <li class="w-full mb-2">
            <a href="shop.php?category_id=<?php echo $category['id'] . '&category=' . $category['category']; ?>">
                <?php echo $category['category']; ?>
            </a>
        </li>
    <?php } ?>
</ul>