<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\Task;
use App\Repositories\Interfaces\DashboardRepositoryInterface;

class DashboardRepository implements DashboardRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function analytics()
    {
        return response()->json([
            'message' => 'Dashboard statistics retrieved successfully.',
            'data' => [
                'total_projects' => Project::count(),
                'active_projects' => Project::where('status', 'active')->count(),
                'total_tasks' => Task::count(),
                'completed_tasks' => Task::where('status', 'done')->count(),
                'pending_tasks' => Task::whereIn('status', ['todo', 'in_progress'])->count(),
                'overdue_tasks' => Task::where('status', '!=', 'done')
                    ->whereDate('due_date', '<', today())
                    ->count(),
            ]
        ]);
    }
}
