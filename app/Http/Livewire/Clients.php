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
    public $id_client;
    public $type;
    public $phone;
    public $email;
    public $civility;
    public $full_name;
    public $company_name;
    public $legal_form;
    public $contact_person;
    public $rc_number;
    public $ice;
    public $address;
    public $city;
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
        if ($this->id_client) {
            $query->where('id_client', 'like', '%' . $this->id_client . '%');
        }
        if ($this->type) {
            $query->where('type', $this->type);
        }
        if ($this->phone) {
            $query->where('phone', 'like', '%' . $this->phone . '%');
        }
        if ($this->email) {
            $query->where('email', 'like', '%' . $this->email . '%');
        }
        if ($this->civility) {
            $query->where('civility', 'like', '%' . $this->civility . '%');
        }
        if ($this->full_name) {
            $query->where('full_name', 'like', '%' . $this->full_name . '%');
        }
        if ($this->company_name) {
            $query->where('company_name', 'like', '%' . $this->company_name . '%');
        }
        if ($this->legal_form) {
            $query->where('legal_form', 'like',  $this->legal_form );
        }
        if ($this->contact_person) {
            $query->where('contact_person', 'like', '%' . $this->contact_person . '%');
        }
        if ($this->rc_number) {
            $query->where('rc_number', 'like', '%' . $this->rc_number . '%');
        }
        if ($this->ice) {
            $query->where('ice', 'like', '%' . $this->ice . '%');
        }
        if ($this->address) {
            $query->where('address', 'like', '%' . $this->address . '%');
        }
        if ($this->city) {
            $query->where('city', 'like', '%' . $this->city . '%');
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
        $this->id_client = null;
        $this->type = null;
        $this->phone = null;
        $this->email = null;
        $this->civility = null;
        $this->full_name = null;
        $this->company_name = null;
        $this->legal_form = null;
        $this->contact_person = null;
        $this->rc_number = null;
        $this->ice = null;
        $this->address = null;
        $this->city = null;
        $this->dateDe = null;
        $this->dateA = null;
        $this->activateFilter = false;
    }
}
