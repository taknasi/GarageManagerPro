<div>
    {{-- Do your work, then step back. --}}
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title row">
                <!--begin::Search-->
                <div class="col-sm-7 px-0 pe-sm-2 mb-sm-0 mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search fs-2"></i></span>
                        <input type="text" class="form-control" placeholder="Recherche .." data-bs-toggle="tooltip"
                            data-bs-original-title="Recherche par : Nom, Société"
                            aria-label="Recherche par : Nom, Société" wire:model.debounce.300ms="search" />
                    </div>
                </div>

                <span class="input-group-text col-sm-5 text-gray-500">
                    <i class="bi bi-people-fill text-primary fs-2 me-4"></i>
                    <span class="text-gray-700 me-2 fw-bolder">{{ $clients->total() ?? 0 }}</span> clients
                </span>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <button type="button" class="btn btn-light-warning me-3 d-none d-sm-inline" wire:click='print'
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <i class="bi bi-printer-fill fs-2 pe-1"></i>
                        <span class="d-none d-sm-inline">Imprimer</span>
                    </button>

                    <!--begin::Filtrer-->
                    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_filter">
                        <i class="bi bi-funnel-fill fs-3 pe-0"></i>
                        <span class="d-none d-sm-inline">Filtrer</span>
                    </button>
                    <!--end::Filter-->

                    <div data-bs-toggle="tooltip" data-bs-original-title="Nouveau client" aria-label="Nouveau client">
                        <a type="button" class="btn btn-primary me-3" href="{{route('clients.create')}}">
                            <i class="bi bi-person-plus-fill fs-2"></i>
                            <span class="d-none d-sm-inline">Nouveau client</span>
                        </a>
                    </div>
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div wire:ignore class="d-flex justify-content-end align-items-center d-none"
                    data-kt-customer-table-toolbar="selected" id="selected">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_client"
                        class="btn btn-danger" data-kt-customer-table-select="delete_selected">Supprimer
                        sélectionné</button>
                </div>
                <!--end::Group actions-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_clients_table">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th scope="col" class="cursor-pointer" wire:click="sortBy('id_client')">ID Client
                                @include('shared.sort-icon', ['field' => 'id_client'])
                            </th>
                            <th scope="col">Client </th>
                            <th scope="col">Téléphone </th>
                            <th scope="col" >Email </th>
                            <th scope="col" >Ville </th>
                            <th scope="col">Dernière visite </th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bold text-gray-700">
                        @forelse ($clients as $client)
                            <tr>
                                <td>{{ $client->id_client }}</td>
                                <td>
                                    @if ($client->type === 'particulier')
                                        <span class="text-primary">
                                            {{ $client->civility === 'Madame' ? 'Mme' : 'Mr' }}
                                        </span> {{ $client->full_name }}
                                    @else
                                        <span class="text-primary">St</span> {{ $client->company_name }}
                                    @endif
                                </td>
                                <td class="text-gray-600">{{ $client->phone }}</td>
                                <td class="text-gray-600">{{ $client->email }}</td>
                                <td class="text-gray-600">{{ $client->city }}</td>
                                <td></td>
                                <td>
                                    <div class="d-flex justify-content-end flex-shrink-0">
                                        <a href="{{ route('clients.show', $client->id) }}"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                            data-bs-toggle="tooltip" data-bs-original-title="Voir détails"
                                            title="Voir détails">
                                            <i class="bi bi-eye-fill pe-0"></i>
                                        </a>
                                        <a href="{{ route('clients.edit', $client->id) }}"
                                            class="btn btn-icon btn-bg-light btn-active-color-info btn-sm me-1"
                                            data-bs-toggle="tooltip" data-bs-original-title="Modifier" title="Modifier">
                                            <i class="bi bi-pencil-fill pe-0"></i>
                                        </a>
                                        <button type="button"
                                          wire:click='deletedId({{ $client->id }}, "{{ $client->type === 'particulier' ? $client->full_name : $client->company_name }}")'
                                            data-bs-toggle="modal" data-bs-target="#kt_modal_supprimer"
                                            class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm"
                                            title="Supprimer" data-bs-original-title="Supprimer">
                                            <i class="bi bi-trash-fill pe-0"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">Il n'y a pas de données à afficher..
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <div class="row">
                <div
                    class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                    <div class="dataTables_length">
                        <label>
                            <select class="form-select form-select-sm form-select-solid" wire:model="perPage">
                                <option value="10">10</option>
                                <option value="25" selected>25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div
                    class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                    {!! $clients->links('shared.pagination-style') !!}
                </div>
            </div>
        </div>
        <!--end::Card body-->
    </div>
    @include('pages.Clients.modals')
</div>
