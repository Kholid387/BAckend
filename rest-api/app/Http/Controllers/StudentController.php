<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Method index untuk menampilkan semua data
    public function index()
    {
        // Menampilkan semua data students
        $students = Student::all();

        // Variable array untuk menampung hasil data dan pesan
        $response = [
            'data' => $students,
            'message' => 'Berhasil menampilkan semua data students'
        ];

        return response()->json($response, 200);
    }

    // Method untuk menambahkan data
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string',
            'nim' => 'required|string|unique:students,nim',
            'email' => 'required|email|unique:students,email',
            'majority' => 'required|string'
        ]);

        // Menyimpan data input
        $input = $request->only(['name', 'nim', 'email', 'majority']);
        $student = Student::create($input);

        // Response
        $response = [
            'message' => 'Successfully created new student',
            'data' => $student
        ];

        return response()->json($response, 201);
    }

    // Method untuk memperbarui data
    public function update(Request $request, $id)
    {
        // Mencari data student berdasarkan ID
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        // Validasi input
        $request->validate([
            'name' => 'string',
            'nim' => 'string|unique:students,nim,' . $id,
            'email' => 'email|unique:students,email,' . $id,
            'majority' => 'string'
        ]);

        // Memperbarui data student
        $student->update($request->only(['name', 'nim', 'email', 'majority']));

        // Response
        $response = [
            'message' => 'Successfully updated student',
            'data' => $student
        ];

        return response()->json($response, 200);
    }

    // Method untuk menghapus data
    public function destroy($id)
    {
        // Mencari data student berdasarkan ID
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        // Menghapus data student
        $student->delete();

        // Response
        $response = [
            'message' => 'Successfully deleted student'
        ];

        return response()->json($response, 200);
    }

    // Menampilkan data menggunakan ID
    public function show($id){
        $student = student::find($id);

        if ($student){
            $data = [
                'message' => 'Get detail student',
                'data' => $student,
            ];
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Student not found',
            ];
            return response()->json($data, 404);
        }
    }
}
