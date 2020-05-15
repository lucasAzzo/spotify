<?php

namespace App\Infrastructure\Doctrine\Mappings;

use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;
use Spotify\Entities\Song;

class SongMapping extends EntityMapping
{
    public function mapFor()
    {
        return Song::class;
    }

    public function map(Fluent $builder)
    {
        $builder->bigIncrements('id')->primary();
        $builder->text('name');
        $builder->text('externalId');
        $builder->jsonArray('additionalData');
    }
}
