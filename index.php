<?php
require './config/db_conn.php';

session_start();
if(isset($_SESSION['msg']) === true) {
    echo "All fields are required!!";
    unset($_SESSION['msg']);
}

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
        <tr class="hover:bg-gray-50">
            <td class="px-6 py-4">AC-2024-001</td>
            <td class="px-6 py-4">John Doe</td>
            <td class="px-6 py-4">Savings Account</td>
            <td class="px-6 py-4">$5,280.00</td>
            <td class="px-6 py-4">
                <button class="text-blue-600 hover:text-blue-800">Edit</button>
                <button class="text-red-600 hover:text-red-800 ml-4">Delete</button>
            </td>
        </tr>
        <tr class="hover:bg-gray-50">
            <td class="px-6 py-4">AC-2024-002</td>
            <td class="px-6 py-4">Jane Smith</td>
            <td class="px-6 py-4">Current Account</td>
            <td class="px-6 py-4">$12,750.00</td>
            <td class="px-6 py-4">
                <button class="text-blue-600 hover:text-blue-800">Edit</button>
                <button class="text-red-600 hover:text-red-800 ml-4">Delete</button>
            </td>
        </tr>
        <tr class="hover:bg-gray-50">
            <td class="px-6 py-4">AC-2024-003</td>
            <td class="px-6 py-4">Tech Corp Ltd</td>
            <td class="px-6 py-4">Business Account</td>
            <td class="px-6 py-4">$45,920.00</td>
            <td class="px-6 py-4">
                <button class="text-blue-600 hover:text-blue-800">Edit</button>
                <button class="text-red-600 hover:text-red-800 ml-4">Delete</button>
            </td>
        </tr>
    </tbody>
</table>


<?php
include './layout/footer.php'
?>

<center><label for="role">Choose your role:</label>
        <select name="role" id="role">
            <?php 
                $stmt = $pdo->prepare('SELECT * FROM role');
                $stmt->execute();
                $result = $stmt->fetchAll();

                foreach($result as $row) {
                    echo "<option value='$row[id]'>$row[role]</option>";
                }
            ?>
        </select></center><br>
        <center><button type="submit">Register</button></center>