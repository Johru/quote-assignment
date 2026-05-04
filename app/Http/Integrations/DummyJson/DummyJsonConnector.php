<?php

namespace App\Http\Integrations\DummyJson;

use Saloon\Http\Connector;

class DummyJsonConnector extends Connector
{
    public function resolveBaseUrl(): string
    {
        return 'https://dummyjson222.com';
    }
}
