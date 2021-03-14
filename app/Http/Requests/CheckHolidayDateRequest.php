<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckHolidayDateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'holiday_date' => 'date_format:d.m.Y'
        ];
    }
}
