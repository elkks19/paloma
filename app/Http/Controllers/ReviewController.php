<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Lugar;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index(int $id)
    {
        $lugar = Lugar::find($id);
        $reviews = $lugar->reviews();

        return response()->json($reviews);
    }


    public function store(StoreReviewRequest $request)
    {
        $request->save();

        return response()->isSuccessful();
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
