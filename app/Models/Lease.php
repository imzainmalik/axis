<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lease extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'tenant_id',
        'owner_id',
        'start_date',
        'end_date',
        'rent_amount',
    ];

    /**
     * Get all of the Owners for the Lease
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function Owners(): HasOne
    {
        return $this->hasOne(Owner::class, 'id', 'owner_id');
    }

    /**
     * Get the Tenant associated with the Lease
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Tenant(): HasOne
    {
        return $this->hasOne(Tenant::class, 'id', 'tenant_id');
    }

    /**
     * Get the user associated with the Lease
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Unit(): HasOne
    {
        return $this->hasOne(Unit::class, 'id', 'unit_id');
    }
}
