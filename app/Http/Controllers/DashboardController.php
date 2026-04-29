<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use App\Models\User;

class DashboardController extends Controller
{
    public function __invoke(): Response
    {
        $users = User::query()
            ->get()
            ->map(function (User $user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'last_login_at' => $user->last_login_at?->format('j. n. Y'),
                    'is_active' => $user->last_login_at !== null
                        && $user->last_login_at->greaterThan(now()->subDays(7)),
                    'quote' => [
                        'text' => 'Temporary quote text.',
                        'author' => 'System',
                    ],
                ];
            });

        return Inertia::render('dashboard', [
            'users' => $users,
        ]);
    }
}
