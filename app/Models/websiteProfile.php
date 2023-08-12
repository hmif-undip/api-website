<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\websiteProfile
 *
 * @property int $id
 * @property int|null $modified_by
 * @property string|null $modified_date
 * @property string|null $website_name
 * @property string|null $tagline
 * @property string|null $keyword
 * @property string|null $description
 * @property string|null $logo
 * @property string|null $url
 * @property string|null $email
 * @property string|null $hp
 * @property string|null $address
 * @property string|null $map
 * @property string|null $year_now
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile whereHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile whereMap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile whereModifiedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile whereModifiedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile whereTagline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile whereWebsiteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile whereYearNow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|websiteProfile withoutTrashed()
 * @mixin \Eloquent
 */
class websiteProfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id', 'created_at'
    ];

    /**
     * Get the user that owns the websiteProfile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'modified_by', 'id');
    }
}
