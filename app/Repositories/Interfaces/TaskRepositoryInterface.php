<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\task\StoreTaskRequest;
use App\Http\Requests\task\UpdateTaskRequest;
use App\Models\Task;

interface TaskRepositoryInterface
{
    public function index();
    public function store(StoreTaskRequest $request);
    public function show(Task $task);
    public function update(UpdateTaskRequest $request, Task $task);
    public function destroy(Task $task);
}
