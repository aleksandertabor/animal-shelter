<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperCat
 */
class Cat extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsTo<Shelter, Cat>
     */
    public function shelter(): BelongsTo
    {
        return $this->belongsTo(Shelter::class);
    }
}
