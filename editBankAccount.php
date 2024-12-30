<?php
require_once "./classes/accountManger.php";

$manager = new AccountManager();

if (!isset($_GET['id'])) {
    die("Account ID is required.");
}

$accountID = intval($_GET['id']);

$accountDetails = $manager->getAccountById($accountID);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerName = $_POST['customerName'];
    $balance = floatval($_POST['balance']);
    $accountType = $_POST['accountType'];
    $specificDetail = $_POST['specificDetail'];

    $manager->editData($accountID, $customerName, $balance, $accountType, $specificDetail);

    session_start();
    $_SESSION['edit_msg'] = true;
    header('Location: index.php?success');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Bank Account</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Top Bar -->
    <div class="bg-white shadow-sm">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold">Bank Account Management</h2>
        </div>
    </div>

<div class="max-w-2xl mx-auto mt-8 p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6">Edit Account</h2>

    <form method="POST" class="space-y-4">
        <div>
            <label for="customerName" class="block text-sm font-medium text-gray-700">Customer Name</label>
            <input type="text" id="customerName" name="customerName" value="<?= htmlspecialchars($accountDetails['customerName']) ?>" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
        </div>
        
        <div>
            <label for="balance" class="block text-sm font-medium text-gray-700">Balance</label>
            <input type="number" step="0.01" id="balance" name="balance" value="<?= htmlspecialchars($accountDetails['balance']) ?>" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
        </div>

        <div>
            <label for="accountType" class="block text-sm font-medium text-gray-700">Account Type</label>
            <select id="accountType" name="accountType" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                <option value="Savings" <?= $accountDetails['accountType'] === 'Savings Account' ? 'selected' : '' ?>>Savings Account</option>
                <option value="Current" <?= $accountDetails['accountType'] === 'Current Account' ? 'selected' : '' ?>>Current Account</option>
                <option value="Business" <?= $accountDetails['accountType'] === 'Business Account' ? 'selected' : '' ?>>Business Account</option>
            </select>
        </div>

        <div>
            <label for="specificDetail" class="block text-gray-700">
                <?php if ($accountDetails['accountType'] === 'Savings Account'): ?>
                    Interest Rate:
                <?php elseif ($accountDetails['accountType'] === 'Current Account'): ?>
                    Overdraft Limit:
                <?php else: ?>
                    Transaction Fee:
                <?php endif; ?>
            </label>
            <input type="number" step="0.01" id="specificDetail" name="specificDetail" 
                   value="<?= htmlspecialchars($accountDetails['specificDetail']) ?>" 
                   class="w-full p-2 border rounded-md" required>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="index.php" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                Cancel
            </a>
            <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                Update Account
            </button>
        </div>
    </form>
</div>

<?php include './layout/footer.php'; ?>