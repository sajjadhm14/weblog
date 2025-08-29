<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactUsResource;
use App\Models\ContactUs;
use App\Http\Requests\StoreContactUsRequest;
use App\Http\Requests\UpdateContactUsRequest;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ContactUsResource::collection(ContactUs::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactUsRequest $request)
    {
        $contactUs = ContactUs::create($request->validated());
        return new ContactUsResource($contactUs);
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactUs $contactUs)
    {
        return new ContactUsResource($contactUs);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactUsRequest $request, ContactUs $contactUs)
    {
        $contactUs->update($request->validated());
        return new ContactUsResource($contactUs);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactUs $contactUs)
    {
          $contactUs->delete();
          return response()->json(['message' => 'contactUs deleted !'], 204);
    }
}
