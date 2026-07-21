<?php

namespace App\Contracts;

interface AIProviderInterface
{
    public function generateText(array $data);

    public function generateImage(array $data);

    public function chat(array $messages);

    public function embedding(string $text);
}
