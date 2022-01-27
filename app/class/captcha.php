<?php

class Captcha
{
    public static function isCaptchaOk($response)
    {
        $secretKey = (SITE_URL == URL_PROD) ? "6LcyDSwdAAAAAJlaG5eb6Z4-gL2LhuocvVf-rIHv" : "6LcV_ysdAAAAAF9l1j_Li5Smzr0dBu-xA1qbB2O_";
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) . '&response=' . urlencode($response);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response, true);
        if ($responseKeys["success"]) {
            return true;
        } else {
            return false;
        }
    }
}