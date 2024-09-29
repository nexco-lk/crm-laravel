<?php

namespace App\Models;

use App\Traits\IsTenantModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Contact extends Model
{
    use HasFactory;
    use IsTenantModel;

    protected $primaryKey = 'contact_id';

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone_number',
        'status',
        'source',
        'industry',
        'company_size',
        'annual_revenue',
    ];

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function deals(): HasMany
    {
        return $this->hasMany(Deal::class);
    }

    public function activities(): MorphMany
    {
        return $this->morphMany(Activity::class, 'activitable');
    }
}
