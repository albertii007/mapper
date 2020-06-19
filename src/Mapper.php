<?php

namespace Mapper\Map;

use Mapper\Map\settings\MapperHashSettings;

class Mapper implements IMapper
{
    use MapperHashSettings;

    protected $modelKey;

    /**
     * createMap
     *
     * @param mixed $model model to insert
     * @param array $requests all data to insert
     * @param mixed $hashing data to make hash
     * @param mixed $dontSet ignore data to insert
     * @return void
     */

    public function createMap(object $model, array $requests, ?string $hashing, ?string $dontSet): void
    {
        if ($dontSet != null) {

            $dontSet = explode('|', $dontSet);

            for ($i = 0; $i < count($dontSet); $i++) {
                unset($requests[$dontSet[$i]]);
            }
        }
        if ($hashing != null) {
            $this->withHash($model, $requests, $hashing);
        } else {
            $this->withoutHash($model, $requests);
        }

        $model->save();

        $this->modelKey = $model->getKey();
    }

    /**
     * updateMap
     *
     * @param mixed $model model to update
     * @param mixed $requests data to update
     * @param mixed $hashing data to hash
     * @param mixed $dontSet data to not update
     * @return void
     */

    public function updateMap(object $model, array $requests, ?string $hashing = null, ?string $dontSet): void
    {
        $model = $model->where('id', $requests['id'])->first();

        if ($dontSet != null) {

            $dontSet = explode('|', $dontSet);

            for ($i = 0; $i < count($dontSet); $i++) {
                unset($requests[$dontSet[$i]]);
            }
        }

        if ($hashing != null) {
            $this->withHash($model, $requests, $hashing);
        } else {
            $this->withoutHash($model, $requests);
        }

        $model->save();

        $this->modelKey = $model->getKey();
    }

    public function getModelKey()
    {
        return $this->modelKey;
    }
}
