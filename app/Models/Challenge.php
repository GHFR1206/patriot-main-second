<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','description','short_description','icon','color','gradient_from','gradient_to','difficulty','max_time_seconds','max_points','obstacles','rules','sort_order','is_active'];

    protected $casts = ['obstacles' => 'array', 'is_active' => 'boolean'];

    public function scores(): HasMany { return $this->hasMany(Score::class); }

    public function getRouteKeyName(): string { return 'slug'; }
}
