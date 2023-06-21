<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperShelter
 */
class Shelter extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * @return HasMany<Employee>
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * @return HasMany<Cat>
     */
    public function cats(): HasMany
    {
        return $this->hasMany(Cat::class);
    }
}
