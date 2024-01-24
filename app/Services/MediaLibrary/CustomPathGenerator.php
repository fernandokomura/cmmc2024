<?php

namespace App\Services\MediaLibrary;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\DefaultPathGenerator;

class CustomPathGenerator extends DefaultPathGenerator
{
    /*
 * Get a unique base path for the given media.
 */
    protected function getBasePath(Media $media): string
    {
        $prefix = config('media-library.prefix', '');

        if ($media->collection_name !== '') {

            if ($prefix !== '') {
                return $prefix . '/'. $media->collection_name . '/' . $media->getKey();
            }

            return $media->collection_name . '/' . $media->getKey();
        }

        if ($prefix !== '') {
            return $prefix . '/' . $media->getKey();
        }

        return $media->getKey();
    }

}
