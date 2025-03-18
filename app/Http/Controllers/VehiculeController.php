<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Vehicules;
use App\Http\Requests\VehiculeRequest;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Traits\AlertTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VehiculeController extends Controller
{
    use AlertTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.vehicules.vehicules');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.vehicules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $vehicule = new Vehicule();
            $vehicule->immatriculation = $request->immatriculation;
            $vehicule->n_chassis = $request->n_chassis;
            $vehicule->marque = $request->marque;
            $vehicule->modele = $request->modele;
            $vehicule->annee_fabrication = $request->annee_fabrication;
            $vehicule->type_carburant = $request->type_carburant;
            $vehicule->categorie = $request->categorie;
            $vehicule->couleur = $request->couleur;
            $vehicule->user_id = Auth::user()->id;
            $vehicule->save();

            DB::commit();

            $this->successAddR();

            if ($request->store == "Enregistrer") {
                return redirect('/vehicules');
            } else {
                return redirect()->route('vehicules.create');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            $this->catchingR($ex);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicule $vehicule)
    {
        //
    }
    public function edit($id)
    {
        try {
            $vehicule = Vehicule::findOrFail($id);
            return view('pages.Vehicules.edit', compact('vehicule'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('vehicules.index')
                ->with('error', 'vehicule introuvable. Il a peut-être été supprimé.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\VehiculeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehiculeRequest $request, $id)
    {

        try {
            DB::beginTransaction();

            // Find the vehicule
            $vehicule = Vehicule::findOrFail($id);

            // Common fields for both types
            $vehicule->immatriculation = $request->immatriculation;
            $vehicule->n_chassis = $request->n_chassis;
            $vehicule->marque = $request->marque;
            $vehicule->modele = $request->modele;
            $vehicule->annee_fabrication = $request->annee_fabrication;
            $vehicule->type_carburant = $request->type_carburant;
            $vehicule->categorie = $request->categorie;
            $vehicule->couleur = $request->couleur;


            $vehicule->save();


            DB::commit();

            $this->successUpdateR();

            return redirect('/vehicules');
        } catch (\Exception $ex) {
            DB::rollBack();
            $this->catchingR($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicule  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicule $vehicule)
    {
        //
    }

    public function checkExists(Request $request)
    {
        try {
            $query = Vehicule::query();



            // Exclude current client if editing
            if ($request->has('exclude_id')) {
                $query->where('id', '!=', $request->exclude_id);
            }

            $exists = $query->exists();
            return response()->json(['exists' => $exists]);
        } catch (\Exception $e) {
            return response()->json(['exists' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
