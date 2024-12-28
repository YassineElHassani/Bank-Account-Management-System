<?php
require_once "./classes/accountManger.php";
require_once "./classes/savingsAccount.php";
require_once "./classes/currentAccount.php";
require_once "./classes/businessAccount.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $accountType = $_POST['accountType'];
    $customerName = $_POST['customerName'];
    $balance = (float)$_POST['balance'];
    $manager = new AccountManager();

    try {
        if ($accountType === 'savings') {
            $interest = (float)$_POST['interest'];
            $account = new SavingsAccount($customerName, $balance, $interest);
        } elseif ($accountType === 'current') {
            $overdraftLimit = (float)$_POST['overdraftLimit'];
            $account = new CurrentAccount($customerName, $balance, $overdraftLimit);
        } elseif ($accountType === 'business') {
            $transactionFee = (float)$_POST['transactionFee'];
            $account = new BusinessAccount($customerName, $balance, $transactionFee);
        } else {
            throw new Exception("Invalid account type selected.");
        }

        $manager->addData($account);
        $message = "Account added successfully!";
    } catch (Exception $e) {
        $error = "Error: " . $e->getMessage();
    }
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

    <div class="container mx-auto my-10 p-5 bg-white shadow-lg rounded-md">
        <h1 class="text-2xl font-bold mb-5">Add New Bank Account</h1>

        <?php if (!empty($message)): ?>
            <div class="bg-green-100 text-green-700 p-3 rounded mb-5">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php elseif (!empty($error)): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-5">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form action="addBankAccount.php" method="POST">
            <div class="mb-4">
                <label for="customerName" class="block font-medium">Customer Name</label>
                <input type="text" name="customerName" id="customerName" required 
                       class="w-full border border-gray-300 rounded p-2">
            </div>

            <div class="mb-4">
                <label for="balance" class="block font-medium">Initial Balance</label>
                <input type="number" step="0.01" name="balance" id="balance" required 
                       class="w-full border border-gray-300 rounded p-2">
            </div>

            <div class="mb-4">
                <label for="accountType" class="block font-medium">Account Type</label>
                <select name="accountType" id="accountType" required 
                        class="w-full border border-gray-300 rounded p-2">
                    <option value="" disabled selected>Select Account Type</option>
                    <option value="savings">Savings Account</option>
                    <option value="current">Current Account</option>
                    <option value="business">Business Account</option>
                </select>
            </div>

            <div id="savingsFields" class="hidden mb-4">
                <label for="interest" class="block font-medium">Interest Rate</label>
                <input type="number" step="0.01" name="interest" id="interest" 
                       class="w-full border border-gray-300 rounded p-2">
            </div>

            <div id="currentFields" class="hidden mb-4">
                <label for="overdraftLimit" class="block font-medium">Overdraft Limit</label>
                <input type="number" step="0.01" name="overdraftLimit" id="overdraftLimit" 
                       class="w-full border border-gray-300 rounded p-2">
            </div>

            <div id="businessFields" class="hidden mb-4">
                <label for="transactionFee" class="block font-medium">Transaction Fee</label>
                <input type="number" step="0.01" name="transactionFee" id="transactionFee" 
                       class="w-full border border-gray-300 rounded p-2">
            </div>

            <div class="flex items-center justify-end space-x-4">
                <a href="./index.php">
                    <button type="button" class="py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </button>
                </a>
                <button type="submit" name="submit" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Create Account
                </button>
            </div>
        </form>
    </div>
    <script src="./script/script.js"></script>
</body>
</html>