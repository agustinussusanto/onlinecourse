<?php

namespace App\Http\Controllers;

use id;
use App\Models\Course;
use App\Models\CourseVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreCourseVideoRequest;
use Illuminate\Contracts\Cache\Store;

class CourseVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        //
        return view ('admin.course_videos.create',compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseVideoRequest $request,Course $course)
    {
        //
        DB::transaction(function () use ($request, $course) {
            $validated = $request->validated();
              // Debug: Log data yang telah divalidasi
            Log::info('Validated data:', $validated);
              //dd($validated);

            $validated['course_id'] = $course->id;

            $courseVideo = CourseVideo::create($validated);
            Log::info('Course created:', $course->toArray());

            });

            return redirect()->route('admin.courses.show', $course->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseVideo $courseVideo)
    {
        return redirect()->route('admin.courses.show', $courseVideo->course_id);
      //  return view('admin.course_videos.show', compact('courseVideo'));
       // return view('admin.course_videos.edit', compact('courseVideo', 'course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseVideo $courseVideo)
    {
        //
        $course = $courseVideo->course; // Get the related course

        return view('admin.course_videos.edit', compact('courseVideo', 'course'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCourseVideoRequest $request, CourseVideo $courseVideo)
    {
        //
        DB::transaction(function () use ($request, $courseVideo) {
            $validated = $request->validated();
            $courseVideo->update($validated);
        });
        return redirect()->route('admin.courses.show', $courseVideo->course_id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseVideo $courseVideo)
    {
        //
        DB::beginTransaction();
        try {
            $courseVideo->delete();
            DB::commit();
            return redirect()->route('admin.courses.show', $courseVideo->course_id);
        //    return redirect()->route('admin.courses.show', $courseVideo->course_id);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.courses.show', $courseVideo->course_id)->with('error', 'Something went wrong')  ;
        }
    }
}
