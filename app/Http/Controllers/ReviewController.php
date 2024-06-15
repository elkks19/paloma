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

        $reviews = $lugar->reviews;

        return response()->json($reviews);
    }


    public function store(StoreReviewRequest $request)
    {
        $request->save();

        return response()->json(['message' => 'Review created'], 201);
    }

    public function destroy(Review $review)
    {
        //
    }
}
