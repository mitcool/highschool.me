<?php

return [
    'api_key' => env('CLAUDE_API_KEY'),
    'version' => env('CLAUDE_API_VERSION', '2023-06-01'),
    'base_url' => 'https://api.anthropic.com/v1/messages',
];