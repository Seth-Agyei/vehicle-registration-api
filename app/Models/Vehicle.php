<?php

namespace App\Models;

use App\Enums\VehicleType;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['plate', 'type', 'brand', 'model', 'year', 'color', 'owner_name', 'owner_document', 'created_by'])]

class Vehicle extends Model
{
    use HasFactory;

    protected function cast(): array
    {
        return [
            'type' => vehicleType::class,
            'year' => 'interger',
        ];
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

