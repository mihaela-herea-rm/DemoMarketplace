<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [];

    protected $with = ['category', 'city'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->where('category_id', $category);
        });

        if (!empty($filters['city_id'])) {
            $query->where('city_id', $filters['city_id']);
        } else {
            $query->when($filters['city_id'] ?? false, function ($query, $city) {
                $query->whereHas('city_id', $city);
            });
        }
    }

}
