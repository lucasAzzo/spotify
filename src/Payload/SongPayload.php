<?php

namespace Spotify\Payload;

interface SongPayload
{
    public function name(): string;

    public function externalId(): string;

    public function additionalData(): array;
}
