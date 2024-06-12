<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        $hospital = Hospital::create($request->all());

        return response()->json([
            'code' => Response::HTTP_CREATED,
            'message' => 'Hospital creado correctamente',
            'data' => $hospital
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hospital $hospital)
    {
        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'Hospital encontrado correctamente',
            'data' => $hospital
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hospital $hospital)
    {
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
    public function destroy(Hospital $hospital)
    {
        $hospital->delete();

        return response()->json([
            'code' => Response::HTTP_NO_CONTENT,
            'message' => 'Hospital eliminado correctamente',
            'data' => null
        ], Response::HTTP_NO_CONTENT);
    }
}
