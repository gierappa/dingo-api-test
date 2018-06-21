<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Order
 *
 * @property int $id
 * @property int $pet_id
 * @property int $quantity
 * @property string $ship_date
 * @property string $status
 * @property int $complete
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order wherePetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereShipDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    protected $guarded = [];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
