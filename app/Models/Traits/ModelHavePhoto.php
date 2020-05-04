<?php


namespace App\Models\Traits;


use Illuminate\Support\Facades\Storage;


trait ModelHavePhoto
{

    /**
     * define which attributes are photo
     * @return mixed
     */
    protected abstract function photos(): array;

    protected static function bootModelHavePhoto()
    {
        static::creating(function ($model) {
            $request = request();
            foreach ($model->photos() as $photo) {
                $url = $model->saveImage($request, $photo);
                if ($url) {
                    $model->$photo = $url;
                }

            }
        });

        static::updating(function ($model) {
            $request = request();
            foreach ($model->photos() as $photo) {
                if ($request->has($photo)) {
                    $model->deleteImage($model->getOriginal($photo));
                    $model->$photo = $model->saveImage($request, $photo);
                }
            }
        });

        static::deleting(function ($model) {
            foreach ($model->photos() as $photo) {
                $model->deleteImage($url = $model->getOriginal($photo));;
            }
        });
    }

    protected function getPhotoAttribute($value)
    {
        return $this->url($value);
    }

    protected function getLogoAttribute($value)
    {
        return $this->url($value);
    }

    protected function getImageAttribute($value)
    {
        return $this->url($value);
    }


    protected function url($path, $driver = 'public')
    {
        return Storage::disk($driver)->url($path);
    }

    protected function saveImage($request, $key = 'photo', $disk = 'public')
    {

        if ($request->has($key)) {
            $photo = $request->file($key);
            return Storage::disk($disk)->put('images', $photo);
        } else {
            return null;
        }
    }

    protected function deleteImage($old_img_path, $disk = 'public')
    {
        if (strpos($old_img_path, 'default') === false) {
            //should not delete default photos
            return Storage::disk($disk)->delete($old_img_path);
        }

    }
}
