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

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full space-y-10 bg-white p-8 rounded-lg shadow">
            <!-- Header -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 text-center">Add New Bank Account</h2>
                <p class="mt-2 text-center text-gray-600">Fill in the details to create a new bank account</p>
            </div>

            <!-- Form -->
            <form class="mt-8 space-y-6" method="POST" action="./classes/accountManager.php">
                <!-- Account Type Section -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Account Information</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Account Type</label>
                            <select name="accountType" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select account type</option>
                                <option value="savings">Savings Account</option>
                                <option value="current">Current Account</option>
                                <option value="business">Business Account</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Amount</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input name="balance" type="number" class="pl-7 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="0.00">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customer Information Section -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Customer Information</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input name="accountName" type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-4">
                    <a href="./index.php">
                        <button type="button" class="py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </button>
                    </a>
                    <button type="submit"  class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Create Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>