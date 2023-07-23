<?php

namespace App\ValueObject;

use App\Enums\PromocodeConditions;

class PromocodeCondition
{
    public function __construct(
        public readonly PromocodeConditions $type,
        public readonly float               $value,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            type: PromocodeConditions::from($data['type']),
            value: $data['value'],
        );
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
