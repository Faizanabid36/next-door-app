<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        // Deletes all the relations associated with user whenever a User is deleted via $user->delete()
        static::deleting(function ($business) { // Delete Recommendation

            $business->attachments()->each(function ($image) {
                \File::delete(public_path('storage/real_estate/property-' . $image->property_id . '/' . basename($image->image_url)));
                $image->delete();
            });
        });
    }

    public function attachments()
    {
        return $this->hasMany(PropertyAttachment::class, 'property_id', 'id');
    }
    public function main_image()
    {
        return $this->hasOne(PropertyAttachment::class, 'property_id')->oldest();
    }
}
