<?php

namespace App\Services\AI;

use App\Contracts\AIProviderInterface;

class AIManager
{
    protected AIProviderInterface $provider;

    public function __construct(AIProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    public function generateText(array $data)
    {
        return $this->provider->generateText($data);
    }

    public function generateImage(array $data)
    {
        return $this->provider->generateImage($data);
    }

    public function chat(array $messages)
    {
        return $this->provider->chat($messages);
    }

    public function embedding(string $text)
    {
        return $this->provider->embedding($text);
    }
}
