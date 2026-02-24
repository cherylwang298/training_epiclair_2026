<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Rating::create([
            'book_id' => $id,
            'rating' => $request->rating,
        ]);

        return redirect()->route('ratingPage', $id)
                     ->with('success', 'Rating added successfully');
        }
        public function update(Request $request, $id)
{
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
    ]);

    $rating = Rating::findOrFail($id);

    $rating->update([
        'rating' => $request->rating,
    ]);

    return redirect()->back()->with('success', 'Rating updated');
}

public function destroy($id)
{   
    $rating = Rating::findOrFail($id);
    $rating->delete();

    return redirect()->back()->with('success', 'Rating deleted');
}
}