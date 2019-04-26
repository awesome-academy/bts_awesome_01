<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Tour;
use App\Models\Service;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\DayStoreRequest;
use App\Repositories\Day\DayRepositoryInterface;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Tour\TourRepositoryInterface;
use App\Repositories\Service\ServiceRepositoryInterface;

class DayController extends Controller
{   
    private $dayRepoRepository;
    private $imageRepoRepository;
    private $tourRepoRepository;
    private $serviceRepository;

    public function __construct(ImageRepositoryInterface $image, DayRepositoryInterface $day, TourRepositoryInterface $tour, ServiceRepositoryInterface $service)
    {
        $this->imageRepository = $image;
        $this->dayRepository = $day;
        $this->tourRepository = $tour;
        $this->serviceRepository = $service;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DayStoreRequest $request)
    {
        $images_id = array();
        $day = $this->dayRepository->create([
            'start_at' => $request->start_date,
            'end_at' => $request->end_date,
            'description' => $request->description,
            'province_id' => $request->city,
            'tour_id' => $request->tourId,
        ]);
        $image = $this->imageRepository->saveImage($request->images);
        foreach ($image as $key => $value){
            $createimage = $this->imageRepository->firstOrCreate(['name' => $value],['name' => $value]);
            $day->images()->attach($createimage->id);
        }
        foreach ($request->services as $key => $value){
            $day->services()->attach($value);
        }
        return response([
            'result' => 'success',
            'day_id' => $day->id,
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Day $day)
    {
        $this->dayRepository->delete($day);
        return response([
            'result' => 'success',
        ]);
    }
}
