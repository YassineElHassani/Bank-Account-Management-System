<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Account Management System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Bar -->
            <div class="bg-white shadow-sm">
                <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                    <h2 class="text-xl font-semibold">Bank Account Management</h2>
                    <div class="flex items-center space-x-4">
                        <a href="./addBankAccount.php" ><button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">+ New Account</button></a>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="container mx-auto px-6 py-8">
                <!-- Account Type Filters -->
                <div class="flex space-x-4 mb-6">
                    <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-lg">All Accounts</span>
                </div>
