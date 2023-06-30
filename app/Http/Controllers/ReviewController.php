<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $reviews = Review::orderBy('created_at','desc')->paginate(10);
        return view('admin.pages.reviews.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request)
    {
        $review = new Review();
        $review->title = $request->title;
        $review->message = $request->message;
        $review->rating_star = $request->rating;
        $review->reviewer_name = $request->reviewer_name;
        $review->save();
        return redirect()->route('review.index')->with(['success' => 'Review created successfully']);
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
    public function edit(Review $review,$id)
    {
        $review = Review::find($id);
        return view('admin.pages.reviews.edit',compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreReviewRequest $request, Review $review,$id)
    {
        $review = Review::find($id);
        $review->title = $request->title;
        $review->message = $request->message;
        $review->rating_star = $request->rating;
        $review->reviewer_name = $request->reviewer_name;
        $review->save();
        return redirect()->route('review.index')->with(['success' => 'Review updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review,$id)
    {
        $review = Review::find($id);
        $review->delete();
        return redirect()->route('review.index')->with(['success' => 'Review deleted successfully']);
    }
}
