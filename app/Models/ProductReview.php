<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models
 *
 * @property string $author
 * @property string $text
 */

class ProductReview extends Model
{
    use HasFactory;

    protected $guarded = false;

    /**
     * Продукт по отзыву
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
