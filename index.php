<?php
require_once "./classes/accountManger.php";

$manager = new AccountManager();
$account = $manager->displayData();

session_start();
if (isset($_SESSION['edit_msg']) && $_SESSION['edit_msg'] === true) {
    $editMessage = "Account updated successfully!";
    unset($_SESSION['edit_msg']);
}

if (isset($_SESSION['delete_msg']) && $_SESSION['delete_msg'] === true) {
    $deleteMessage = "Account deleted successfully!";
    unset($_SESSION['delete_msg']);
}


?>

<?php
include './layout/header.php'
?>

<?php if (!empty($editMessage)): ?>
    <div class="bg-green-100 text-green-700 p-3 rounded mb-5">
        <?= htmlspecialchars($editMessage) ?>
    </div>
<?php endif; ?>

<?php if (!empty($deleteMessage)): ?>
    <div class="bg-green-100 text-green-700 p-3 rounded mb-5">
        <?= htmlspecialchars($deleteMessage) ?>
    </div>
<?php endif; ?>

<!-- Accounts Table -->
<div class="bg-white rounded-lg shadow overflow-hidden">

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
                    <a href="editBankAccount.php?id=<?php echo htmlspecialchars($account[$i]['id']); ?>">
                        <button class=" focus:outline-none bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900"><img src="./assets/editing.png" alt="edit" height="20px" width="20px"></button>
                    </a>

                    <a href="deleteBankAccount.php?id=<?php echo htmlspecialchars($account[$i]['id']); ?>">
                        <button class="focus:outline-none bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><img src="./assets/delete.png" alt="delete" height="20px" width="20px"></button>
                    </a>
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