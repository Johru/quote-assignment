<?php

namespace App\Services\Quote;

use App\Models\User;
use App\Data\QuoteData;

class FallbackQuoteService implements QuoteServiceInterface
{
    public function getQuoteForUser(User $user): QuoteData
    {
        return new QuoteData(
            text: 'Quote service is temporarily unavailable.',
            author: 'System',
        );
    }
}
