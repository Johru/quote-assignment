<?php

namespace App\Data;

use App\Data\QuoteData;

class UserCardData
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public ?string $lastLoginAt,
        public bool $isActive,
        public QuoteData $quote
    ) { //
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'last_login_at' => $this->lastLoginAt,
            'is_active' => $this->isActive,
            'quote' => [
                'text' => $this->quote->text,
                'author' => $this->quote->author,
            ],
        ];
    }
}
