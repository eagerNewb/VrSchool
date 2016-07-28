<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Grade;
use App\Book;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $books = Book::paginate(15);

        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $grades = Grade::all();
        return view('admin.books.create',compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {   
        $this->validate($request, ['name' => 'required', 'grades' => 'required']);

        $book = Book::create($request->all());
        foreach ($request->grades as $grade) {
         $book->grades()->attach($grade);
        }
        Session::flash('flash_message', 'Book added!');

        return redirect('admin/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $book = Book::with('grades')->select('id','name')->findOrFail($id);
        $grades = Grade::select('id','name')->get();
        $book_grades = [];
        foreach ($book->grades as $grade) {
            $book_grades[] = $grade->name;
        }
        return view('admin.books.edit', compact('book','grades','book_grades'));




    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['name' => 'required', 'grades' => 'required']);

        $book = Book::findOrFail($id);
        
        $book->update($request->all());
        // foreach ($request->grades as $grade) {
            // dd($grade);
            $book->grades()->sync($request->grades);
        // }
        Session::flash('flash_message', 'Book updated!');

        return redirect('admin/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Book::destroy($id);

        Session::flash('flash_message', 'Book deleted!');

        return redirect('admin/books');
    }
}
