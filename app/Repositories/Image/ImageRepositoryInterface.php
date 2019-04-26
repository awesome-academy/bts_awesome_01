<?php
namespace App\Repositories\Image;

use App\Models\Image;
use App\Repositories\RepositoryInterface;
/**
 * Interface ImageRepositoryInterface
 *
 */
interface ImageRepositoryInterface extends RepositoryInterface
{
    public function saveImage(array $images);

    public function saveTourImage(string $image);
    
    public function firstOrCreate(array $conditions, array $attributes);
}
