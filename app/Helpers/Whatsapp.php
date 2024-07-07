<?php

namespace App\Helpers;

class Whatsapp
{

    public static function sendMessage($phone, $content)
    {
        $authKey = "enter your authKey";
        $message = $content;
        $mobileNumber = $phone;
        $url = "https://wapi.co.in/sendMessage.php";
        $postData = array(
            'AUTH_KEY' => $authKey,
            'phone' => $mobileNumber,
            'message' => urlencode($message)
        );
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
        ));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $output = curl_exec($ch);
    }
}
