<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */

class Country extends Model
{
    protected $fillable = [
        'name', 'code',
    ];
}
