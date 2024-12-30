<?php
require_once "./classes/accountManger.php";

$manager = new AccountManager();
$delete = $manager->deleteData($_GET['id']);

if (!isset($_GET['id'])) {
    die("Account ID is required.");
}

session_start();
$_SESSION['delete_msg'] = true;
header('Location: index.php?success');
exit();
?>