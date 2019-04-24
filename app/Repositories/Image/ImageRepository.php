<?php
namespace App\Repositories\Image;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;
use App\Repositories\Image\ImageRepositoryInterface;
/**
 * Class BaseRepository
 *
 * @package Framgia\Gmt\Repositories
 */
class ImageRepository extends BaseRepository implements ImageRepositoryInterface
{
    /**
     * @var Image
     */
    protected $model;
    
    /**
     * @var DatabaseManager
     */
    private $db;
    
    /**
     * ImageRepository constructor.
     *
     * @param Image $model
     * @param DatabaseManager $db
     */
    public function __construct(Image $model, DatabaseManager $db)
    {
        parent::__construct($model);
        $this->db = $db;
    }

    public function saveImage(array $images)
    {
        $name = array();
        for ($i = 0; $i < sizeof($images); $i++) {
            $temp = $images[$i];
            $name[$i] = time().'.' . explode('/', explode(':', substr($temp, 0, strpos($temp, ';')))[1])[1];
            \Image::make($temp)->save(public_path('/dist/img/').$name[$i]);
        }
        return $name;
    }

    public function saveTourImage(string $image)
    {
        $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        \Image::make($image)->save(public_path('/dist/img/').$name);
        return $name;
    }
    
    public function firstOrCreate(array $conditions, array $attributes)
    {
        $data = $this->model->where($conditions)->first();
        if(!$data) {
            $data = $this->model->create($attributes);
        }
        return $data;
    }
}
