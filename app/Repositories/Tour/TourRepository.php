<?php
namespace App\Repositories\Tour;

use App\Models\Tour;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;
use App\Repositories\Tour\TourRepositoryInterface;
/**
 * Class BaseRepository
 *
 * @package Framgia\Gmt\Repositories
 */
class TourRepository extends BaseRepository implements TourRepositoryInterface
{
    /**
     * @var Tour
     */
    protected $model;
    
    /**
     * @var DatabaseManager
     */
    private $db;
    
    /**
     * TourRepository constructor.
     *
     * @param Tour $model
     * @param DatabaseManager $db
     */
    public function __construct(Tour $model, DatabaseManager $db)
    {
        parent::__construct($model);
        $this->db = $db;
    }
}
