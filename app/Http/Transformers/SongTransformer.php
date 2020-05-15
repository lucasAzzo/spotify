<?php

namespace App\Http\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Spotify\Entities\Song;

class SongTransformer extends Transformer
{
    public function transform(Song $song): array
    {
        return [
            'id' => $song->getId(),
            'name' => $song->getName(),
            'externalId' => $song->getExternalId(),
            'additionalData' => $song->getAdditionalData(),
        ];
    }
}
