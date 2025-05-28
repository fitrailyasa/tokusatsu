<?php

namespace App\Observers;

use App\Models\Data;
use App\Helpers\TelegramHelper;
use App\Helpers\WhatsappHelper;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;

class DataObserver
{
    public function created(Data $model)
    {
        $message = "<b>📦 Data Created</b>\n<pre>" .
            "ID         : {$model->id}\n" .
            "Name       : {$model->name}\n" .
            "Category   : " . ($model->category->name ?? '-') . "\n" .
            "Era        : " . ($model->category->era->name ?? '-') . "\n" .
            "Franchise  : " . ($model->category->franchise->name ?? '-') . "\n" .
            "Created At : {$model->created_at}</pre>";

        TelegramHelper::sendMessage($message);
        WhatsappHelper::sendMessage($message);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NotificationMail('Data Created', $message));
    }

    public function updated(Data $model)
    {
        $message = "<b>✏️ Data Updated</b>\n<pre>" .
            "ID         : {$model->id}\n" .
            "Name       : {$model->name}\n" .
            "Category   : " . ($model->category->name ?? '-') . "\n" .
            "Era        : " . ($model->category->era->name ?? '-') . "\n" .
            "Franchise  : " . ($model->category->franchise->name ?? '-') . "\n" .
            "Updated At : {$model->updated_at}</pre>";

        TelegramHelper::sendMessage($message);
        WhatsappHelper::sendMessage($message);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NotificationMail('Data Updated', $message));
    }

    public function deleted(Data $model)
    {
        $message = "<b>🗑 Data Deleted</b>\n<pre>" .
            "ID         : {$model->id}\n" .
            "Name       : {$model->name}\n" .
            "Category   : " . ($model->category->name ?? '-') . "\n" .
            "Era        : " . ($model->category->era->name ?? '-') . "\n" .
            "Franchise  : " . ($model->category->franchise->name ?? '-') . "\n" .
            "Deleted At : {$model->deleted_at}</pre>";

        TelegramHelper::sendMessage($message);
        WhatsappHelper::sendMessage($message);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NotificationMail('Data Deleted', $message));
    }
}
