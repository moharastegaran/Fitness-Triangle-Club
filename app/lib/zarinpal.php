<?php
namespace App\lib;
use nusoap_client;
use Illuminate\Support\Str;

class zarinpal
{
    public $MerchantID;
    public function __construct()
    {
        $this->MerchantID=env('MERCHANT_ID');
    }
    public function pay($CallbackURL,$Amount,$Email,$Mobile)
    {
        if (env('ZARINPAL_IS_MOCKED')) {
            return $CallbackURL.'?Authority='.Str::uuid().'&Status=100';
        }

        $Description = 'خرید برنامه تمرینی-غذایی سایت ftc pro';  // Required
//        $CallbackURL = session()->pull('redirect'); // Required


        $client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
        $client->soap_defencoding = 'UTF-8';
        $result = $client->call('PaymentRequest', [
            [
                'MerchantID'     => $this->MerchantID,
                'Amount'         => $Amount,
                'Description'    => $Description,
                'Email'          => $Email,
                'Mobile'         => $Mobile,
                'CallbackURL'    => $CallbackURL,
            ],
        ]);

        //Redirect to URL You can do it also by creating a for  m

        if($result['Status'] == 100){
            return 'https://www.zarinpal.com/pg/StartPay/'.$result['Authority'];
        } else {
            return false;
        }
    }
}
?>