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
                    <span class="text-gray-700 me-2 fw-bolder">{{ $vehicules->total() ?? 0 }}</span> vehicules
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

                    <div data-bs-toggle="tooltip" data-bs-original-title="Nouveau vehicule" aria-label="Nouveau vehicule">
                        <a type="button" class="btn btn-primary me-3" href="{{ route('vehicules.create') }}">
                            <i class="bi bi-person-plus-fill fs-2"></i>
                            <span class="d-none d-sm-inline">Nouveau vehicule</span>
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
                            <th scope="col" class="cursor-pointer" wire:click="sortBy('id')">ID Vehicule
                                @include('shared.sort-icon', ['field' => 'id'])
                            </th>
                            <th scope="col">Marque </th>
                            <th scope="col">Modele </th>
                            <th scope="col">Annee fabrication </th>
                            <th scope="col">Type de carburant </th>
                            <th scope="col">Categorie </th>
                            <th scope="col">Couleur </th>
                            <th scope="col">Immatriculation </th>
                            <th scope="col">num chassis </th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bold text-gray-700">
                        @forelse ($vehicules as $vehicule)
                            <tr>
                                <td>{{ $vehicule->id }}</td>
                                <td class="text-gray-600">{{ $vehicule->marque }}</td>
                                <td class="text-gray-600">{{ $vehicule->modele }}</td>
                                <td class="text-gray-600">{{ $vehicule->annee_fabrication }}</td>
                                <td class="text-gray-600">{{ $vehicule->type_carburant }}</td>
                                <td class="text-gray-600">{{ $vehicule->categorie }}</td>
                                <td class="text-gray-600">{{ $vehicule->couleur }}</td>
                                <td class="text-gray-600">{{ $vehicule->immatriculation }}</td>
                                <td class="text-gray-600">{{ $vehicule->n_chassis }}</td>
                                <td></td>
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
                                            wire:click="confirmDelete('{{ $vehicule->immatriculation }}')"
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
                                <td colspan="9" class="text-center text-muted">Il n'y a pas de données à afficher..</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!-- Pagination -->
            <div class="row">
                <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-start">
                    {!! $vehicules->links('shared.pagination-style') !!}
                </div>
            </div>
        </div>
        <!--end::Card body-->
    </div>

    @include('pages.Vehicules.modals')
    @include('pages.Vehicules.modal-filter')
    <script>
        $(document).ready(function() {
            $('.sel').select2({
                dropdownParent: $('#kt_modal_filter')
            });

            // Handle Type select2 change
            $('#type_de_carburant').on('change', function(e) {
                @this.set('type_carburant', e.target.value , true);
            });

            // Handle City select2 change
            $('#categorie_filter').on('change', function(e) {
                @this.set('categorie', e.target.value , true);
            });

        });

        window.addEventListener('empty', event => {
            $('#type_de_carburant').val("").trigger("change");
            $('#c_ategorie').val("").trigger("change");


            $(".flatpickr-input").flatpickr({
                dateFormat: "d-m-Y",
                locale: "fr",
            });
        });
    </script>
</div>
