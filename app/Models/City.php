<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','state_id','created_at', 'updated_at'];

    // country relation
    function country():BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    // State relation
    function state():BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
