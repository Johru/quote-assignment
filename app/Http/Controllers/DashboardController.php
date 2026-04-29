<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use App\Models\User;
use App\Data\UserCardData;
use App\Data\QuoteData;

class DashboardController extends Controller
{
    public function __invoke(): Response
    {
        $users = User::all()->map(function ($user) {
            return new UserCardData(
                id: $user->id,
                name: $user->name,
                email: $user->email,
                lastLoginAt: $user->last_login_at?->format('Y-m-d'),
                isActive: $user->last_login_at?->greaterThan(now()->subDays(7)) ?? false,
                quote: new QuoteData(
                    text: 'Temporary quote',
                    author: 'System'
                )
            );
        });

        return Inertia::render('dashboard', [
            'users' => $users->map(fn($u) => $u->toArray()),
        ]);
    }
}
