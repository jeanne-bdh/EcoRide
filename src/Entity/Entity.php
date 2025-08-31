<?php

namespace App\Entity;

use DateTimeImmutable;

class Entity
{
    protected static array $dateFields = [
        'date_depart',
        'time_depart',
        'time_arrival'
    ];

    public static function createAndHydrate(array $data): static
    {
        $entity = new static();
        $entity->hydrate($data);

        return $entity;
    }

    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {

            if (in_array($key, static::$dateFields) && $value !== null) {
                $value = new DateTimeImmutable($value);
            }

            $methodName = str_replace(array('-', '_'), ' ', $key);
            $methodName = ucwords($methodName);
            $methodName = str_replace(' ', '', $methodName);
            $methodName = "set" . $methodName;

            if (method_exists($this, $methodName)) {
                if ($key === 'first_regist' || $key === 'date_contact') {
                    $value = new DateTimeImmutable($value);
                }
                if ($key === 'statusCarpool' && is_array($value)) {
                    $value = StatusCarpool::createAndHydrate($value);
                }

                if ($key === 'car' && is_array($value)) {
                    $value = Cars::createAndHydrate($value);
                }
                $this->{$methodName}($value);
            }
        }
    }
    
    public static function createMany(array $rows): array
{
    $objects = [];
    foreach ($rows as $row) {
        $objects[] = static::createAndHydrate($row);
    }
    return $objects;
}
}
