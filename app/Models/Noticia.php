<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Noticia extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['titulo', 'cuerpo', 'autor', 'imagen'];

    public function creadaPor()
    {
        return $this->belongsTo(User::class, 'autor');
    }
}
