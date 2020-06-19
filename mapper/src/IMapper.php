<?php

namespace Mapper\src;



interface IMapper
{
    public function createMap(object $model, array $requests, ?string $hashing, ?string $dontSet): void;

    public function updateMap(object $model, array $requests, ?string $hashing, ?string $dontSet): void;

    public function getModelKey();
}
