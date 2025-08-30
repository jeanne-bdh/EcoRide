<?php

namespace App\Entity;

use DateTimeImmutable;

class Entity
{

    public static function createAndHydrate(array $data):static
    {
        $entity = new static();
        $entity->hydrate($data);

        return $entity;
    }

    public function hydrate(array $data):void
    {
        foreach ($data as $key => $value) {

            $methodName = str_replace(array('-', '_'), ' ', $key);
            $methodName = ucwords($methodName);
            $methodName = str_replace(' ', '', $methodName);
            $methodName = "set".$methodName;

            if (method_exists($this, $methodName)) {
                if ($key === 'first_regist' || $key === 'date_contact') {
                    $value = new DateTimeImmutable($value);
                }
                $this->{$methodName}($value);
            }
        }
    }
}
