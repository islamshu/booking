<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded=[];

    /**
     * Get all of the comments for the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
    public function detiles()
    {
        return $this->hasMany(BookingDetiels::class);
    }
    public function notes()
    {
        return $this->hasMany(BookingNote::class);
    }
    public function arrives()
    {
        return $this->hasMany(BookingArraive::class);
    }
}
