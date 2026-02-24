<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
 
    public function addBook(Request $request)
    {
        $request->validate([
            'book_title' => 'required|string',
            'book_author' => 'required|string',
            'book_publisher' => 'required|string',
            'book_cover' => 'nullable|mimes:jpg,jpeg,png',
            'book_description' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {

            $coverPath = null;

            if ($request->hasFile('book_cover')) {
                $coverPath = $request->file('book_cover')
                                     ->store('covers', 'public');
            }

            Books::create([
                'title' => $request->book_title,
                'author' => $request->book_author,
                'publisher' => $request->book_publisher,
                'cover' => $coverPath,
                'description' => $request->book_description,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Book added successfully');

        } catch (\Exception $e) {

            DB::rollBack();
            Log::error('Error: ' . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Something went wrong. Please try again.');
        }
    }


    public function getBooks()
    {
        $books = Books::all();
        return view('form-materi', compact('books'));
    }

    public function getDetails($id)
    {
        $book = Books::with('ratings')->findOrFail($id);
        return response()->json($book);
    }


    public function deleteBook($id)
    {
        $book = Books::findOrFail($id);
        $book->delete();

        return response()->json(['success' => true]);
    }


    public function updateBook(Request $request, $id)
    {
        $book = Books::findOrFail($id);

        $request->validate([
            'book_title' => 'required|string',
            'book_author' => 'required|string',
            'book_publisher' => 'required|string',
            'book_cover' => 'nullable|mimes:jpg,jpeg,png',
            'book_description' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {

            $coverPath = $book->cover;

            if ($request->hasFile('book_cover')) {
                $coverPath = $request->file('book_cover')
                                     ->store('covers', 'public');
            }

            $book->update([
                'title' => $request->book_title,
                'author' => $request->book_author,
                'publisher' => $request->book_publisher,
                'cover' => $coverPath,
                'description' => $request->book_description,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Book updated successfully');

        } catch (\Exception $e) {

            DB::rollBack();
            Log::error('Error: ' . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Something went wrong. Please try again.');
        }
    }


    public function ratingPage($id)
    {
        $book = Books::with('ratings')->findOrFail($id);
        return view('tugas', compact('book'));
    }
}