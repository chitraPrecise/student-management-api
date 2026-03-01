<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $studentId = $this->route('student');

        return [
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:students,email,' . $studentId,
            'course'    => 'required|string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'Please enter student name.',
            'name.string'       => 'Student name must be valid text.',
            'name.max'          => 'Student name must not exceed 255 characters.',
            'email.required'    => 'Please enter student email.',
            'email.email'       => 'Please enter a valid email address.',
            'email.unique'      => 'Student email already exists for another record.',
            'course.required'   => 'Please enter course.',
            'course.string'     => 'Course must be valid text.',
            'course.max'        => 'Course must not exceed 255 characters.'
        ];
    }
}