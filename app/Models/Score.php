<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Score extends Model
{
    use HasFactory;

    protected $fillable = ['team_id','challenge_id','points','time_seconds','penalties','bonuses','status','notes','judged_by'];

    protected $casts = ['time_seconds' => 'decimal:2'];

    public function team(): BelongsTo { return $this->belongsTo(Team::class); }
    public function challenge(): BelongsTo { return $this->belongsTo(Challenge::class); }
    public function judge(): BelongsTo { return $this->belongsTo(User::class, 'judged_by'); }
}
