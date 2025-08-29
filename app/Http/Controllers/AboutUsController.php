<?php

namespace App\Http\Controllers;

use App\Http\Resources\AboutUsResource;
use App\Models\AboutUs;
use App\Http\Requests\StoreAboutUsRequest;
use App\Http\Requests\UpdateAboutUsRequest;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $aboutUs = AboutUsResource::collection(AboutUs::all());
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutUsRequest $request)
    {
        $aboutUs = AboutUs::create($request->validated());
        return new AboutUsResource($aboutUs);
    }

    /**
     * Display the specified resource.
     */
    public function show(AboutUs $aboutUs)
    {
        return new AboutUsResource($aboutUs);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutUsRequest $request, AboutUs $aboutUs)
    {
        $aboutUs->update($request->validated());
        return new AboutUsResource($aboutUs);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs $aboutUs)
    {
        $aboutUs->delete();
        return response()->json(['message' => 'about us content deleted !'], 204);
    }
}
