<?php

namespace App\Http\Controllers;

use App\Http\Requests\task\StoreTaskRequest;
use App\Http\Requests\task\UpdateTaskRequest;
use App\Models\Task;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(
        protected TaskRepositoryInterface $taskRepositoryInterface
    ) {}

    public function index()
    {
        return $this->taskRepositoryInterface->index();
    }
    public function store(StoreTaskRequest $request)
    {
        return $this->taskRepositoryInterface->store($request);
    }

    public function show(Task $task)
    {
        return $this->taskRepositoryInterface->show($task);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        return $this->taskRepositoryInterface->update($request, $task);
    }

    public function destroy(Task $task)
    {
        return $this->taskRepositoryInterface->destroy($task);
    }
}
