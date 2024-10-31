<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'students';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['name', 'nim', 'email', 'majority'];

}
