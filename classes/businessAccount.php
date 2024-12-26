<?php
require_once '../config/db_conn.php';

class businessAccount extends account{
    
    public function __construct($accountNumber, $accountName, $balance) {
        $this->accountNumber = new $accountNumber;
        $this->accountName = new $accountName;
        $this->balance = new $balance;

    }
}

?>