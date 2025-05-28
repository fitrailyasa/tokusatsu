<?php

namespace App\Observers;

use App\Models\Category;
use App\Helpers\TelegramHelper;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;

class CategoryObserver
{
    public function created(Category $model)
    {
        $message = "<b>📦 Category Created</b>\n<pre>" .
            "ID         : {$model->id}\n" .
            "Name       : {$model->name}\n" .
            "Era        : " . ($model->era->name ?? '-') . "\n" .
            "Franchise  : " . ($model->franchise->name ?? '-') . "\n" .
            "Created At : {$model->created_at}</pre>";

        TelegramHelper::sendMessage($message);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NotificationMail('Category Created', $message));
    }

    public function updated(Category $model)
    {
        $message = "<b>✏️ Category Updated</b>\n<pre>" .
            "ID         : {$model->id}\n" .
            "Name       : {$model->name}\n" .
            "Era        : " . ($model->era->name ?? '-') . "\n" .
            "Franchise  : " . ($model->franchise->name ?? '-') . "\n" .
            "Updated At : {$model->updated_at}</pre>";

        TelegramHelper::sendMessage($message);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NotificationMail('Category Updated', $message));    
    }

    public function deleted(Category $model)
    {
        $message = "<b>🗑 Category Deleted</b>\n<pre>" .
            "ID         : {$model->id}\n" .
            "Name       : {$model->name}\n" .
            "Era        : " . ($model->era->name ?? '-') . "\n" .
            "Franchise  : " . ($model->franchise->name ?? '-') . "\n" .
            "Deleted At : {$model->deleted_at}</pre>";

        TelegramHelper::sendMessage($message);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NotificationMail('Category Deleted', $message));
    }
}
