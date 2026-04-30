<?php

namespace App\Services\Quote;

use App\Models\User;
use App\Data\QuoteData;

class MockQuoteService implements QuoteServiceInterface
{
    public function getQuoteForUser(User $user): QuoteData
    {
        return new QuoteData(
            text: "Mock quote for {$user->name}",
            author: "Mock System"
        );
    }
}
