<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Province;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\Tour\TourRepositoryInterface;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Service\ServiceRepositoryInterface;
use App\Repositories\Province\ProvinceRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Http\Requests\TourStoreRequest;

class TourController extends Controller
{
    private $tourRepository;
    private $imageRepository;
    private $provinceRepoRepository;
    private $serviceRepoRepository;

    public function __construct(TourRepositoryInterface $tour, ImageRepositoryInterface $image, ProvinceRepositoryInterface $province, ServiceRepositoryInterface $service, CategoryRepositoryInterface $category)
    {
        $this->tourRepository = $tour;
        $this->imageRepository = $image;
        $this->provinceRepository = $province;
        $this->serviceRepository = $service;
        $this->categoryRepository = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $provinces = $this->provinceRepository->all();
        $services = $this->serviceRepository->all();
        $categories = $this->categoryRepository->all();

        if($request->ajax()){
            $response = [
                'provinces' => $provinces,
                'services' => $services,
                'categories' => $categories,
            ];
             return response()->json($response);
        }

        return view('admin.modules.tour',compact('provinces','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $this->imageRepository->saveTourImage($request->image);
        $imageId = $this->imageRepository->firstOrCreate(['name' => $image],['name' => $image]);
        $tour = $this->tourRepository->create([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'description' => $request->description,
            'status' => $request->status,
            'image_id' => $imageId->id,
        ]);
        foreach ($request->categories as $key => $value){
            $tour->categories()->attach($value);
        }
        return response([
            'result' => 'success',
            'tour' => $tour,
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tour $tour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateStatus(Request $request, Tour $tour)
    {
        $this->tourRepository->update($tour, [
            'status' => '1'
        ]);
        return response([
            'result' => 'success',
        ]);
    }
}
