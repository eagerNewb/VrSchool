<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Lesson;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $lessons = Lesson::paginate(15);

        return view('admin.lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.lessons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', ]);

        Lesson::create($request->all());

        Session::flash('flash_message', 'Lesson added!');

        return redirect('admin/lessons');
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
        $lesson = Lesson::findOrFail($id);

        return view('admin.lessons.show', compact('lesson'));
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
        $lesson = Lesson::findOrFail($id);

        return view('admin.lessons.edit', compact('lesson'));
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
        $this->validate($request, ['name' => 'required', ]);

        $lesson = Lesson::findOrFail($id);
        $lesson->update($request->all());

        Session::flash('flash_message', 'Lesson updated!');

        return redirect('admin/lessons');
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
        Lesson::destroy($id);

        Session::flash('flash_message', 'Lesson deleted!');

        return redirect('admin/lessons');
    }
}
