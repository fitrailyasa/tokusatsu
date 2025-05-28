<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class WhatsappHelper
{
    public static function sendMessage($message)
    {
        $token = env('WHATSAPP_TOKEN');
        $phoneId = env('WHATSAPP_PHONE_ID');
        $recipient = env('WHATSAPP_RECIPIENT');
        $url = "https://graph.facebook.com/v22.0/{$phoneId}/messages";

        return Http::withToken($token)->post($url, [
            "messaging_product" => "whatsapp",
            "to" => $recipient,
            "type" => "text",
            "text" => [
                "body" => strip_tags($message),
            ],
        ]);
    }
}
