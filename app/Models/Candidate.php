<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
