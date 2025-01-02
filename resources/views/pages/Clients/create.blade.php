@extends('layouts.app')

@section('title', 'Nouveau Client | Garage Manager Pro')

@push('styles')
@endpush('styles')

@section('headerUnderMenu')
    <!--begin::Toolbar wrapper-->
    <div class="d-flex align-items-center pt-1">
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
            <!--begin::Item-->
            <li class="breadcrumb-item text-white fw-bold lh-1">
                <a href="{{ route('index') }}" class="text-white text-hover-primary">
                    <i class="bi bi-house text-gray-700 fs-6"></i>
                </a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <i class="bi bi-arrow-right fs-7 text-gray-700 mx-n1"></i>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-white fw-bold lh-1">Clients</li>
            <!--end::Item-->
            <li class="breadcrumb-item">
                <i class="bi bi-arrow-right fs-7 text-gray-700 mx-n1"></i>
            </li>
            <li class="breadcrumb-item text-white fw-bold lh-1">Nouveau client</li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Toolbar wrapper=-->
    <!--begin::Toolbar wrapper=-->
    <div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-13 pb-6">
        <!--begin::Page title-->
        <div class="page-title me-5">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-white fw-bold fs-2 flex-column justify-content-center my-0">
                Nouveau Client
            </h1>
        </div>
    </div>
    <!--end::Toolbar wrapper=-->
@endsection

