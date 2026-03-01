<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ApiResponse;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    public function index()
    {
        return ApiResponse::success(
            'Students fetched successfully.',
            Student::all(),
            200
        );
    }

    public function store(StoreStudentRequest $request)
    {
        $student    = Student::create($request->all());

        return ApiResponse::success(
            'Student created successfully.',
            $student,
            201
        );
    }

    public function show($id)
    {
        $student    = Student::find($id);

        if (!$student) {
            return response()->json([
                'status'    => false,
                'message'   => 'Student not found.'
            ], 404);
        }

        return response()->json([
            'status'    => true,
            'data'      => $student
        ]);
    }

    public function update(UpdateStudentRequest $request, $id)
    {
        $student    = Student::find($id);

        if (!$student) {
            return response()->json([
                'status'    => false,
                'message'   => 'Student not found.'
            ], 404);
        }

        $student->update($request->all());

        return ApiResponse::success(
            'Student updated successfully.',
            $student,
            200
        );
    }

    public function destroy($id)
    {
        $student    = Student::find($id);

        if (!$student) {
            return response()->json([
                'status'    => false,
                'message'   => 'Student not found.'
            ], 404);
        }

        $student->delete();

        return ApiResponse::success(
            'Student deleted successfully.',
            null,
            200
        );
    }
}