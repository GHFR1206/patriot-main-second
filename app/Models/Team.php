<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name','slug','school','age_group','robot_name','members_count','members','contact_email','contact_phone','avatar','color','emoji','total_points','best_time'];

    protected $casts = ['members' => 'array', 'best_time' => 'decimal:2'];

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function scores(): HasMany { return $this->hasMany(Score::class); }
    public function getRouteKeyName(): string { return 'slug'; }
}
