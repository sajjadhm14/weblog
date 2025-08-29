<?php

namespace App\Http\Controllers;

use App\Http\Resources\SampelResource;
use App\Models\Sampel;
use App\Http\Requests\StoreSampelRequest;
use App\Http\Requests\UpdateSampelRequest;

class SampelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SampelResource::collection(Sampel::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSampelRequest $request)
    {
        $sampel = Sampel::create($request->validated());
        return new SampelResource($sampel);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sampel $sampel)
    {
        return new SampelResource($sampel);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSampelRequest $request, Sampel $sampel)
    {
        $sampel->update($request->validated());
        return new SampelResource($sampel);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sampel $sampel)
    {
        $sampel->delete();
        return response(['message' => 'sampel deleted successfully'], 204);
    }
}
