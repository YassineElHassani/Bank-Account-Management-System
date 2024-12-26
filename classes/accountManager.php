<?php
require_once '../config/db_conn.php';
include 'account.php';


class accountManager extends account{

    public function add() {
        global $pdo;
        $ts = new account($_POST['accountName'], $_POST['balance']);
        
        $stmt = $pdo->prepare("INSERT INTO account (customerName, balance)
                                    VALUES (:accountName, :balance)");
        $stmt->execute([
            ':accountName' => $ts->accountName,
            ':balance' => $ts->balance
        ]);
    }

    // public function display() {
    //     global $pdo;
    //     $stmt = $pdo->prepare("SELECT id, customerName, balance, transactionFee, overdraftLimit, interest FROM account 
    //                                 JOIN businessaccount ON account.id = businessaccount.accountID
    //                                 JOIN currentaccount ON account.id = currentaccount.accountID
    //                                 JOIN savingsaccount ON account.id = savingsaccount.accountID");
    //     $stmt->execute([
    //         ':id' => $id,
    //         ':customerName' => $accountName,
    //         ':balance' => $balance,
    //         ':transactionFee' => $transactionFee,
    //         ':overdraftLimit' => $overdraftLimit,
    //         ':interest' => $interest

    //     ]);
        
    // }
}

// $push = new accountManager();

// global $pdo;
// $ts = new account($_POST['accountName'], $_POST['balance']);

// $stmt = $pdo->prepare("INSERT INTO account (customerName, balance)
//                             VALUES (:accountName, :balance)");
// $stmt->execute([
//     ':accountName' => $ts->accountName,
//     ':balance' => $ts->balance
// ]);


// print_r($ts->accountName);

?>