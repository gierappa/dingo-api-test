<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Pet
 *
 * @property int $id
 * @property string $name
 * @property int|null $category_id
 * @property string $photo_urls
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet wherePhotoUrls($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pet whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Pet extends Model
{
    protected $guarded = [];

    const STATUS_AVAILABLE = 'available';
    const STATUS_PENDING = 'pending';
    const STATUS_SOLD = 'sold';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
