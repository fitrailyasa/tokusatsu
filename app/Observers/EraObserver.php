<?php

namespace App\Observers;

use App\Models\Era;
use App\Helpers\TelegramHelper;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;

class EraObserver
{
    public function created(Era $model)
    {
        $message = "<b>📦 Era Created</b>\n<pre>" .
            "ID         : {$model->id}\n" .
            "Name       : {$model->name}\n" .
            "Created At : {$model->created_at}</pre>";

        TelegramHelper::sendMessage($message);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NotificationMail('Era Created', $message));
    }

    public function updated(Era $model)
    {
        $message = "<b>✏️ Era Updated</b>\n<pre>" .
            "ID         : {$model->id}\n" .
            "Name       : {$model->name}\n" .
            "Updated At : {$model->updated_at}</pre>";

        TelegramHelper::sendMessage($message);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NotificationMail('Era Updated', $message));
    }

    public function deleted(Era $model)
    {
        $message = "<b>🗑 Era Deleted</b>\n<pre>" .
            "ID         : {$model->id}\n" .
            "Name       : {$model->name}\n" .
            "Deleted At : {$model->deleted_at}</pre>";

        TelegramHelper::sendMessage($message);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NotificationMail('Era Deleted', $message));
    }
}
