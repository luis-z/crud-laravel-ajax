<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Estudiante
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $edad
 * @property $dni
 * @property $promedio
 * @property $grado
 * @property $seccion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estudiante extends Model
{
    use HasFactory;

    static $rules = [
      'nombre' => 'required',
      'apellido' => 'required',
      'edad' => 'required|integer',
      'dni' => 'required',
      'promedio' => 'required|numeric',
      'grado' => 'required|integer|gt:0|lt:11',
      'seccion' => 'required|max:1',
    ];

    static $mensaje_error = [
      'nombre.required' => 'El nombre es requerido.',
      'apellido.required' => 'El apellido es requerido.',
      'edad.required' => 'La edad es requerida.',
      'edad.integer' => 'La edad debe ser un número entero.',
      'dni.required' => 'El DNI es requerido',
      'promedio.required' => 'El promedio es requerido.',
      'promedio.numeric' => 'El promedio debe ser un número decimal.',
      'grado.required' => 'El grado es requerido.',
      'grado.gt' => 'El grado debe ser mayor a 0.',
      'grado.lt' => 'El grado no puede ser mayor a 10.',
      'grado.integer' => 'El grado debe ser un número entero.',
      'seccion.required' => 'La seccion es requerida.',
      'seccion.max' => 'La seccion debe ser solo una letra.',
    ];

    // protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellido','edad','dni','promedio','grado','seccion'];



}
