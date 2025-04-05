<div>
    {{-- Do your work, then step back. --}}
    <div class="card ">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title row">
                <!--begin::Search-->
                <div class="col-sm-7 px-0 pe-sm-2 mb-sm-0 mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search fs-2"></i></span>
                        <input type="text" class="form-control" placeholder="Recherche .." data-bs-toggle="tooltip"
                            data-bs-original-title="Recherche par :Marque , Modele , Immatriculation "
                            aria-label="Recherche par : " wire:model.debounce.300ms="search" />
                    </div>
                </div>
                <span class="input-group-text col-sm-5 text-gray-500">
                    <i class="bi bi-car-front text-primary fs-2 me-4"></i>
                    <span class="text-gray-700 me-2 fw-bolder">{{ $vehicules->total() ?? 0 }}</span> Vehicules
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
                    <div data-bs-toggle="tooltip" data-bs-original-title="Nouveau vehicule"
                        aria-label="Nouvelle vehicule">
                        <a type="button" class="btn btn-primary me-3" href="{{ route('vehicules.create') }}">
                            <i class="bi bi-person-plus-fill fs-2"></i>
                            <span class="d-none d-sm-inline">Nouvelle vehicule</span>
                        </a>
                    </div>
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div wire:ignore class="d-flex justify-content-end align-items-center d-none"
                    data-kt-customer-table-toolbar="selected" id="selected">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_vehicule"
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
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_vehicules_table">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th scope="col">Immatriculation </th>
                            <th scope="col">Numero de chassis </th>
                            <th scope="col">Marque </th>
                            <th scope="col">Modele</th>
                            <th scope="col">Annee de fabrication </th>
                            <th scope="col">Type de carburant</th>
                            <th scope="col">Categorie </th>
                            <th scope="col">Couleur</th>
                            <th scope="col">Kilométrage actuel</th>
                            <th scope="col">Puissance fiscale</th>
                            <th scope="col">Compagnie d’assurance</th>
                            <th scope="col">Numéro de police</th>
                            <th scope="col">photo</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bold text-gray-700">
                        @forelse ($vehicules as $vehicule)
                        <tr>
                            <td class="text-gray-600">{{ $vehicule->immatriculation }}</td>
                            <td class="text-gray-600">{{ $vehicule->n_chassis }}</td>
                            <td class="text-gray-600">{{ $vehicule->marque }}</td>
                            <td class="text-gray-600">{{ $vehicule->modele }}</td>
                            <td class="text-gray-600">{{ $vehicule->annee_fabrication }}</td>
                            <td class="text-gray-600">{{ $vehicule->type_carburant }}</td>
                            <td class="text-gray-600">{{ $vehicule->categorie }}</td>
                            <td class="text-gray-600">{{ $vehicule->couleur }}</td>
                            <td class="text-gray-600">{{ $vehicule->kilometrage_actuel }}</td>
                            <td class="text-gray-600">{{ $vehicule->puissance_fiscale }}</td>
                            <td class="text-gray-600">{{ $vehicule->compagnie_assurance }}</td>
                            <td class="text-gray-600">{{ $vehicule->numero_de_police }}</td>
                            <td class="text-gray-600">
                                @if ($vehicule->photos->isNotEmpty())
                                <a href="{{ asset('images/' . $vehicule->photos->first()->photo) }}" target="_blank">
                                    <img src="{{ asset('images/' . $vehicule->photos->first()->photo) }}"
                                        alt="Vehicule Image" class="w-20 h-20 object-cover" width="60" height="60">
                                </a>
                                @else
                                <img src="{{ asset('images/0000transport.png') }}"
                                    alt="Vehicule Image" class="w-20 h-20 object-cover" width="60" height="60">
                                @endif
                            </td>
                            {{-- <td class="text-gray-600">
                                @foreach($vehicule->photos as $photo)
                                <a href="{{ asset('images/' . $photo->photo) }}" target="_blank">
                                    <img src="{{ asset('images/' . $photo->photo) }}" alt="Vehicule Image"
                                        class="w-20 h-20 object-cover" width="60" height="60">
                                </a>
                                @endforeach
                            </td> --}}
                            <td>
                                <div class="d-flex justify-content-end flex-shrink-0">
                                    <a href="{{ route('vehicules.show', $vehicule->id) }}"
                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                        data-bs-toggle="tooltip" data-bs-original-title="Voir détails"
                                        title="Voir détails">
                                        <i class="bi bi-eye-fill pe-0"></i>
                                    </a>
                                    <a href="{{ route('vehicules.edit', $vehicule->id) }}"
                                        class="btn btn-icon btn-bg-light btn-active-color-info btn-sm me-1"
                                        data-bs-toggle="tooltip" data-bs-original-title="Modifier" title="Modifier">
                                        <i class="bi bi-pencil-fill pe-0"></i>
                                    </a>
                                    <button type="button"
                                        wire:click="deletedId({{ $vehicule->id }}, '{{ $vehicule->immatriculation }}' )"
                                        data-bs-toggle="modal" data-bs-target="#kt_modal_supprimer"
                                        class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm"
                                        title="Supprimer">
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
                <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                    {!! $vehicules->links('shared.pagination-style') !!}
                </div>
            </div>
        </div>
        <!--end::Card body-->
    </div>
    @include('pages.vehicules.modals')
    @include('pages.vehicules.modal-filter')
    <script>
        $(document).ready(function() {
            $('.sel').select2({
                dropdownParent: $('#kt_modal_filter')
            });
            // Handle categorie select2 change
            $('#categorie_filter').on('change', function(e) {
                @this.set('categorie', e.target.value, true);
            });
            // Handle carburant select2 change
            $('#type_de_carburant').on('change', function(e) {
                @this.set('type_carburant', e.target.value, true);
            });
            // Handle User select2 change
            $('#user_filter').on('change', function(e) {
                @this.set('user_id', e.target.value, true);
            });
        });
        window.addEventListener('empty', event => {
            $('#type_filter').val("").trigger("change");
            $('#city').val("").trigger("change");
            $('#legal_form_filter').val("").trigger("change");
            $('#user_filter').val("").trigger("change");
            $(".flatpickr-input").flatpickr({
                dateFormat: "d-m-Y",
                locale: "fr",
            });
        });
    </script>
</div>
