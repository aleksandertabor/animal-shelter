<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperEmployee
 */
class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsTo<Shelter, Employee>
     */
    public function shelter(): BelongsTo
    {
        return $this->belongsTo(Shelter::class);
    }
}
