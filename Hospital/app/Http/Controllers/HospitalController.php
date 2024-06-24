<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hospitals = Hospital::all();

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'Hospitals retrieved successfully',
            'data' => $hospitals
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required',
                'ciudad' => 'required',
                'fecha_inauguracion' => 'required|date',
                'camas_disponibles' => 'required|integer',
            ]);

            $hospital = Hospital::create($request->all());

            return response()->json([
                'code' => Response::HTTP_CREATED,
                'message' => 'Hospital creado correctamente',
                'data' => $hospital
            ], Response::HTTP_CREATED);

        } catch (ValidationException $exception) {
            return response()->json([
                'code' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message' => 'Los datos proporcionados no son válidos',
                'errors' => $exception->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $hospital = Hospital::find($id);

        if (!$hospital) {
            return response()->json([
                'code' => Response::HTTP_NOT_FOUND,
                'message' => 'Hospital no encontrado',
                'data' => null
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'Hospital encontrado correctamente',
            'data' => $hospital
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $hospital = Hospital::find($id);

        if (!$hospital) {
            return response()->json([
                'code' => Response::HTTP_NOT_FOUND,
                'message' => 'Hospital no encontrado',
                'data' => null
            ], Response::HTTP_NOT_FOUND);
        }

        $hospital->update($request->all());

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'Hospital actualizado correctamente',
            'data' => $hospital
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hospital = Hospital::find($id);

        if (!$hospital) {
            return response()->json([
                'code' => Response::HTTP_NOT_FOUND,
                'message' => 'Hospital no encontrado',
                'data' => null
            ], Response::HTTP_NOT_FOUND);
        }

        $hospital->delete();

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'Hospital eliminado correctamente',
            'data' => null
        ], Response::HTTP_OK);
    }
}
