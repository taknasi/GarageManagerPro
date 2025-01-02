<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Traits\AlertTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    use AlertTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.clients.clients');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get the next ID for display
        $lastId = Client::latest('id_client')->value('id_client') ?? 0;
        $nextId = $lastId + 1;

        return view('pages.clients.create', compact('nextId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {

        try {
            DB::beginTransaction();

            // Create new client instance
            $client = new Client();

            // Common fields for both types
            $client->id_client = $request->id_client;
            $client->type = $request->type;
            $client->email = $request->email;
            $client->phone = $request->phone;
            $client->address = $request->address;
            $client->city = $request->city;
            $client->notes = $request->notes;

            // Type-specific fields
            if ($request->type === 'particulier') {
                $client->full_name = $request->full_name;
                $client->civility = $request->civility;
            } else {
                $client->company_name = $request->company_name;
                $client->legal_form = $request->legal_form;
                $client->contact_person = $request->contact_person;
                $client->rc_number = $request->rc_number;
                $client->ice = $request->ice;
            }

            $client->save();

            DB::commit();

            $this->successAddR();

            if ($request->store == "Enregistrer") {
                return redirect('/clients');
            } else {
                return redirect()->route('clients.create');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            $this->catchingR($ex);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
