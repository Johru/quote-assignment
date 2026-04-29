<?php

namespace App\Data;

class QuoteData
{
    public function __construct(
        public string $text,
        public string $author
    ) { //
    }
}
