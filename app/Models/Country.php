<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class Country extends Model
{
    public $modelNotFoundMessage = 'That country could not be found.';

    protected $fillable = [
        'name', 'code',
    ];
}
