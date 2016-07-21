<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Grade;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $grades = Grade::paginate(15);

        return view('admin.grades.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.grades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', ]);

        Grade::create($request->all());

        Session::flash('flash_message', 'Grade added!');

        return redirect('admin/grades');
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
        $grade = Grade::findOrFail($id);

        return view('admin.grades.show', compact('grade'));
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
        $grade = Grade::findOrFail($id);

        return view('admin.grades.edit', compact('grade'));
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

        $grade = Grade::findOrFail($id);
        $grade->update($request->all());

        Session::flash('flash_message', 'Grade updated!');

        return redirect('admin/grades');
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
        Grade::destroy($id);

        Session::flash('flash_message', 'Grade deleted!');

        return redirect('admin/grades');
    }
}
