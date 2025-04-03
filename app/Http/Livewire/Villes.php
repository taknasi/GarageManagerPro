<?php

namespace App\Http\Livewire;

use App\Models\Ville;
use App\Traits\AlertTrait;
use Exception;
use Livewire\Component;

class Villes extends Component
{
    use AlertTrait;

    public $ville;
    public $idVille;
    //******************* listing ****** */
    public $search;
    public $sortBy = 'id';
    public $sortDirection = 'desc';

    public $showNoticeUpdate = false;

    public function render()
    {
        $villes = Ville::where('ville', 'like', '%' . $this->search . '%')->orderBy($this->sortBy, $this->sortDirection)->get();
        return view('livewire.villes', ['villes' => $villes]);
    }

    /******************************************store *************************** */
    public function store()
    {
        $this->validate([
            'ville' => 'required|max:191|unique:villes,ville',
        ]);
        try {
            $ville = new Ville();
            $ville->ville = $this->ville;
            $ville->save();
            $this->resetInputFields();
            $this->dispatchBrowserEvent('fillSelectVille');
            $this->successAdd(); // in app/traits
        } catch (Exception $ex) {
            $this->catching($ex); // in app/traits

        }
    }

    /********************************** resetInputFields ******************** */
    public function resetInputFields()
    {
        $this->idVille = null;
        $this->ville = null;
        $this->search = null;
        $this->showNoticeUpdate = false;
    }

    /******************************************************************** */
    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }

    /******************************************************************** */
    public function edit($id)
    {
        $ville = Ville::whereId($id)->first();
        if ($ville) {
            $this->idVille = $ville->id;
            $this->ville = $ville->ville;
            $this->showNoticeUpdate = true;
        }
    }

    /****************************************** update *************************** */
    public function update()
    {
        $this->validate([
            'ville' => 'required|max:191|unique:villes,ville,' . $this->idVille,
        ]);
        try {
            $ville = Ville::whereId($this->idVille)->first();
            $ville->ville = $this->ville;
            $ville->save();
            $this->resetInputFields();
            $this->dispatchBrowserEvent('fillSelectVille');
            $this->successUpdate(); // in app/traits
        } catch (Exception $ex) {
            $this->catching($ex); // in app/traits
        }
    }

    /****************************************** delete *************************** */
    public function delete($id)
    {
        try {
            $ville = Ville::find($id);
            if ($ville) {
                if (!$ville->clients()->exists()) {
                    $ville->delete();
                    $this->successDelete();
                    $this->resetInputFields();
                    $this->dispatchBrowserEvent('fillSelectVille');
                } else {
                    $this->preventDelete();
                }
            } else
                $this->noData();
        } catch (Exception $ex) {
            $this->catching($ex); // in app/traits
        }
    }
}
