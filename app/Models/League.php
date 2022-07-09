<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Collection;


/**
 * App\Models\League
 *
 * @property int $id
 * @property int $league_id
 * @property string $name
 * @property string $country
 * @property string $logo
 * @property string $flag
 * @property int $season
 * @property-read \Illuminate\Support\Collection|Team[] $teams
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
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
class League extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country',
        'logo',
        'season',
        'flag'];

    public function teams(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Team::class);
    }

    public function topTeam(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Team::class)
            ->orderByDesc('all_goals_for');
    }

    public function leaders(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Team::class)
            ->orderBy('rank');
    }

    public function goalsAgainst(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Team::class)->orderByDesc('all_goals_against');

    }


}
