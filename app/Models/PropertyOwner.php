<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PropertyOwner extends Model
{
    use HasFactory;

    /**
     * Get the PropertyDetails associated with the PropertyOwner
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function PropertyDetails(): HasOne
    {
        return $this->hasOne(Property::class, 'id', 'property_id');
    }


    public function propertiesDetail()
        {
            return $this->belongsToMany(PropertyOwner::class,
            'owner_id', 'property_id');
        }



}
