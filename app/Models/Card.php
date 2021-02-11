<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class Card extends Model
{
    public $modelNotFoundMessage = 'That card could not be found.';

    protected $fillable = [
        'first_name', 'last_name', 'address', 'city',
        'country_id', 'phone', 'currency', 'balance', 'pin', 'status'
    ];

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
}
