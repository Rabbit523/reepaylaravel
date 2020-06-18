<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Apartment extends Model implements HasMedia
{
    use HasMediaTrait;

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(130)
            ->height(130);

        $this->addMediaConversion('thumb-page')
            ->width(146)
            ->height(97);

        $this->addMediaConversion('medium-size')
            ->width(730)
            ->height(486);

        $this->addMediaConversion('grid-size')
            ->width(330)
            ->height(220);

        $this->addMediaConversion('big-size')
            ->width(1440)
            ->height(700);

        $this->addMediaConversion('banner-top')
            ->width(1920);
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('main')->singleFile();
        $this->addMediaCollection('pictures');
    }

    public function getCity()
    {
        return $this->hasOne('App\Cities', 'id', 'city');
    }

    public function apartmentType()
    {
        return $this->hasOne('App\ApartmentType', 'id', 'type');
    }
}
