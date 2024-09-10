<?php 
 class BankAccount 
 {
     public $balance;

     public function __construct($balance = 1500) 
     {
         $this->balance = $balance;
     }


     public function deposit($amount) 
     {
         $this->balance += $amount;
         return true;
     }

     public function withdraw($amount) 
     {
         if ($amount <= $this->balance) {
             $this->balance -= $amount;
             return true;
         }
         return false;
     }


     public function getBalance() 
     {
         return $this->balance;
     }


 }