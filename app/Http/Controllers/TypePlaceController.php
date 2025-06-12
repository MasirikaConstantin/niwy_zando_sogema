<?php

namespace App\Http\Controllers;

use App\Models\TypePlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypePlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $placeTypes = TypePlace::orderBy('nom', "ASC")->get();
        return view('pages.placeType.index', compact('placeTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nom' => 'required',
        ]);

        try {
            $type = new TypePlace();
            $type->nom = $request->nom;
            $type->dimension = $request->dimension;
            $type->save_by = Auth::user()->id;
            $type->save();
            if ($type) {
                toastr()->success("Type Place enregistré avec success!");
                return back();//->with('success', "Place enregistré avec success!");
            } else {
                toastr()->error("Erreur lors de l'enregistrement! essayer a nouveau!");
                return back()->with('error', "Erreur lors de l'enregistrement! essayer a nouveau!");
            }
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TypePlace $typePlace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'nom' => 'required',
        ]);

        try {
            $type = TypePlace::find($id);
            if($type == null){
                return back()->with('error', "Impossible de traiter cette requête!");
            }
            $type->nom = $request->nom;
            $type->dimension = $request->dimension;
            $type->save_by = Auth::user()->id;
            $type->save();
            if ($type) {
                toastr()->success("Type Place modifié avec success!");
                return back();//->with('success', "Place enregistré avec success!");
            } else {
                toastr()->error("Erreur lors de modifié! essayer a nouveau!");
                return back(); //->with('error', "Erreur lors de l'enregistrement! essayer a nouveau!");
            }
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return back()->with('error', $bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypePlace $typePlace)
    {
        //
    }
}
