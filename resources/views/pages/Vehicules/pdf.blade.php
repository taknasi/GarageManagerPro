@extends('layouts.pdf')
@section('content')
    <div class="container-fluid pdf-container">
        <div class="header text-center mb-4">
            <h1 class="pdf-title">Liste des Vehicules</h1>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped pdf-table">
                <thead class="thead-light" >
                    <tr>

                        <th>Immatriculation</th>
                        <th>Numero de chassis </th>
                        <th>Marque</th>
                        <th>Modele</th>
                        <th>Annee de fabrication </th>
                        <th>Type de carburant</th>
                        <th>Categorie</th>
                        <th>Couleur</th>
                        <th>Utilisateur</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($vehicules = Session::get('vehicules'))
                        @forelse ($vehicules as $vehicule)
                            <tr>
                                
                                <td>{{ $vehicule->immatriculation }}</td>
                                <td>{{ $vehicule->n_chassis }}</td>
                                <td>{{ $vehicule->marque }}</td>
                                <td>{{ $vehicule->modele }}</td>
                                <td>{{ $vehicule->annee_fabrication }}</td>
                                <td>{{ $vehicule->type_carburant }}</td>
                                <td>{{ $vehicule->categorie }}</td>
                                <td>{{ $vehicule->couleur }}</td>
                                <td>{{ $vehicule->user->name }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="13" class="text-center py-3">Aucun Vehicule trouvé</td>
                            </tr>
                        @endforelse
                        {{ Session::forget('vehicules') }}
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
