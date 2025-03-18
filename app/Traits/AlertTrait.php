<?php

namespace App\Traits;

use RealRashid\SweetAlert\Facades\Alert;
use Jantinnerezo\LivewireAlert\LivewireAlert;

trait AlertTrait {
    
    use LivewireAlert;

    // ---------------- alerts with livewire-----------------------------
    
    public function successAdd(){
        $this->alert('success', 'L\'enregistrement a été ajouté avec succès !');
    }

    public function successUpdate(){
        $this->alert('success', 'L\'enregistrement a été modifier avec succès !');
    }

    public function successDelete(){
        $this->alert('success', 'L\'enregistrement a été supprimer avec succès !');
    }

    public function successRestore(){
        $this->alert('success', 'L\'enregistrement a été restaurer avec succès !');
    }

    public function successAllDelete(){
        $this->alert('success', 'Les enregistrements a été supprimer avec succès !');
    }

    public function noData(){
        $this->alert('warning', 'Il n\'existe pas de données !');
    }

    public function preventDelete(){
        $this->alert('error', 'L\'enregistrement ne peut pas être supprimée en raison de l\'existence des enregistrements associées. !');
    }

    public function successExport(){
        $this->alert('warning', 'Cette opération peut prendre quelques minutes !');
    }

    public function catching($ex){
        $this->confirm($ex->getMessage(), [
            'onConfirmed' => 'confirmed',
            'confirmButtonText' => 'Ok',
            'showCancelButton' => false,
        ]);
    }
    public function te(){
        $this->confirm('dsfs', [
            'onConfirmed' => 'confirmed',
            'confirmButtonText' => 'Ok',
            'showCancelButton' => false,
        ]);
    }


    // ---------------- alerts without livewire-----------------------------

    public function successAddR(){
        toast('L\'enregistrement a été ajouté avec succès !','success');
    }

    public function successUpdateR(){
        toast('L\'enregistrement a été modifier avec succès !','success');
    }

    public function successDeleteR(){
        toast('L\'enregistrement a été supprimer avec succès !','success');
    }

    public function successAllDeleteR(){
        toast('Les enregistrements a été supprimer avec succès !','success');
    }

    public function noDataR(){
        toast('Il n\'existe pas de données !','warning');
    }

    public function catchingR($ex){
        alert::error('erreur',$ex->getMessage());
    }
    
}



