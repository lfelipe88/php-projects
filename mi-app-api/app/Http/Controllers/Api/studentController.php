<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class studentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        if ($students->isEmpty()) {
            $data = [
                'message' => 'No students found',
                'status' => 444
            ];
            return response()->json($data, 404);
        }

        $data = [
            'students' => $students,
            'status' => 200
        ];
        return response()->json($data, 404);
    }
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'language' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Validation error',
                'status' => 400,
                'errors' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'language' => $request->language,
        ]);
        if (!$student) {
            $data = [
                'message' => 'Failed to create student',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => 'Student created successfully',
            'status' => 201,
            'data' => $student
        ];

        return response()->json($student, 201);
    }
    public function show($id)
    {
        $student = Student::find($id);
        if (!$student) {
            $data = [
                'message' => 'Student not found',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'student' => $student,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            $data = [
                'message' => 'Student not found',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $validator = validator($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'language' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Validation error',
                'status' => 400,
                'errors' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'language' => $request->language,
        ]);
        if (!$student) {
            $data = [
                'message' => 'Failed to update student',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => 'Student updated successfully',
            'status' => 200,
            'data' => $student
        ];

        return response()->json($student, 200);
    }
    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            $data = [
                'message' => 'Student not found',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $student->delete();
        $data = [
            'message' => 'Student deleted successfully',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    public function patch(Request $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            $data = [
                'message' => 'Student not found',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $validator = validator($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'language' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Validation error',
                'status' => 400,
                'errors' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'language' => $request->language,
        ]);
        if (!$student) {
            $data = [
                'message' => 'Failed to update student',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => 'Student updated successfully',
            'status' => 200,
            'data' => $student
        ];

        return response()->json($student, 200);
    }
}