<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    protected $fillable = ['proyecto_id', 'nombre', 'cantidad', 'imagen'];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }
}