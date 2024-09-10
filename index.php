<?php 

require_once 'class/BankAccount.php';

session_start();

$_SESSION['account'] ??= new BankAccount();
$account = $_SESSION['account'];
$balance = $account->getBalance();
$message = '';

if (!empty($_POST['action']) && isset($_POST['amount'])) {
    $amount = $_POST['amount'];
    $action = $_POST['action'];

    if ($action === 'deposit') {
        $account->deposit($amount);
        $message = "Deposited $amount BDT!";
    } elseif ($action === 'withdraw' && $account->withdraw($amount)) {
        $message = "Withdraw $amount BDT!";
    } else {
        $message = "Insufficient balance!";
    }

    $balance = $account->getBalance();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BankAccount WithDraw || Ashikur Rahman </title>

    <!-- 
    -CSS Links 
    -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="account-container">
        <h1>Bank Account</h1>
        <form method="POST">
            <input  type="number" name="amount" placeholder="Enter Amount to Withdraw" required />
            <button type="submit" name="action" value="deposit">Deposit</button>
            <button type="submit" name="action" value="withdraw">Withdraw</button>
        </form>

        <div class="balance-card">
            Current Balance: <?php echo isset($balance) ? $balance : 1500; ?> BDT
        </div>
    </div>

     <!-- Popup Message -->
     <div id="popupMessage" class="popup">
        <?= isset($message) ? $message : ''; ?>
    </div>

    <!-- 
    -JS Links 
    -->

    <script src="js/script.js"></script>
</body>
</html>