<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\project\StoreProjectRequest;
use App\Http\Requests\project\UpdateProjectRequest;
use App\Models\Project;

interface ProjectRepositoryInterface
{
    public function index();
    public function store(StoreProjectRequest $request);
    public function show(Project $project);
    public function update(UpdateProjectRequest $request, Project $project);
    public function destroy(Project $project);
}
