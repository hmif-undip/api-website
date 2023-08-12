<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $username
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed|null $password
 * @property int $role
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\websiteProfile> $websiteProfile
 * @property-read int|null $website_profile_count
 */
	class User extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \App\Models\User|null $user
 */
	class websiteProfile extends \Eloquent {}
}

