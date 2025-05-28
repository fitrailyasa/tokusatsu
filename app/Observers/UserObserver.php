<?php

namespace App\Observers;

use App\Models\User;
use App\Helpers\TelegramHelper;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    public function created(User $model)
    {
        $roles = $model->getRoleNames()->implode(', ');
        TelegramHelper::sendMessage("📦 <b>User Created</b>\nID: {$model->id}\nName: {$model->name}\nEmail: {$model->email}\nRole: {$roles}\nStatus: {$model->status}");
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NotificationMail('User Created', "ID: {$model->id}\nName: {$model->name}\nEmail: {$model->email}\nRole: {$roles}\nStatus: {$model->status}"));
    }

    public function updated(User $model)
    {
        $roles = $model->getRoleNames()->implode(', ');
        TelegramHelper::sendMessage("✏️ <b>User Updated</b>\nID: {$model->id}\nName: {$model->name}\nEmail: {$model->email}\nRole: {$roles}\nStatus: {$model->status}");
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NotificationMail('User Updated', "ID: {$model->id}\nName: {$model->name}\nEmail: {$model->email}\nRole: {$roles}\nStatus: {$model->status}"));
    }

    public function deleted(User $model)
    {
        $roles = $model->getRoleNames()->implode(', ');
        TelegramHelper::sendMessage("🗑 <b>User Deleted</b>\nID: {$model->id}\nName: {$model->name}\nEmail: {$model->email}\nRole: {$roles}\nStatus: {$model->status}");
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NotificationMail('User Deleted', "ID: {$model->id}\nName: {$model->name}\nEmail: {$model->email}\nRole: {$roles}\nStatus: {$model->status}"));
    }
}
