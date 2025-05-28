<?php

namespace App\Observers;

use App\Models\Franchise;
use App\Helpers\TelegramHelper;
use App\Helpers\WhatsappHelper;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;

class FranchiseObserver
{
    public function created(Franchise $model)
    {
        $message = "<b>📦 Franchise Created</b>\n<pre>" .
            "ID         : {$model->id}\n" .
            "Name       : {$model->name}\n" .
            "Created At : {$model->created_at}</pre>";

        TelegramHelper::sendMessage($message);
        WhatsappHelper::sendMessage($message);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NotificationMail('Franchise Created', $message));
    }

    public function updated(Franchise $model)
    {
        $message = "<b>✏️ Franchise Updated</b>\n<pre>" .
            "ID         : {$model->id}\n" .
            "Name       : {$model->name}\n" .
            "Updated At : {$model->updated_at}</pre>";

        TelegramHelper::sendMessage($message);
        WhatsappHelper::sendMessage($message);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NotificationMail('Franchise Updated', $message));
    }

    public function deleted(Franchise $model)
    {
        $message = "<b>🗑 Franchise Deleted</b>\n<pre>" .
            "ID         : {$model->id}\n" .
            "Name       : {$model->name}\n" .
            "Deleted At : {$model->deleted_at}</pre>";

        TelegramHelper::sendMessage($message);
        WhatsappHelper::sendMessage($message);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NotificationMail('Franchise Deleted', $message));
    }
}
