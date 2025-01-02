@extends('layouts.pdf')
@section('content')
    <h1>Liste des Clients</h1>
    <table id='header'>
        <thead>
            <th>ID Client</th>
            <th>Type</th>
            <th>Nom Complet/Société</th>
            <th>Civilité</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Forme Juridique</th>
            <th>Contact</th>
            <th>RC</th>
            <th>ICE</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Notes</th>
        </thead>

        @if ($clients = Session::get('clients'))
            @forelse ($clients as $client)
                <tr>
                    <td>{{ $client->id_client }}</td>
                    <td>{{ ucfirst($client->type) }}</td>
                    <td>{{ $client->type === 'particulier' ? $client->full_name : $client->company_name }}</td>
                    <td>{{ $client->civility }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->legal_form }}</td>
                    <td>{{ $client->contact_person }}</td>
                    <td>{{ $client->rc_number }}</td>
                    <td>{{ $client->ice }}</td>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->city }}</td>
                    <td>{{ $client->notes }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center">Aucun client trouvé</td>
                </tr>
            @endforelse
            {{ Session::forget('clients') }}
        @endif
    </table>
@endsection
