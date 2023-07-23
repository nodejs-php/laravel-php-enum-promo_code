<?php

namespace App\Models;

use App\Enums\PromocodeTypes;
use App\Models\Casts\PromocodeConditionCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => PromocodeTypes::class,
        'expires_at' => 'datetime',
        'active' => 'bool',
        'condition' => PromocodeConditionCast::class,
    ];

    public function disable(): void
    {
        $this->active = false;

        $this->save();
    }
}
