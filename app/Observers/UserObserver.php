<?php

namespace App\Observers;

use App\Models\User;
use App\Helpers\TelegramHelper;
use App\Helpers\WhatsappHelper;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    public function created(User $model)
    {
        $this->notify('User Created', $model);
    }

    public function updated(User $model)
    {
        $this->notify('User Updated', $model);
    }

    public function deleted(User $model)
    {
        $this->notify('User Deleted', $model);
    }

    private function notify(string $title, User $model)
    {
        $message = $this->formatMessage($title, $model);
        TelegramHelper::sendMessage($message);
        WhatsappHelper::sendMessage($message);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NotificationMail($title, $message));
    }

    private function formatMessage(string $title, User $model): string
    {
        $roles = $model->getRoleNames()->implode(', ');

        $email = $model->email_verified_at ? 'Active' : 'Not Active';

        return "<b>📢 {$title}</b>\n" .
            "ID: {$model->id}\n" .
            "Name: {$model->name}\n" .
            "Username: {$model->username}\n" .
            "Email: {$model->email}\n" .
            "Phone: {$model->no_hp}\n" .
            "Status: {$email}\n" .
            "Role: {$roles}\n";
    }
}
