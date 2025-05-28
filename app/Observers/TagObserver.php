<?php

namespace App\Observers;

use App\Models\Tag;
use App\Helpers\TelegramHelper;

class TagObserver
{
    public function created(Tag $model)
    {
        $message = "<b>📦 Tag Created</b>\n<pre>" .
            "ID         : {$model->id}\n" .
            "Name       : {$model->name}\n" .
            "Created At : {$model->created_at}</pre>";

        TelegramHelper::sendMessage($message);
    }

    public function updated(Tag $model)
    {
        $message = "<b>✏️ Tag Updated</b>\n<pre>" .
            "ID         : {$model->id}\n" .
            "Name       : {$model->name}\n" .
            "Updated At : {$model->updated_at}</pre>";

        TelegramHelper::sendMessage($message);
    }

    public function deleted(Tag $model)
    {
        $message = "<b>🗑 Tag Deleted</b>\n<pre>" .
            "ID         : {$model->id}\n" .
            "Name       : {$model->name}\n" .
            "Deleted At : {$model->deleted_at}</pre>";

        TelegramHelper::sendMessage($message);
    }
}
