<?php

echo "<h1>Tugas Pratikum Backend</h1>";
echo "<p><strong>NIM:</strong> 0110223127</p>";
echo "<p><strong>Nama:</strong> Muhammad Khalid Shafwan</p>";
echo "<p><strong>Prodi:</strong> Teknik Informatika</p>";
echo "<p><strong>Kelas:</strong> TI04</p>";
echo "<p><strong>Mata Kuliah:</strong> Pemrograman Backend</p>";

# membuat class Animal dengan nama-nama hewan yang baru
class Animal
{
    # property animals
    private $animals;

    # method constructor - mengisi data awal
    # parameter: data hewan (array)
    public function __construct($data)
    {
        $this->animals = $data;
    }

    # method index - menampilkan data animals
    public function index()
    {
        # gunakan foreach untuk menampilkan data animals (array)
        echo "Index - Menampilkan seluruh hewan <br>";
        foreach ($this->animals as $animal) {
            echo "- " . $animal . '<br>';
        }
        echo "<br>";
    }

    # method store - menambahkan hewan baru
    # parameter: hewan baru
    public function store($data)
    {
        # gunakan method array_push untuk menambahkan data baru
        array_push($this->animals, $data);
        echo "Store - Menambahkan hewan baru ($data) <br>";
        foreach ($this->animals as $animal) {
            echo "- " . $animal . '<br>';
        }
        echo "<br>";
    }

    # method update - mengupdate hewan
    # parameter: index dan hewan baru
    public function update($index, $data)
    {
        if (isset($this->animals[$index])) {
            $this->animals[$index] = $data;
            echo "Update - Mengupdate hewan <br>";
            foreach ($this->animals as $animal) {
                echo "- " . $animal . '<br>';
            }
            echo "<br>";
        } else {
            echo "Hewan pada index $index tidak ditemukan.<br>";
        }
    }

    # method delete - menghapus hewan
    # parameter: index
    public function destroy($index)
    {
        # gunakan method array_splice untuk menghapus data array
        if (isset($this->animals[$index])) {
            array_splice($this->animals, $index, 1);
            echo "Delete - Menghapus hewan <br>";
            foreach ($this->animals as $animal) {
                echo "- " . $animal . '<br>';
            }
            echo "<br>";
        } else {
            echo "Hewan pada index $index tidak ditemukan.<br>";
        }
    }
}

# membuat object
# mengirimkan  data hewan (array) ke dalam constructor
$animal = new Animal(['macam tutul', 'Gajah', 'Zebra', 'Kuda', 'Jerapah']);

# Menampilkan seluruh hewan
$animal->index();

# Menambahkan hewan baru
$animal->store('kuda nil');
$animal->store('ayam');

# Mengupdate hewan
$animal->update(0, 'burung dara');
$animal->update(0, 'elang');


# Menghapus hewan
$animal->destroy(0);
$animal->destroy(2);
$animal->destroy(4);

?>