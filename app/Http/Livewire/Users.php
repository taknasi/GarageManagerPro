<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Traits\AlertTrait;
use App\Traits\UploadTrait;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination, UploadTrait, AlertTrait;

    public $user_id;
    public $name;
    public $user_name;
    public $password;
    public $password_confirmation;
    public $profil = 'Opérateur de saisie';
    public $active = 1;
    //******************* listing ****** */
    public $search;
    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $perPage = pagination_count;
    /********************************** */
    public $deleteId;
    public $nameD;


    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')->where('user_name', '!=', 'superAdmin')
            ->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);
        return view(
            'livewire.users',
            ['users' => $users]
        );
    }

    /******************************************store *************************** */
    public function store()
    {

        $this->validate([
            'name' => 'required',
            'user_name' => 'required|unique:users,user_name',
            'password' => 'required|confirmed',
            'profil' => 'required',
            'password_confirmation' => 'required',
        ]);
        try {
            $user = new User();
            $user->name = $this->name;
            $user->user_name = $this->user_name;
            $user->profil = $this->profil;
            $user->password = bcrypt($this->password);
            $user->active = $this->active;
            $user->save();
            $this->dispatchBrowserEvent('closeModal');
            $this->resetInputFields();
            $this->successAdd(); // kayna f app/traits
        } catch (Exception $ex) {
            $this->catching($ex); // kayna f app/traits

        }
    }

    /********************************** resetInputFields  *************** */
    public function resetInputFields()
    {
        $this->user_id = null;
        $this->name = null;
        $this->user_name = null;
        $this->profil = 'Opérateur de saisie';
        $this->password = null;
        $this->password_confirmation = null;
        $this->active = 1;
    }

    /******************************************************************* */
    // kayraja3 l page 1  mli kadir search onta f chi page x : kansamiwha updating + smit var li howa search kay3rafha bou7do lah i3amarha dar mskin
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**************************************** deletedId : fill var ****** */
    public function deletedId($id, $name)
    {
        $this->deleteId = $id;
        $this->nameD = $name;
    }

    /**************************************** Delete  ******************* */
    public function delete()
    {
        try {
            // $user = User::with(['dossiers','factures','charges'])->find($this->deleteId);
            // if ($user && $user->id != Auth::user()->id) {
            //     if (!$user->dossiers()->exists() && !$user->factures()->exists()  && !$user->charges()->exists() ) {
            //         $user->delete();
            //         $this->successDelete();
            //     } else {
            //         $this->preventDelete();
            //     }
            // } else
            //     $this->noData();
        } catch (Exception $ex) {
            $this->catching($ex); // kayna f app/traits
        }
    }

    /**************************************** edit  ******************* */
    public function edit($id)
    {
        try {
            $user = User::find($id);
            if ($user) {
                $this->user_id = $user->id;
                $this->name = $user->name;
                $this->profil = $user->profil;
                $this->user_name = $user->user_name;
                $this->active = $user->active;
                $this->dispatchBrowserEvent('fillProfil');
            }
        } catch (Exception $ex) {
            $this->catching($ex->getMessage()); // kayna f app/traits
        }
    }

    /******************************************store *************************** */
    public function update($id)
    {

        $this->validate([
            'name' => 'required',
            'user_name' => 'required|unique:users,user_name,' . $id,
            'password' => 'confirmed',
            'profil' => 'required',
        ]);
        try {
            $user = User::find($id);
            if ($user) {
                $user->name = $this->name;
                $user->user_name = $this->user_name;
                $user->profil = $this->profil;
                if ($this->password) {
                    $user->password = bcrypt($this->password);
                }
                $user->active = $this->active;
                $user->save();
                $this->dispatchBrowserEvent('closeModal');
                $this->resetInputFields();
                $this->successUpdate(); // kayna f app/traits
            } else
                $this->noData();
        } catch (Exception $ex) {
            $this->catching($ex); // kayna f app/traits

        }
    }
}
