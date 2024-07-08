<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MonthlyRent extends Model
{
    use HasFactory;

    /**
     * Get the tenant associated with the MonthlyRent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tenant(): HasOne
    {
        return $this->hasOne(Tenant::class, 'id', 'tenant_id');
    }

    /**
     * Get the Property associated with the MonthlyRent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Unit(): HasOne
    {
        return $this->hasOne(Unit::class, 'id', 'unit_id');
    }
}
