<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public $table = 'patient';
    protected $fillable = ["name", "phone", "address", "id_status", "date_in", "date_out"];

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status', 'id');
    }
}
