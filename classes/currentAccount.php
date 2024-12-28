<?php
require_once 'account.php';

class currentAccount extends account {

    private $overdraftLimit;

    public function __construct($customerName, $balance, $overdraftLimit) {
        parent::__construct($customerName, $balance);
        $this->overdraftLimit = $overdraftLimit;
    }

    public function getOverdraftLimit() {
        return $this->overdraftLimit;
    }

    public function setOverdraftLimit($newOverdraftLimit) {
        $this->overdraftLimit = $newOverdraftLimit;
    }

}

?>