<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @method static \Illuminate\Database\Eloquent\Builder|League newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|League newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|League query()
 * @method static \Illuminate\Database\Eloquent\Builder|League whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League whereFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League whereLeagueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League whereSeason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|League whereUpdatedAt($value)
 * @mixin \Eloquent
 */


///**
// * @property int $last_rank
// * @property int $rank
// */

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';

    protected $fillable = [
        'team_id',
        'group',
        'rank',
        'last_rank',
        'logo',
        'name',
        'points',
        'form',
        'all_played',
        'all_win',
        'all_draw',
        'all_lose',
        'all_goals_for',
        'all_goals_against',
        'league_id',];
    protected $appends = ['diffInRank'];


    public function leagues(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\League', 'id');
    }


    public function getDiffInRankAttribute(): ?int
    {
        return $this->last_rank - $this->rank;
    }



}


