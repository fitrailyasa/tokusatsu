<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoReportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        return [
            'video_id' => 'required|exists:videos,id',
            'message' => 'nullable|max:1024',
        ];
    }

    public function messages(): array
    {
        return [
            'video_id.required' => 'Video is required.',
            'video_id.exists' => 'Video not found.',
            'message.max' => 'Message max 1024 chars.',
        ];
    }
}
