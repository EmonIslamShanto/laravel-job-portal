<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use Sluggable;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'logo',
        'banner',
        'bio',
        'vision',
        'industry_type_id',
        'organization_type_id',
        'team_size_id',
        'establishment_date',
        'website',
        'email',
        'phone',
        'country',
        'state',
        'city',
        'address',
        'map_link',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    function countryName() : BelongsTo{
        return $this->belongsTo(Country::class, 'country', 'id');
    }

    function stateName() : BelongsTo{
        return $this->belongsTo(State::class, 'state', 'id');
    }

    function cityName() : BelongsTo{
        return $this->belongsTo(City::class, 'city', 'id');
    }

    function industryType() : BelongsTo{
        return $this->belongsTo(IndustryType::class, 'industry_type_id', 'id');
    }

    function organizationType() : BelongsTo{
        return $this->belongsTo(OrganizationType::class, 'organization_type_id', 'id');
    }

    function teamSize() : BelongsTo{
        return $this->belongsTo(TeamSize::class, 'team_size_id', 'id');
    }
}
