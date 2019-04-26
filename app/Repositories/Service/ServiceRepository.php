<?php
namespace App\Repositories\Service;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;
use App\Repositories\Service\ServiceRepositoryInterface;
/**
 * Class BaseRepository
 *
 * @package Framgia\Gmt\Repositories
 */
class ServiceRepository extends BaseRepository implements ServiceRepositoryInterface
{
    /**
     * @var Service
     */
    protected $model;
    
    /**
     * @var DatabaseManager
     */
    private $db;
    
    /**
     * ServiceRepository constructor.
     *
     * @param Service $model
     * @param DatabaseManager $db
     */
    public function __construct(Service $model, DatabaseManager $db)
    {
        parent::__construct($model);
        $this->db = $db;
    }
}
