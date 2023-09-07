<?php

namespace App\Http\Controllers;

use App\Http\Requests\studentRequest;
use App\Http\Resources\studentResource;
use App\Models\student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return studentResource::collection(student::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(studentRequest $request)
    {
       $students = student::create($request->validated());
       return new studentResource([
           'data' => $students,
           'success' => 200,
       ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        return new studentresource($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(studentRequest $request, student $student)
    {
        $student->update($request->validated());
        return new studentResource($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        $student->delete();
        return response()->json([
            'massage' => 'Data Deleted Sunccessfully'
        ]);
    }
}