@section('content')
    <div class="app-container container-xxl">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <!--begin::Content wrapper-->
            <div class="d-flex flex-column flex-column-fluid">
                <!--begin::Content-->
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    <form method="POST" action="{{ route('clients.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-border-warning card pt-3 mb-5 ">

                            <!--begin::Card body-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-8">
                                        <div class="row">
                                            <div class="col-sm-6 mb-5 ">
                                                <ul class="nav nav-pills nav-pills-custom mb-3 d-flex">
                                                    <li class="nav-item mb-3 me-3 flex-fill"
                                                        onclick="setType('particulier')">
                                                        <a class="nav-link btn btn-outline btn-flex btn-active-color-primary flex-column 
                                                               overflow-hidden w-100 h-85px pt-5 pb-2
                                                               @if (old('type') == 'particulier' || !old('type')) active @endif"
                                                            data-bs-toggle="pill">
                                                            <div class="nav-icon mb-3">
                                                                <i class="fa fa-user fs-1 p-0"></i>
                                                            </div>
                                                            <span
                                                                class="nav-text text-gray-800 fw-bolder fs-7 lh-1">Particulier</span>
                                                            <span
                                                                class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-warning"
                                                                style="background-color: #fcc1b5 !important"></span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item mb-3 flex-fill" onclick="setType('societe')">
                                                        <a class="nav-link btn btn-outline btn-flex btn-active-color-primary flex-column 
                                                               overflow-hidden w-100 h-85px pt-5 pb-2
                                                               @if (old('type') == 'societe') active @endif"
                                                            data-bs-toggle="pill">
                                                            <div class="nav-icon mb-3">
                                                                <i class="fa fa-building fs-1 p-0"></i>
                                                            </div>
                                                            <span
                                                                class="nav-text text-gray-800 fw-bolder fs-7 lh-1">Société</span>
                                                            <span
                                                                class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-warning"
                                                                style="background-color: #fcc1b5 !important"></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <input type="hidden" name="type" id="type"
                                                    value="{{ old('type', 'particulier') }}">
                                                @error('type')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-sm-6  mb-5 mt-4">
                                                <label for="client_id" class="form-label">Identifiant Client :</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="client_id"
                                                        name="id_client" readonly
                                                        value="{{ old('id_client', $nextId ?? '') }}"
                                                        placeholder="Auto-généré">
                                                    <span class="input-group-text">
                                                        <i class="bi bi-patch-check fs-2"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 mb-5 ">
                                                <label for="Civilité" class="form-label">Civilité :</label>
                                                <div id="civility" class="rounded border p-3 border-gray-300 ">
                                                    <!-- Mr -->
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input me-3" type="radio" name="civility"
                                                            id="flexCheckMr" value="Monsieur"
                                                            @if (old('civility') == 'Monsieur' || !old('civility')) checked @endif
                                                            {{-- onclick="setCivilite('Monsieur')" --}}>
                                                        <label class="form-check-label me-3 text-gray-700 fw-bold"
                                                            for="flexCheckMr">
                                                            Monsieur
                                                        </label>
                                                    </div>

                                                    <!-- Mme -->
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input me-3" type="radio" name="civility"
                                                            id="flexCheckMme" value="Madame"
                                                            @if (old('civility') == 'Madame') checked @endif
                                                            {{-- onclick="setCivilite('Madame')" --}}>
                                                        <label class="form-check-label me-3 text-gray-700 fw-bold"
                                                            for="flexCheckMme">
                                                            Madame
                                                        </label>
                                                    </div>
                                                </div>

                                                <!-- Hidden input to store the civility -->
                                                {{-- <input type="hidden" name="civility" id="civility" value="{{ old('civility') ?? 'Monsieur' }}"> --}}
                                                @error('civility')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- FULL_NAME -->
                                            <div class="col-sm-6  mb-5">
                                                <label for="full_name" class="form-label required">Nom complet :</label>
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control @error('full_name') is-invalid @enderror"
                                                        id="full_name" name="full_name" value="{{ old('full_name') }}"
                                                        required />
                                                    <span class="input-group-text">
                                                        <i class="bi bi-person-check-fill fs-2"></i>
                                                    </span>
                                                </div>
                                                @error('full_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- COMPANY_NAME (shown if type=societe) -->
                                            <div class="col-sm-6  mb-5">
                                                <label for="company_name" class="form-label required">Raison sociale
                                                    (Société)
                                                    :</label>
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control @error('company_name') is-invalid @enderror"
                                                        id="company_name" name="company_name"
                                                        placeholder="Nom de la société" value="{{ old('company_name') }}"
                                                        data-required-if="societe" />
                                                    <span class="input-group-text">
                                                        <i class="bi bi-building fs-2"></i>
                                                    </span>
                                                </div>
                                                @error('company_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- LEGAL_FORM (Société) -->
                                            <div class="col-sm-6 mb-5">
                                                <label for="legal_form" class="form-label">Forme juridique :</label>
                                                <div class="input-group">
                                                    <div class="flex-fill">
                                                        <select name="legal_form" id="legal_form"
                                                            class="form-select rounded-0 rounded-start @error('legal_form') is-invalid @enderror"
                                                            data-control="select2"
                                                            data-placeholder="Sélectionner la forme juridique">
                                                            <option></option>
                                                            <option value="SA"
                                                                {{ old('legal_form') === 'SA' ? 'selected' : '' }}>SA -
                                                                Société
                                                                Anonyme</option>
                                                            <option value="SARL"
                                                                {{ old('legal_form', 'SARL') === 'SARL' ? 'selected' : '' }}>
                                                                SARL -
                                                                Société à Responsabilité Limitée</option>
                                                            <option value="SARL AU"
                                                                {{ old('legal_form') === 'SARL AU' ? 'selected' : '' }}>
                                                                SARL AU -
                                                                SARL à Associé Unique</option>
                                                            <option value="SNC"
                                                                {{ old('legal_form') === 'SNC' ? 'selected' : '' }}>SNC -
                                                                Société
                                                                en Nom Collectif</option>
                                                            <option value="SCS"
                                                                {{ old('legal_form') === 'SCS' ? 'selected' : '' }}>SCS -
                                                                Société
                                                                en Commandite Simple</option>
                                                            <option value="SCA"
                                                                {{ old('legal_form') === 'SCA' ? 'selected' : '' }}>SCA -
                                                                Société
                                                                en Commandite par Actions</option>
                                                            <option value="GIE"
                                                                {{ old('legal_form') === 'GIE' ? 'selected' : '' }}>GIE -
                                                                Groupement d'Intérêt Économique</option>
                                                            <option value="SP"
                                                                {{ old('legal_form') === 'SP' ? 'selected' : '' }}>SP -
                                                                Société en
                                                                Participation</option>
                                                            <option value="SUCCURSALE"
                                                                {{ old('legal_form') === 'SUCCURSALE' ? 'selected' : '' }}>
                                                                Succursale</option>
                                                            <option value="AUTO ENTREPRENEUR"
                                                                {{ old('legal_form') === 'AUTO ENTREPRENEUR' ? 'selected' : '' }}>
                                                                Auto Entrepreneur</option>
                                                        </select>

                                                    </div>
                                                    <span class="input-group-text">
                                                        <i class="bi bi-briefcase fs-2"></i>
                                                    </span>
                                                </div>
                                                @error('legal_form')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- PHONE -->
                                            <div class="col-sm-6  mb-5">
                                                <label for="phone" class="form-label">Téléphone :</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="bi bi-telephone fs-2"></i>
                                                    </span>
                                                    <input type="tel"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        id="phone" name="phone" value="{{ old('phone') }}"
                                                        pattern="[0-9]{10}" placeholder="Ex: 0600000000"
                                                        title="Veuillez entrer un numéro de téléphone à 10 chiffres"
                                                        maxlength="10"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                                                </div>
                                                @error('phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- EMAIL -->
                                            <div class="col-sm-6 mb-5">
                                                <label for="email" class="form-label">Email :</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="bi bi-envelope fs-2"></i>
                                                    </span>
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        id="email" name="email" value="{{ old('email') }}"
                                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                                        placeholder="exemple@domaine.com"
                                                        title="Veuillez entrer une adresse email valide" />
                                                </div>
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 text-center d-xl-block d-none d-flex align-self-center">
                                        <img src="{{ asset('assets/media/clients.png') }}" alt="Dossier"
                                            class="w-100">
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- CONTACT_PERSON (Société) -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="contact_person" class="form-label">Contact / Gérant :</label>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control @error('contact_person') is-invalid @enderror"
                                                id="contact_person" name="contact_person" placeholder="Nom du contact"
                                                value="{{ old('contact_person') }}" />
                                            <span class="input-group-text">
                                                <i class="bi bi-person fs-2"></i>
                                            </span>
                                        </div>
                                        @error('contact_person')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- RC_NUMBER (Société) -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="rc_number" class="form-label">Numéro de registre de commerce (RC)
                                            :</label>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control @error('rc_number') is-invalid @enderror"
                                                id="rc_number" name="rc_number" value="{{ old('rc_number') }}" />
                                            <span class="input-group-text">
                                                <i class="bi bi-receipt fs-2"></i>
                                            </span>
                                        </div>
                                        @error('rc_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ICE (Société) -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="ice" class="form-label">ICE :</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('ice') is-invalid @enderror"
                                                id="ice" name="ice" value="{{ old('ice') }}" />
                                            <span class="input-group-text">
                                                <i class="bi bi-123 fs-2"></i>
                                            </span>
                                        </div>
                                        @error('ice')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>



                                    <!-- ADDRESS -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="address" class="form-label">Adresse :</label>
                                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="1">{{ old('address') }}</textarea>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- CITY -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="city" class="form-label">Ville :</label>
                                        <div class="input-group">
                                            <div class="flex-fill">
                                                <select name="city" id="city"
                                                    class="form-select rounded-0 rounded-start @error('city') is-invalid @enderror">
                                                    <option value="">Sélectionner une ville</option>
                                                </select>
                                            </div>
                                            <span class="input-group-text">
                                                <i class="bi bi-geo-alt fs-2"></i>
                                            </span>
                                            @error('city')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- NOTES -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="notes" class="form-label">Notes :</label>
                                        <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="1"
                                            placeholder="Observations, commentaires...">{{ old('notes') }}</textarea>
                                        @error('notes')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--end::Card body-->
                        </div>

                        <!-- Submit Buttons -->
                        <div class="d-grid gap-2 d-sm-flex justify-content-md-start mb-5">
                            <button type="submit" class="btn btn-primary me-md-2" name="store" value="Enregistrer">
                                <i class="bi bi-check2-circle fs-2"></i>
                                Enregistrer
                            </button>
                            <button type="submit" class="btn btn-primary" name="store"
                                value="Enregistrer et ajouter un autre">
                                Enregistrer et ajouter un autre client
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/global/select2-fr.min.js') }}"></script>
    <script>
        // Function to toggle fields visibility based on client type
        function toggleClientTypeFields(type) {
            const societyFields = [
                '#company_name',
                '#legal_form',
                '#contact_person',
                '#rc_number',
                '#ice',
            ];

            const particulierFields = [
                '#civility',
                '#full_name',
            ];

            if (type === 'particulier') {
                particulierFields.forEach(field => {
                    const element = document.querySelector(field)?.closest('.col-sm-6');
                    if (element) {
                        element.style.display = 'block';
                        const input = document.querySelector(field);
                        input.disabled = false;
                        if (input.hasAttribute('data-required-if')) {
                            input.removeAttribute('required');
                        }
                    }
                });

                societyFields.forEach(field => {
                    const element = document.querySelector(field)?.closest('.col-sm-6');
                    if (element) {
                        element.style.display = 'none';
                        const input = document.querySelector(field);
                        input.disabled = true;
                        if (input.hasAttribute('data-required-if')) {
                            input.removeAttribute('required');
                        }
                    }
                });
            } else {
                societyFields.forEach(field => {
                    const element = document.querySelector(field)?.closest('.col-sm-6');
                    if (element) {
                        element.style.display = 'block';
                        const input = document.querySelector(field);
                        input.disabled = false;
                        if (input.hasAttribute('data-required-if') && input.getAttribute('data-required-if') ===
                            type) {
                            input.setAttribute('required', '');
                        }
                    }
                });

                particulierFields.forEach(field => {
                    const element = document.querySelector(field)?.closest('.col-sm-6');
                    if (element) {
                        element.style.display = 'none';
                        const input = document.querySelector(field);
                        input.disabled = true;
                        if (input.hasAttribute('data-required-if')) {
                            input.removeAttribute('required');
                        }
                    }
                });
            }
        }

        // Function to handle type selection
        function setType(type) {
            document.getElementById('type').value = type;
            toggleClientTypeFields(type);
        }

        // Function to handle civility radio-pill selection
        function setCivilite(value) {
            document.getElementById('civility').value = value;
        }

        // Run on page load
        document.addEventListener('DOMContentLoaded', function() {
            const initialType = document.getElementById('type').value;
            toggleClientTypeFields(initialType);
        });

        // Moroccan cities data
        const moroccanCities = [
            'Agadir', 'Al Hoceima', 'Assilah', 'Azemmour', 'Azrou', 'Beni Mellal', 'Berkane', 'Berrechid',
            'Casablanca', 'Chefchaouen', 'Dakhla', 'El Jadida', 'Errachidia', 'Essaouira', 'Fès', 'Fnideq',
            'Guelmim', 'Ifrane', 'Kénitra', 'Khemisset', 'Khouribga', 'Ksar El Kebir', 'Laâyoune', 'Larache',
            'Marrakech', 'Martil', 'Meknès', 'Mohammedia', 'Nador', 'Ouarzazate', 'Oued Zem', 'Oujda',
            'Rabat', 'Safi', 'Salé', 'Sefrou', 'Settat', 'Sidi Bennour', 'Sidi Ifni', 'Sidi Kacem',
            'Sidi Slimane', 'Skhirat', 'Tan-Tan', 'Tanger', 'Taroudant', 'Taza', 'Témara', 'Tétouan',
            'Tiznit', 'Youssoufia', 'Zagora'
        ];

        // Initialize Select2 for city field
        $(document).ready(function() {
            $('#city').select2({
                data: moroccanCities.map(city => ({
                    id: city,
                    text: city
                })),
                placeholder: 'Sélectionner une ville',
                allowClear: true,
                language: 'fr'
            });

            // Set initial value if exists
            const initialCity = '{{ old('city') }}';
            if (initialCity) {
                $('#city').val(initialCity).trigger('change');
            }
        });
    </script>
@endpush
