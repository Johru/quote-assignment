<?php

namespace App\Http\Controllers;

use App\Services\UserDashboardService;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(UserDashboardService $service): Response
    {
        return Inertia::render('dashboard', [
            'users' => $service->getUserCards(),
        ]);
    }
}
