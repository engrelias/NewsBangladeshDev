<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomePageStoreSectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'section_name' => 'required',
            'section_title' => 'required',
            'section_style' => 'required',
            'section_categories' => 'required',
            'section_description' => 'nullable|text',
            'section_order' => 'nullable|integer',
            'ad_url' => 'nullable',
            'ad_code' => 'nullable',
            'ad_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'section_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ad_url2' => 'nullable',
            'ad_code2' => 'nullable',
            'ad_image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'sometimes|boolean',
            'lang_code' => 'required',
            'parent_section' => 'nullable|integer|exists:home_page_sections,id',
        ];
    }
}
