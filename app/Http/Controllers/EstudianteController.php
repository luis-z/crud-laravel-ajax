<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Validator;

/**
 * Class EstudianteController
 * @package App\Http\Controllers
 */
class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::orderBy('id', 'desc')->paginate(10);

        return view('estudiante.index', compact('estudiantes'));
    }

    public function listar_estudiantes()
    {
        $estudiantes = Estudiante::orderBy('id', 'desc')->paginate(10);

        return view('estudiante.tablaestudiantes', compact('estudiantes'));
    }

    public function vista_crear ()
    {
        return view('estudiante.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), Estudiante::$rules, Estudiante::$mensaje_error);
        
        if ( $validator->fails() ) {
            return response()->json(['exito' => false, 'data' => $validator->errors()->first()]);
        }
        
        $estudiante = Estudiante::create($request->all());
        
        return response()->json([
            'exito' => true,
            'data' => 'Estudiante creado exitosamente.'
        ]);
    }

    public function detalle_estudiante ($id)
    {
        return view('estudiante.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiante = Estudiante::find($id);

        return response()->json([
            'exito' => true,
            'data' => $estudiante
        ]);
    }


    public function vista_editar ()
    {
        return view('estudiante.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Estudiante $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), Estudiante::$rules, Estudiante::$mensaje_error);
        
        if ( $validator->fails() ) {
            return response()->json(['exito' => false, 'data' => $validator->errors()->first()]);
        }

        Estudiante::find($id)->update($request->all());

        return response()->json([
            'exito' => true,
            'data' => 'Estudiante editado exitosamente.'
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::find($id)->delete();

        return response()->json([
            'exito' => true,
            'data' => 'Estudiante eliminado exitosamente.'
        ]);
    }
}
