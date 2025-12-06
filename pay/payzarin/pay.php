<?php

$MerchantID = '';//مریچنت زرین پال
$Amount = $_GET['amount']; 
$Description = 'خرید اشتراک ویژه در ربات چت گرام';
$Email = '';
$Mobile = '';
$CallbackURL = $_GET['callback'];


$client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

$result = $client->PaymentRequest(
[
'MerchantID' => $MerchantID,
'Amount' => $Amount,
'Description' => $Description,
'Email' => $Email,
'Mobile' => $Mobile,
'CallbackURL' => $CallbackURL,
]
);

if ($result->Status == 100) {
Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority);
} else {
echo'ERR: '.$result->Status;
}
?>