<?php

require('config.php');

session_start();

require('razorpay-php-2.8.6/Razorpay.php');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;
$error = "Payment Failed";
print_r($_POST);
if (empty($_POST['razorpay_payment_id']) === false) {
    $api = new Api($Key_Id, $Key_Secret);

    try {
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    } catch (SignatureVerificationError $e) {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true) {
    $status = "success";
    // also add the payment price which is successfull
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>
             <p>Order ID: {$_SESSION['razorpay_order_id']}</p>
             <p>Signature: {$_POST['razorpay_signature']}</p>
             <p>Email: {$_SESSION['email']}</p>
             <p>Price: {$_SESSION['price']}</p>";
} else {
    $status = "failed";
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

try {
    $query = "INSERT INTO `razorpay-php`(`price`, `status`, `email`, `razorpay_order_id`, `razorpay_payment_id`, `razorpay_signature`) 
        VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $query);

    mysqli_stmt_bind_param($stmt, "ssssss", $_SESSION['price'], $status, $_SESSION['email'], $_SESSION['razorpay_order_id'], $_POST['razorpay_payment_id'], $_POST['razorpay_signature']);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Data Recorded Successfully";
    } else {
        echo "Data Recording Failed";
    }

    mysqli_stmt_close($stmt);
} catch (Exception $e) {
    print_r($e);
}

echo $html;
