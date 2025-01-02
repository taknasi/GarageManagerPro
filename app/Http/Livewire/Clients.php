<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Traits\AlertTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class Clients extends Component
{
    use WithPagination, AlertTrait;

    // Listing
    public $search;
    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $perPage = pagination_count;

    // Delete
    public $deleteId;
    public $deleteNomClient;

    // Filter
    public $nom;
    public $responsable;
    public $telephone;
    public $email;
    public $adresse;
    public $dateDe;
    public $dateA;
    public $activateFilter = false;

    public function render()
    {
        return view(
            'livewire.clients',
            ['clients' => $this->filtrer('paginate')]
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
        $clients = Client::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection);

        if ($this->activateFilter) {
            $this->filterByField($clients);
        }

        if ($type == 'paginate') {
            return $clients->paginate($this->perPage);
        } elseif ($type == 'print') {
            return $clients->get();
        }
    }

    public function filterByField($query)
    {
        if ($this->nom) {
            $query->where('nom', 'like', '%' . $this->nom . '%');
        }
        if ($this->responsable) {
            $query->where('responsable', 'like', '%' . $this->responsable . '%');
        }
        if ($this->telephone) {
            $query->where('telephone', 'like', '%' . $this->telephone . '%');
        }
        if ($this->email) {
            $query->where('email', 'like', '%' . $this->email . '%');
        }
        if ($this->adresse) {
            $query->where('adresse', 'like', '%' . $this->adresse . '%');
        }
        if ($this->dateDe && $this->dateA) {
            $query->whereBetween('created_at', [
                Carbon::parse($this->dateDe)->format('Y-m-d 00:00:00'),
                Carbon::parse($this->dateA)->format('Y-m-d 23:59:59')
            ]);
        }
    }

    public function deletedId($id, $nom)
    {
        $this->deleteId = $id;
        $this->deleteNomClient = $nom;
    }

    public function delete()
    {
        try {
            $client = Client::find($this->deleteId);
            if ($client) {
                $client->delete_by = Auth::user()->id;
                $client->save();
                $client->delete();
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
        Session::put('clients', $this->filtrer('print'));
        Session::save();
        $this->dispatchBrowserEvent('print');
    }

    public function resetInputFields()
    {
        $this->dispatchBrowserEvent('empty');
        $this->nom = null;
        $this->responsable = null;
        $this->telephone = null;
        $this->email = null;
        $this->adresse = null;
        $this->dateDe = null;
        $this->dateA = null;
        $this->activateFilter = false;
    }
}
