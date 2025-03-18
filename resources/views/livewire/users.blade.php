<div>
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
                            title="Rechercher par : Nom complet" wire:model.debounce.300ms="search" />
                    </div>
                </div>

                <span class="input-group-text col-sm-5 text-gray-500">
                    <i class="bi bi-list-task text-primary fs-2 me-4"></i>
                    <span class="text-gray-700 me-2 fw-bolder">{{ $users->total() ?? 0 }}</span> utilisateurs
                </span>

                <!--end::Search-->

            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                    <button data-bs-toggle="modal" data-bs-target="#kt_modal_add_user" class="btn btn-primary"
                        wire:click='resetInputFields'>
                        <i class="bi bi-patch-plus fs-2"></i>
                        <span class="d-none d-sm-inline">Nouveau utilisateur</span>
                    </button>

                    <!--begin::Add patient-->

                    <!--end::Add customer-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_patients_table">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

                            <th scope="col" class="cursor-pointer">Nom Complet</th>
                            <th scope="col" class="cursor-pointer">Nom d'utilisateur</th>
                            <th scope="col" class="cursor-pointer">Profil</th>
                            <th scope="col" class="cursor-pointer text-center">ACTIVE</th>
                            <th scope="col" class="cursor-pointer text-center">DATE DE CREATION</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bold text-gray-600">
                        @forelse ($users as $user)
                            <tr>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td><span class="text-black"> {{ $user->user_name }}</span></td>

                                <td>
                                    <span class="badge badge-light-primary fs-7 m-1">{{ $user->profil }}</span>
                                </td>
                                <td class="text-center">
                                    @if ($user->active)
                                        <i class="fa fa-genderless text-success  fs-1"></i>
                                    @else
                                        <i class="fa fa-genderless text-danger  fs-1"></i>
                                    @endif
                                </td>

                                <td class="text-center">
                                    {{ date('d-m-Y', strtotime($user->created_at)) }}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end flex-shrink-0">

                                        <button type="button" wire:click='edit({{ $user->id }})'
                                            data-bs-toggle="modal" data-bs-target="#kt_modal_update_user"
                                            class="btn btn-icon btn-bg-light btn-active-color-warning btn-sm me-2"
                                            title="Modifier" title="Modifier" data-bs-original-title="Modifier"
                                            aria-label="Modifier">
                                            <i class="bi bi-pencil-fill pe-"></i>
                                        </button>
                                        <button type="button"
                                            wire:click='deletedId({{ $user->id }},"{{ $user->name }}")'
                                            data-bs-toggle="modal" data-bs-target="#kt_modal_supprimer"
                                            class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm"
                                            title="supprimer" title="Supprimer" data-bs-original-title="Supprimer"
                                            aria-label="Supprimer">
                                            <i class="bi bi-trash-fill pe-0"></i>
                                        </button>
                                    </div>
                                </td>
                                <!--end::Action=-->
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Il n'y a pas de données à afficher..
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
                            <select class="form-select form-select-sm form-select-solid">
                                <option value="10">10</option>
                                <option value="25" selected>25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                    {{-- {!! $patients->links('shared.pagination-style') !!} --}}
                </div>
            </div>
        </div>
        <!--end::Card body-->
    </div>
    @include('pages.Utilisateurs.modals')
    <script>
        $('#profil').on('change', function(e) {
            @this.set('profil', e.target.value);
        });

        $('#profilU').on('change', function(e) {
            @this.set('profil', e.target.value);
        });
        window.addEventListener('fillProfil', event => {
            $('#profilU').val(@this.profil).trigger("change")
        });
    </script>
</div>
