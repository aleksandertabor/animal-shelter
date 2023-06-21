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
 * App\Models\Cat
 *
 * @property int $id
 * @property int|null $shelter_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Shelter|null $shelter
 * @method static \Database\Factories\CatFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Cat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cat whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cat whereShelterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cat whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperCat {}
}

namespace App\Models{
/**
 * App\Models\Employee
 *
 * @property int $id
 * @property int|null $shelter_id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Shelter|null $shelter
 * @method static \Database\Factories\EmployeeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereShelterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperEmployee {}
}

namespace App\Models{
/**
 * App\Models\Shelter
 *
 * @property int $id
 * @property string $name
 * @property string|null $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cat> $cats
 * @property-read int|null $cats_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Employee> $employees
 * @property-read int|null $employees_count
 * @method static \Database\Factories\ShelterFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Shelter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shelter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shelter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Shelter whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shelter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shelter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shelter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shelter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperShelter {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

