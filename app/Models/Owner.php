<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Owner extends Model
{
    use HasFactory;

    /**
     * Get all of the Properties for the Owner
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function PropertyOwners(): HasMany
    {
        return $this->hasMany(PropertyOwner::class, 'owner_id', 'id');
    }
 
}
