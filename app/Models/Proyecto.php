<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    public function componentes()
    {
        return $this->hasMany(Componente::class);
    }
}