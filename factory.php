<?php

interface PaymentGatewayInterface{
    public function createSlip();
    public function payNow();
}

class PaymentGateway implements PaymentGatewayInterface
{
    public function createSlip()
    {
        echo 'Creating Slip';
    }
    public function payNow()
    {
        echo 'Paying Now';
    }
}

class KBZPaymentGateway extends PaymentGateway
{
    public function createSlip()
    {
        echo 'Hello, I am Creating Slip For KBZ';
    }
    public function payNow()
    {
        echo 'Paying Now for KBZ';
    }  
}

class YomaPaymentGateway extends PaymentGateway
{
    public function createSlip()
    {
        echo 'Hello , i am creating slip for Yoma';
    }
    public function payNow()
    {
        echo 'Paying Now for Yoma';
    }
}

class PaymentGenerator
{
    public function generatePayment($method)
    {
        switch($method)
        {
            case 'kbz':
                return new KBZPaymentGateway();
                break;
            case 'yoma':
                return new YomaPaymentGateway();
                break;
            default : 
                throw new Exception('Invalid Payment');
        }
    }
}

$method = 'yoma';
$paymentMethod = (new PaymentGenerator())->generatePayment($method);
'Create Slip Method ' . '=>' . $paymentMethod->createSlip();
echo '<br/><br/>';
'Payment Method' . '=>' . $paymentMethod->payNow();

