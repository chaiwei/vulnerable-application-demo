<table class="min-w-full table-auto">
    <thead class="justify-between">
        <tr class="bg-gray-800">
            <th class="px-16 py-2">
                <span class="text-gray-300">Date</span>
            </th>
            <th class="px-16 py-2">
                <span class="text-gray-300">Description</span>
            </th>
            <th class="px-16 py-2">
                <span class="text-gray-300">Amount</span>
            </th> 
        </tr>
    </thead>
    <tbody class="bg-gray-200">
        <?php
            $sql = "
            SELECT * FROM wallets
            WHERE user_id = '" . $_SESSION['user_id'] . "'";
            $results = $db->query($sql);
            $wallet = $db->fetch_assoc($results);

            $sql = "
            SELECT * FROM wallet_transactions 
            WHERE wallet_id = '" . $wallet['id'] . "'";
            $results = $db->query($sql);
            while ($row = $db->fetch_assoc($results)) {

        ?>
        <tr class="bg-white border-4 border-gray-200 text-center">
            <td class="px-5 py-2 ">
                <?php echo $row['date'] ?>
            </td>
            <td class="px-5 py-2">
                <?php echo $row['description'] ?>
            </td>
            <td class="px-5 py-2">
                <?php echo ($row['amount'] > 0)
                    ? '+' . $row['amount']
                    : $row['amount']
                ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>