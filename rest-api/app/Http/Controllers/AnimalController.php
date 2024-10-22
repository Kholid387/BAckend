<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    //  menyimpan data hewan
    private $animals = ['Kucing', 'Ayam', 'Ikan' , 'sapi'];

    // Menampilkan seluruh data hewan Animals
    public function index() {
        return response()->json($this->animals);
    }

    // Menambahkan hewan baru Animals
    public function store(Request $request) {
        // Menambahkan data hewan animals
        $newAnimal = $request->input('name');
        array_push($this->animals, $newAnimal);

        return response()->json([
            'message' => "Hewan  animals berhasil ditambahkan.",
            'animals' => $this->animals
        ]);
    }

    // Memperbarui data hewan 
    public function update(Request $request, $id) {
        // Validasi apakah ID ada dalam array
        if (array_key_exists($id, $this->animals)) {
            $this->animals[$id] = $request->input('name');
            return response()->json([
                'message' => "Hewan berhasil diperbarui.",
                'animals' => $this->animals
            ]);
        } 
    }

    // Menghapus data hewan berdasarkan ID 
    public function destroy($id) {
        // Validasi apakah ID ada dalam array
        if (array_key_exists($id, $this->animals)) {
            unset($this->animals[$id]);
            // Reindex array setelah penghapusan
            $this->animals = array_values($this->animals);
            return response()->json([
                'message' => "Hewan animals berhasil dihapus.",
                'animals' => $this->animals
            ]);
        } 
    }
}
