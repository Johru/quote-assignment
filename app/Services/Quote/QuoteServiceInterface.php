<?php

namespace App\Services\Quote;

use App\Models\User;
use App\Data\QuoteData;

interface QuoteServiceInterface
{
    public function getQuoteForUser(User $user): QuoteData;
}
