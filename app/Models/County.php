<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['city'] ?? false, function ($query, $city) {
            $query->whereHas('city', function ($query) use ($city) {
                $query->where('slug', $city);
            });
        });
    }
}
