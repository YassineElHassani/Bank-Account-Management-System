<?php
require_once './config/db_conn.php';

class account {
    protected $account_id;
    protected $customerName;
    protected $balance;

    public function __construct($customerName, $balance){

        $this->customerName = $customerName;
        $this->balance = $balance;
        
    }

    public function getID() {
        return $this->account_id;
    }

    public function setID($newID) {
        $this->account_id = $newID;
    }

    public function getName() {
        return $this->customerName;
    }

    public function setName($newName) {
        $this->customerName = $newName;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function setBalance($newBalance) {
        $this->balance = $newBalance;
    }

}

?>