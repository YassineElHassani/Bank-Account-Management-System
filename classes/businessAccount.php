<?php
require_once 'account.php';

class businessAccount extends account{
    
    private $transactionFee;

    public function __construct($customerName, $balance, $transactionFee) {
        parent::__construct($customerName, $balance);
        $this->transactionFee = $transactionFee;
    }

    public function getTransactionFee() {
        return $this->transactionFee;
    }

    public function setTransactionFee($newTransactionFee) {
        $this->transactionFee = $newTransactionFee;
    }

}

?>