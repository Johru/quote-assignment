<?php

namespace App\Http\Integrations\DummyJson\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetQuoteRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private int $quoteId
    ) { //
    }

    public function resolveEndpoint(): string
    {
        return "/quotes/{$this->quoteId}";
    }
}
