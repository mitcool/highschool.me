<?php

namespace App\Services;


use Illuminate\Support\Facades\Http;
class ClaudeService
{
    public function message(array $payload): array
    {
        return Http::withHeaders([
                'x-api-key' => config('claude.api_key'),
                'anthropic-version' => '2023-06-01',
            ])
            ->post('https://api.anthropic.com/v1/messages', $payload)
            ->throw()
            ->json();
    }
    
}