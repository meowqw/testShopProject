<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models
 *
 * @property string $title
 */

class Tag extends Model
{
    use HasFactory;

    protected $guarded = false;

    /**
     * Все продукты связанные с тегом
     *
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'tag_product', 'product_id', 'tag_id');
    }
}
