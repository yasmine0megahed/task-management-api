<?php

namespace App\Http\Controllers;

use App\Http\Requests\project\StoreProjectRequest;
use App\Http\Requests\project\UpdateProjectRequest;
use App\Models\Project;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(
       protected ProjectRepositoryInterface $projectRepositoryInterface
    ) {}

        public function index()
    {
        return $this->projectRepositoryInterface->index();
    }

    public function store(StoreProjectRequest $request)
    {
       return $this->projectRepositoryInterface->store($request);
    }

    public function show(Project $project)
    {
        return $this->projectRepositoryInterface->show($project);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        return $this->projectRepositoryInterface->update($request, $project);
    }

    public function destroy(Project $project)
    {
        return $this->projectRepositoryInterface->destroy($project);
    }
}
