<?php

namespace Mapper\Map\settings;

use Illuminate\Support\Facades\Hash;

trait MapperHashSettings
{
    private function withHash(object $model, array $requests, string $hashing)
    {
        $hashings = explode('|', $hashing);

        foreach ($requests as $index => $value) {

            if (in_array($index, $hashings)) {
                $model->$index = Hash::make($value);
            } else {
                $model->$index = $value;
            }
        }
    }

    private function withoutHash(object $model, array $requests)
    {
        foreach ($requests as $index => $value) {
            $model->$index = $value;
        }
    }
}
