<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Geojson;
use Illuminate\Validation\Rule;

class GeojsonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $db = new Geojson();

        // dd($db->getConnection()->getDatabaseName());

        $id = $this->route('id');

        return [
            'name' => [
                'required',
                'max:100',
                Rule::unique('geojsons', 'name')->ignore($id),
            ],
            'description' => 'max:1024',
            'geometry' => 'required|string',
            'district_id' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'name.max' => 'Name must be under 100 chars.',
            'name.unique' => 'Name already exists.',
            'description.max' => 'Description max 1024 chars.',
            'geometry.required' => 'Geometry is required.',
            'geometry.string' => 'Geometry must be a string.',
            'district_id.required' => 'District is required.',
            'district_id.numeric' => 'District must be a number.',
        ];
    }
}
