<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Unit extends Model
{
    use HasFactory;
    // $filable = [];
    protected $fillable = [
        'property_id',
        'unit_name',
        'unit_num',
        'bedrooms',
        'bathrooms',
        'square_feet',
        'property_rent_amount',
        'is_available'
    ];
    /**
     * Get the Property associated with the Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Property(): HasOne
    {
        return $this->hasOne(Property::class, 'id', 'property_id');
    }
}
