<?php
require_once 'account.php';

class savingsAccount extends account {

    private $interest;

    public function __construct($customerName, $balance, $interest) {
        parent::__construct($customerName, $balance);
        $this->interest = $interest;
    }

    public function getInterest() {
        return $this->interest;
    }

    public function setInterest($newInterest) {
        $this->interest = $newInterest;
    }

}

?>