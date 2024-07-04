<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';
    
    /**
     * Get the user associated with the Property
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */


     public function owners(): hasMany
    {
        return $this->hasMany(PropertyOwner::class, 'property_id');
    }

    /**
     * Get the Tenants associated with the Property
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Tenants(): HasOne
    {
        return $this->hasOne(Tenant::class, 'property_id', 'id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'foreign_key', 'local_key');
    }



    /**
     * Get all of the Units for the Property
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Units(): HasMany
    {
        return $this->hasMany(Unit::class, 'property_id', 'id');
    }
}
