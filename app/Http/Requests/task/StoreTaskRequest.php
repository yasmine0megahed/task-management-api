<?php

namespace App\Http\Requests\task;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $project = $this->route('project');

        return auth()->check()
            && $project
            && $project->user_id === auth()->id();
    }
    protected function failedAuthorization()
    {
        throw new AuthorizationException('You are not allowed to create a task for this project.');
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'project_id' => [
                'required',
                'exists:projects,id',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'priority' => [
                'required',
                Rule::in(['low', 'medium', 'high']),
            ],

            'status' => [
                'required',
                Rule::in(['todo', 'in_progress', 'done']),
            ],

            'due_date' => [
                'nullable',
                'date',
                'after_or_equal:today',
            ],
        ];
    }
}
