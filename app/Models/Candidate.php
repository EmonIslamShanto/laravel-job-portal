<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidate extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'user_id',
        'full_name',
        'title',
        'image',
        'cv',
        'email',
        'experience_id',
        'website',
        'birth_date',
        'gender',
        'marital_status',
        'profession_id',
        'status',
        'bio',
        'country',
        'state',
        'city',
        'address',
        'phone_one',
        'phone_two',

    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'full_name'
            ]
        ];
    }

    function skills(): HasMany{
        return $this->hasMany(CandidateSkill::class, 'candidate_id', 'id');
    }

    function languages(): HasMany{
        return $this->hasMany(CandidateLanguage::class, 'candidate_id', 'id');
    }

    function experiences(): HasMany{
        return $this->hasMany(CandidateExperience::class, 'candidate_id', 'id')->orderBy('id', 'desc');
    }

    function educations(): HasMany{
        return $this->hasMany(CandidateEducation::class, 'candidate_id', 'id')->orderBy('id', 'desc');
    }

    function experience() : BelongsTo{
        return $this->belongsTo(Experience::class, 'experience_id', 'id');
    }

    function profession() : BelongsTo{
        return $this->belongsTo(Profession::class, 'profession_id', 'id');
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
}
