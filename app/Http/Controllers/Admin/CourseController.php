<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        $students = Role::find(2)->users;
        return view('admin.course.index',compact('courses','students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request,[
            "name" => "required|min:2",
        ]);

        $course = new Course();
        $course->name = $request->name;
        $course->slug = str_slug($request->name);
        $course->description = $request->description;
        $course->save();
        return redirect(route('course.index'))->with('successMsg','Course Successfully Added :)');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('admin.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
         $this->validate($request,[
            "name" => "required|min:2",
        ]);

        $course = Course::find($course->id);
        $course->name = $request->name;
        $course->slug = str_slug($request->name);
        $course->description = $request->description;
        $course->save();
        return redirect(route('course.index'))->with('successMsg','Course Successfully Updated :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        Course::find($course->id)->delete();;
        return redirect()->back()->with('successMsg','Course Successfully Deleted :)');
    }

    public function assignCourse(Request $request)
    {
        $course = Course::findOrFail($request->course);
        $student = User::findOrFail($request->student)->courses()->where('course_id',$request->course)->count();
        $isComplete = User::findOrFail($request->student)->courses()->where('is_complete',false)->count();
        if ($student == 0)
        {
            if ($isComplete == 0)
            {
                $course->students()->attach($request->student);
                foreach ($course->units as $unit) {
                    $unit->students()->attach($request->student);

                    foreach ($unit->lessons as $lesson) {
                        $lesson->students()->attach($request->student);
                    }
                }
                return redirect()->back()->with('successMsg','Course Successfully Attach To Student');
            }else{
                return redirect()->back()->with('errorMsg',"This student's previous course is not completed yet");
            }

        }else{
            return redirect()->back()->with('errorMsg','Course is already attach to this student');

        }
    }
}
