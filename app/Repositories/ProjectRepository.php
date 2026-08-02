<?php

namespace App\Repositories;

use App\Http\Requests\project\StoreProjectRequest;
use App\Http\Requests\project\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Repositories\Interfaces\ProjectRepositoryInterface;

class ProjectRepository implements ProjectRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $projects = auth()->user()->projects()->latest()->paginate(12);

        return ProjectResource::collection($projects)
            ->additional([
                'message' => 'Projects retrieved successfully.',
            ]);
    }

    public function store(StoreProjectRequest $request)
    {
        $project = auth()->user()->projects()->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'Project created successfully.',
            'data' => new ProjectResource($project),
        ], 201);
    }

    public function show(Project $project)
    {
        return response()->json([
            'message' => 'Project retrieved successfully.',
            'data' => new ProjectResource($project),
        ]);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());

        return response()->json([
            'message' => 'Project updated successfully.',
            'data' => new ProjectResource($project),
        ]);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return response()->json([
            'message' => 'Project deleted successfully.',
            'data' => new ProjectResource($project),
        ]);
    }
}
