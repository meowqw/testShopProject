<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models
 *
 * @property string $title
 */

class Image extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function imageable() {
        return $this->morphTo();
    }
}
