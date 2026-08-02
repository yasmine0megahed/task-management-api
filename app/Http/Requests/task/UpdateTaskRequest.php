<?php

namespace App\Http\Requests\task;

use App\Models\Project;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $task = $this->route('task');

        return auth()->check()
            && $task
            && $task->project->user_id === auth()->id();
    }
    protected function failedAuthorization()
    {
        throw new AuthorizationException('You are not allowed to update a task for this project.');
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
                'sometimes',
                'exists:projects,id',
            ],

            'title' => [
                'sometimes',
                'string',
                'max:255',
            ],

            'description' => [
                'sometimes',
                'nullable',
                'string',
            ],

            'priority' => [
                'sometimes',
                Rule::in(['low', 'medium', 'high']),
            ],

            'status' => [
                'sometimes',
                Rule::in(['todo', 'in_progress', 'done']),
            ],

            'due_date' => [
                'sometimes',
                'nullable',
                'date',
            ],
        ];
    }
}
