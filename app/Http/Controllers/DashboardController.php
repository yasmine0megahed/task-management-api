<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\DashboardRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        private DashboardRepositoryInterface $dashboardRepositoryInterface
    ){}
    public function analytics()
    {
        return $this->dashboardRepositoryInterface->analytics();
    }
}
