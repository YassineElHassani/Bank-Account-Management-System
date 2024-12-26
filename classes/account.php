<?php
require_once '../config/db_conn.php';

class account {

    // protected $accountType;
    protected $accountName;
    protected $balance;

    public function __construct($accountName, $balance){

        // $this->accountType = $accountType;
        $this->accountName = $accountName;
        $this->balance = $balance;
        
    }
    

    // public function getAccountNumber() {
    //     return $this-> accountNumber;
    // }

    // public function getAccountName() {
    //     return $this-> accountName;
    // }

    // public function getBalance() {
    //     return $this-> balance;
    // }
}

// $account = new account(1, 'tessst', 20.1);

// echo $account->getAccountName();

?>