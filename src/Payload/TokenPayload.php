<?php

namespace Spotify\Payload;

interface TokenPayload
{
    public function clientId(): string;

    public function clientSecret(): string;
}
