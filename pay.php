<title>Razorpay payment</title>
<?php

require 'config.php';
require 'razorpay-php-2.8.6/Razorpay.php';
session_start();
use Razorpay\Api\Api;

try {

    $api = new Api($Key_Id, $Key_Secret);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $amount = $_POST['price'];

    $_SESSION['email'] = $email;
    $_SESSION['price'] = $amount;

    echo "Name: " . $name . "<br>" . "Email: " . $email . "<br>" . "Contact: " . $contact . "<br>" . "Amount: " . $amount . "<br>";
    $orderData = [
        'receipt' => '123',
        'amount' => $amount * 100,
        'currency' => 'INR',
        'payment_capture' => 1
    ];
    $razorpayOrder = $api->order->create($orderData);
    $razorpayOrderId = $razorpayOrder['id'];
    $_SESSION['razorpay_order_id'] = $razorpayOrderId;
    $displayAmount = $amount = $orderData['amount']; 
    if ($displayCurrency !== 'INR') {
        $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
        $exchange = json_decode(file_get_contents($url), true);
        $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
    }
    $checkout = 'manual';
    $data = [
        "key_id" => $Key_Id,
        "amount" => $amount,
        "name" => "Razorpay-Praveen",
        "description" => "Test Transaction",
        "image" => "https://www.razorpay.com/favicon.png",
        "prefill" => [
            "name" => $name,
            "email" => $email,
            "contact" => $contact,
        ],
        "notes" => [
            "address" => "Hello World",
            "merchant_order_id" => "12312321",
        ],
        "theme" => [
            "color" => "#F37254"
        ],
        "order_id" => $razorpayOrderId,
    ];

    if ($displayCurrency !== 'INR') {
        $data['display_currency'] = $displayCurrency;
        $data['display_amount'] = $displayAmount;
    }

    $json = json_encode($data);

    require("checkout/{$checkout}.php");
} catch (Exception $e) {
    echo $e->getMessage();
}
?>