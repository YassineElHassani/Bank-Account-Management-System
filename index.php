<?php
require_once "./classes/accountManger.php";

$manager = new AccountManager();
$account = $manager->displayData();

?>

<?php
include './layout/header.php'
?>

<table class="min-w-full">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Account Number</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Account Type</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Balance</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
    <?php 
        $i = 0;
        while ($i < count($account)): ?>
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4"><?php echo htmlspecialchars($account[$i]['id']) ?></td>
                <td class="px-6 py-4"><?php echo htmlspecialchars($account[$i]['customerName']) ?></td>
                <td class="px-6 py-4"><?php echo htmlspecialchars($account[$i]['accountType']) ?></td>
                <td class="px-6 py-4"><?php echo htmlspecialchars($account[$i]['balance']) ?></td>
                <td class="px-6 py-4">
                    <button class="focus:outline-none bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900"><img src="./assest/editing.png" alt="edit" height="20px" width="20px"></button>
                    <button class="focus:outline-none bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><img src="./assest/delete.png" alt="delete" height="20px" width="20px"></button>
                </td>
            </tr>
        <?php 
        $i++;
        endwhile; ?>
    </tbody>
</table>


<?php
include './layout/footer.php'
?>