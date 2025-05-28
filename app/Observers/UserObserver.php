<?php

namespace App\Observers;

use App\Models\User;
use App\Helpers\TelegramHelper;

class UserObserver
{
    public function created(User $model)
    {
        $roles = $model->getRoleNames()->implode(', ');
        TelegramHelper::sendMessage("📦 <b>User Created</b>\nID: {$model->id}\nName: {$model->name}\nEmail: {$model->email}\nRole: {$roles}\nStatus: {$model->status}");
    }

    public function updated(User $model)
    {
        $roles = $model->getRoleNames()->implode(', ');
        TelegramHelper::sendMessage("✏️ <b>User Updated</b>\nID: {$model->id}\nName: {$model->name}\nEmail: {$model->email}\nRole: {$roles}\nStatus: {$model->status}");
    }

    public function deleted(User $model)
    {
        $roles = $model->getRoleNames()->implode(', ');
        TelegramHelper::sendMessage("🗑 <b>User Deleted</b>\nID: {$model->id}\nName: {$model->name}\nEmail: {$model->email}\nRole: {$roles}\nStatus: {$model->status}");
    }
}
