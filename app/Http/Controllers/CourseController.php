<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::latest()->paginate(5);

        return view('pages.courses.index', compact('courses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.courses.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $request->validate([
            'name' => 'required',
            'short_description' => 'required|min:8',
            'full_description' => 'required|min:100',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required'
        ]);

        $input = $request->all();

        if ($banner = $request->file('banner')) {
            $destinationPath = 'banner/';
            $bannerImage = date('YmdHis') . "." . $banner->getClientOriginalExtension();
            $banner->move($destinationPath, $bannerImage);
            $input['banner'] = "$bannerImage";
        }

        Course::create($input);

        return redirect()->route('courses.index')
                        ->with('success','Course created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
       return view('pages.courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
        $request->validate([
            'name' => 'required',
            'short_description' => 'required|min:8',
            'full_description' => 'required|min:100',
            //'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required'
        ]);

        $input = $request->all();

        if ($banner = $request->file('banner')) {
            $destinationPath = 'banner/';
            $bannerImage = date('YmdHis') . "." . $banner->getClientOriginalExtension();
            $banner->move($destinationPath, $bannerImage);
            $input['banner'] = "$bannerImage";
        }else{
            unset($input['banner']);
        }

        $course->update($input);

        return redirect()->route('courses.index')
                        ->with('success','Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
          $course->delete();

        return redirect()->route('courses.index')
                        ->with('success','Course deleted successfully');
    }
}
