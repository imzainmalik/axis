<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tenant extends Model
{
    use HasFactory;

    /**
     * Get the Unit associated with the Tenant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Unit(): HasOne
    {
        return $this->hasOne(Unit::class, 'id', 'unit_id');
    }
}
