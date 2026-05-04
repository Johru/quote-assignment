<?php

namespace App\Services\Quote;

use App\Data\QuoteData;
use App\Http\Integrations\DummyJson\DummyJsonConnector;
use App\Http\Integrations\DummyJson\Requests\GetQuoteRequest;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Throwable;

class DummyJsonQuoteService implements QuoteServiceInterface
{
    public function __construct(
        private DummyJsonConnector $connector,
        private MockQuoteService $mockQuoteService,
        private FallbackQuoteService $fallback
    ) { //
    }

    public function getQuoteForUser(User $user): QuoteData
    {
        $id = crc32($user->email) % 100 + 1;

        try {
            $response = $this->connector->send(new GetQuoteRequest($id));

            if ($response->failed()) {
                return $this->fallback->getQuoteForUser($user);
            }

            return new QuoteData(
                text: $response->json('quote'),
                author: $response->json('author'),
            );
        } catch (Throwable $e) {
            Log::error('DummyJson API exception', [
                'message' => $e->getMessage(),
            ]);

            return $this->fallback->getQuoteForUser($user);
        }
    }
}
