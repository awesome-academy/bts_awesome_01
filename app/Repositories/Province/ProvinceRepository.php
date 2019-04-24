<?php
namespace App\Repositories\Province;

use App\Models\Province;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;
use App\Repositories\Province\ProvinceRepositoryInterface;
/**
 * Class BaseRepository
 *
 * @package Framgia\Gmt\Repositories
 */
class ProvinceRepository extends BaseRepository implements ProvinceRepositoryInterface
{
    /**
     * @var Province
     */
    protected $model;
    
    /**
     * @var DatabaseManager
     */
    private $db;
    
    /**
     * ProvinceRepository constructor.
     *
     * @param Province $model
     * @param DatabaseManager $db
     */
    public function __construct(Province $model, DatabaseManager $db)
    {
        parent::__construct($model);
        $this->db = $db;
    }
}
