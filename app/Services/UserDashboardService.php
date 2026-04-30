<?php

namespace App\Services;

use App\Models\User;
use App\Data\UserCardData;
use App\Services\Quote\QuoteServiceInterface;

class UserDashboardService
{
    public function __construct(
        private QuoteServiceInterface $quoteService
    ) { //
    }

    public function getUserCards(): array
    {
        return User::query()
            ->get()
            ->map(function ($user) {
                return new UserCardData(
                    id: $user->id,
                    name: $user->name,
                    email: $user->email,
                    lastLoginAt: $user->last_login_at?->format('Y-m-d'),
                    isActive: $user->last_login_at?->greaterThan(now()->subDays(7)) ?? false,
                    quote: $this->quoteService->getQuoteForUser($user)
                );
            })
            ->map(fn($dto) => $dto->toArray())
            ->toArray();
    }
}
