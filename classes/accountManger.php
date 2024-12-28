<?php
require_once "./config/db_conn.php";
require_once "businessAccount.php";
require_once "currentAccount.php";
require_once "savingsAccount.php";

class AccountManager {
    private $conn;

    function __construct() {
        $this->conn = pdo;
    }

    public function addData(Account $account) {
        $stmt = $this->conn->prepare("INSERT INTO account (customerName, balance)
                                      VALUES (:customerName, :balance)");

        $stmt->execute([
            ':customerName' => $account->getName(),
            ':balance' => $account->getBalance()
        ]);

        $lastID = $this->conn->lastInsertId();

        if ($account instanceof SavingsAccount) {
            $stmt = $this->conn->prepare("INSERT INTO savingsAccount (accountID, interest) 
                                          VALUES (:account_id, :interest)");
            $stmt->execute([
                ':account_id' => $lastID,
                ':interest' => $account->getInterest()
            ]);
        } elseif ($account instanceof CurrentAccount) {
            $stmt = $this->conn->prepare("INSERT INTO currentAccount (accountID, overdraftLimit) 
                                          VALUES (:account_id, :overdraftLimit)");
            $stmt->execute([
                ':account_id' => $lastID,
                ':overdraftLimit' => $account->getOverdraftLimit()
            ]);
        } elseif ($account instanceof BusinessAccount) {
            $stmt = $this->conn->prepare("INSERT INTO businessAccount (accountID, transactionFee) 
                                          VALUES (:account_id, :transactionFee)");
            $stmt->execute([
                ':account_id' => $lastID,
                ':transactionFee' => $account->getTransactionFee()
            ]);
        }
    }

    public function displayData() {
        $stmt = $this->conn->prepare("SELECT account.id, account.customerName, account.balance, 
                                      CASE 
                                          WHEN businessAccount.accountID IS NOT NULL THEN 'Business Account' 
                                          WHEN currentAccount.accountID IS NOT NULL THEN 'Current Account'
                                          WHEN savingsAccount.accountID IS NOT NULL THEN 'Savings Account'
                                      END AS accountType
                                      FROM account
                                      LEFT JOIN businessAccount ON account.id = businessAccount.accountID
                                      LEFT JOIN currentAccount ON account.id = currentAccount.accountID
                                      LEFT JOIN savingsAccount ON account.id = savingsAccount.accountID");
    
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function editData($id, Account $account) {
        $stmt = $this->conn->prepare("UPDATE account 
                                      SET customerName = :customerName, balance = :balance 
                                      WHERE id = :id");

        $stmt->execute([
            ':customerName' => $account->getName(),
            ':balance' => $account->getBalance(),
            ':id' => $id
        ]);

        if ($account instanceof SavingsAccount) {
            $stmt = $this->conn->prepare("UPDATE savingsAccount 
                                          SET interest = :interest 
                                          WHERE accountID = :account_id");
            $stmt->execute([
                ':interest' => $account->getInterest(),
                ':account_id' => $id
            ]);
        } elseif ($account instanceof CurrentAccount) {
            $stmt = $this->conn->prepare("UPDATE currentAccount 
                                          SET overdraftLimit = :overdraftLimit 
                                          WHERE accountID = :account_id");
            $stmt->execute([
                ':overdraftLimit' => $account->getOverdraftLimit(),
                ':account_id' => $id
            ]);
        } elseif ($account instanceof BusinessAccount) {
            $stmt = $this->conn->prepare("UPDATE businessAccount 
                                          SET transactionFee = :transactionFee 
                                          WHERE accountID = :account_id");
            $stmt->execute([
                ':transactionFee' => $account->getTransactionFee(),
                ':account_id' => $id
            ]);
        }
    }

    public function deleteData($id) {
        $stmt = $this->conn->prepare("DELETE FROM account WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}

?>
