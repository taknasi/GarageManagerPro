<?php

namespace App\Http\Livewire;

use App\Models\Vehicule;
use App\Models\User;
use App\Traits\AlertTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class Vehicules extends Component
{
    use WithPagination, AlertTrait;

    // Listing
    public $search;
    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $perPage = pagination_count;

    // Delete
    public $deleteId;
    public $deleteNomVehicule;

    // Filter
    public $id_vehicule;

    public $immatriculation;
    public $n_chassis;
    public $marque;
    public $user_id;
    public $modele;
    public $annee_fabrication;
    public $type_carburant;
    public $categorie;
    public $couleur;

    public $dateDe;
    public $dateA;
    public $activateFilter = false;

    public function render()
    {
        return view(
            'livewire.vehicules',
            ['vehicules' => $this->filtrer('paginate')]
        );
    }

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }
        return $this->sortBy = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function filtrer($type)
    {
        $vehicules = Vehicule::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection);

        if ($this->activateFilter) {
            $this->filterByField($vehicules);
        }

        if ($type == 'paginate') {
            return $vehicules->paginate($this->perPage);
        } elseif ($type == 'print') {
            return $vehicules->get();
        }
    }

    public function filterByField($query)
    {
        if ($this->id_vehicule) {
            $query->where('id_vehicule', 'like', '%' . $this->id_vehicule . '%');
        }
        if ($this->immatriculation) {
            $query->where('immatriculation', 'like', '%' . $this->immatriculation. '%');
        }
        if ($this->n_chassis) {
            $query->where('n_chassis', 'like', '%' . $this->n_chassis . '%');
        }
        if ($this->marque) {
            $query->where('marque', 'like', '%' . $this->marque . '%');
        }
        if ($this->user_id) {
            $query->where('user_id', $this->user_id);
        }
        if ($this->modele) {
            $query->where('modele', 'like', '%' . $this->modele . '%');
        }
        if ($this->annee_fabrication) {
            $query->where('annee_fabrication', 'like', '%' . $this->annee_fabrication . '%');
        }
        if ($this->type_carburant) {
            $query->where('type_carburant', 'like',  $this->type_carburant );
        }
        if ($this->categorie) {
            $query->where('categorie', 'like', '%' . $this->categorie . '%');
        }
        if ($this->couleur) {
            $query->where('couleur', 'like', '%' . $this->couleur . '%');
        }

        if ($this->dateDe && $this->dateA) {
            $query->whereBetween('created_at', [
                Carbon::parse($this->dateDe)->format('Y-m-d 00:00:00'),
                Carbon::parse($this->dateA)->format('Y-m-d 23:59:59')
            ]);
        }
    }

    public function deletedId($id_vehicule, $immatriculation)
    {
        $this->deleteId = $id_vehicule;
        $this->deleteNomVehicule = $immatriculation;
    }

    public function delete()
    {
        try {
            $vehicule = Vehicule::find($this->deleteId);
            if ($vehicule) {
                $vehicule->delete();
                $this->successDelete();
            } else {
                $this->noData();
            }
        } catch (Exception $ex) {
            $this->catching($ex->getMessage());
        }
    }

    public function print()
    {
        Session::put('vehicules', $this->filtrer('print'));
        Session::save();
        $this->dispatchBrowserEvent('print');
    }

    public function resetInputFields()
    {
        $this->dispatchBrowserEvent('empty');

        $this->id_vehicule = null;
        $this->immatriculation = null;
        $this->n_chassis = null;
        $this->marque = null;
        $this->user_id = null;
        $this->modele = null;
        $this->annee_fabrication = null;
        $this->type_carburant = null;
        $this->categorie = null;
        $this->couleur = null;


        $this->dateDe = null;
        $this->dateA = null;
        $this->activateFilter = false;
    }
}
