@extends('layouts.app')

@section('title', 'Modifier Client | Garage Manager Pro')

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
            <li class="breadcrumb-item text-white fw-bold lh-1">Modifier client</li>
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
                Modifier Client
            </h1>
        </div>

        <div class="d-flex align-self-center flex-center flex-shrink-0">
            <label for="exampleFormControlInput1" class="form-label fs-5 fw-bolder text-gray-600 d-block mt-1 ">Nom
                d'utilisateur :
            </label>

            <span class=" badge py-3 px-4 fs-6 badge-light ms-2">{{ $client->user->name }}
            </span>
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
                    <form method="POST" action="{{ route('clients.update', $client->id) }}" enctype="multipart/form-data"
                        id="form">
                        @csrf
                        @method('PUT')
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
                                                               @if ($client->type == 'particulier') active @endif"
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
                                                               @if ($client->type == 'societe') active @endif"
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
                                                    value="{{ $client->type }}">
                                                @error('type')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-sm-6  mb-5 mt-4">
                                                <label for="client_id" class="form-label">Identifiant Client :</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="client_id"
                                                        name="id_client" readonly value="{{ $client->id_client }}"
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
                                                            @if ($client->civility == 'Monsieur') checked @endif>
                                                        <label class="form-check-label me-3 text-gray-700 fw-bold"
                                                            for="flexCheckMr">
                                                            Monsieur
                                                        </label>
                                                    </div>

                                                    <!-- Mme -->
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input me-3" type="radio" name="civility"
                                                            id="flexCheckMme" value="Madame"
                                                            @if ($client->civility == 'Madame') checked @endif>
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
                                                        id="full_name" name="full_name" value="{{ $client->full_name }}"
                                                        required />
                                                    <span class="input-group-text">
                                                        <i class="bi bi-person-check-fill fs-2"></i>
                                                    </span>
                                                </div>
                                                @error('full_name')
                                                    <div class="fv-plugins-message-container invalid-feedback">
                                                        {{ $message }}</div>
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
                                                        placeholder="Nom de la société"
                                                        value="{{ $client->company_name }}" data-required-if="societe" />
                                                    <span class="input-group-text">
                                                        <i class="bi bi-building fs-2"></i>
                                                    </span>
                                                </div>
                                                @error('company_name')
                                                    <div class="fv-plugins-message-container invalid-feedback">
                                                        {{ $message }}</div>
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
                                                                {{ $client->legal_form === 'SA' ? 'selected' : '' }}>SA -
                                                                Société
                                                                Anonyme</option>
                                                            <option value="SARL"
                                                                {{ $client->legal_form === 'SARL' ? 'selected' : '' }}>
                                                                SARL -
                                                                Société à Responsabilité Limitée</option>
                                                            <option value="SARL AU"
                                                                {{ $client->legal_form === 'SARL AU' ? 'selected' : '' }}>
                                                                SARL AU -
                                                                SARL à Associé Unique</option>
                                                            <option value="SNC"
                                                                {{ $client->legal_form === 'SNC' ? 'selected' : '' }}>SNC -
                                                                Société
                                                                en Nom Collectif</option>
                                                            <option value="SCS"
                                                                {{ $client->legal_form === 'SCS' ? 'selected' : '' }}>SCS -
                                                                Société
                                                                en Commandite Simple</option>
                                                            <option value="SCA"
                                                                {{ $client->legal_form === 'SCA' ? 'selected' : '' }}>SCA -
                                                                Société
                                                                en Commandite par Actions</option>
                                                            <option value="GIE"
                                                                {{ $client->legal_form === 'GIE' ? 'selected' : '' }}>GIE -
                                                                Groupement d'Intérêt Économique</option>
                                                            <option value="SP"
                                                                {{ $client->legal_form === 'SP' ? 'selected' : '' }}>SP -
                                                                Société en
                                                                Participation</option>
                                                            <option value="SUCCURSALE"
                                                                {{ $client->legal_form === 'SUCCURSALE' ? 'selected' : '' }}>
                                                                Succursale</option>
                                                            <option value="AUTO ENTREPRENEUR"
                                                                {{ $client->legal_form === 'AUTO ENTREPRENEUR' ? 'selected' : '' }}>
                                                                Auto Entrepreneur</option>
                                                        </select>

                                                    </div>
                                                    <span class="input-group-text">
                                                        <i class="bi bi-briefcase fs-2"></i>
                                                    </span>
                                                </div>
                                                @error('legal_form')
                                                    <div class="fv-plugins-message-container invalid-feedback">
                                                        {{ $message }}</div>
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
                                                        id="phone" name="phone" value="{{ $client->phone }}"
                                                        pattern="[0-9]{10}" placeholder="Ex: 0600000000"
                                                        title="Veuillez entrer un numéro de téléphone à 10 chiffres"
                                                        maxlength="10"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                                                </div>
                                                @error('phone')
                                                    <div class="fv-plugins-message-container invalid-feedback">
                                                        {{ $message }}</div>
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
                                                        id="email" name="email" value="{{ $client->email }}"
                                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                                        placeholder="exemple@domaine.com"
                                                        title="Veuillez entrer une adresse email valide" />
                                                </div>
                                                @error('email')
                                                    <div class="fv-plugins-message-container invalid-feedback">
                                                        {{ $message }}
                                                    </div>
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
                                                value="{{ $client->contact_person }}" />
                                            <span class="input-group-text">
                                                <i class="bi bi-person fs-2"></i>
                                            </span>
                                        </div>
                                        @error('contact_person')
                                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- RC_NUMBER (Société) -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="rc_number" class="form-label">Numéro de registre de commerce (RC)
                                            :</label>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control @error('rc_number') is-invalid @enderror"
                                                id="rc_number" name="rc_number" value="{{ $client->rc_number }}" />
                                            <span class="input-group-text">
                                                <i class="bi bi-receipt fs-2"></i>
                                            </span>
                                        </div>
                                        @error('rc_number')
                                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- ICE (Société) -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="ice" class="form-label">ICE :</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('ice') is-invalid @enderror"
                                                id="ice" name="ice" value="{{ $client->ice }}" />
                                            <span class="input-group-text">
                                                <i class="bi bi-123 fs-2"></i>
                                            </span>
                                        </div>
                                        @error('ice')
                                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>



                                    <!-- ADDRESS -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="address" class="form-label">Adresse :</label>
                                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="1">{{ $client->address }}</textarea>
                                        @error('address')
                                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}
                                            </div>
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
                                                    <option value="Casablanca"
                                                        {{ $client->city === 'Casablanca' ? 'selected' : '' }}>Casablanca
                                                    </option>
                                                    <option value="Rabat"
                                                        {{ $client->city === 'Rabat' ? 'selected' : '' }}>Rabat</option>
                                                    <option value="Marrakech"
                                                        {{ $client->city === 'Marrakech' ? 'selected' : '' }}>Marrakech
                                                    </option>
                                                </select>
                                            </div>
                                            <span class="input-group-text">
                                                <i class="bi bi-geo-alt fs-2"></i>
                                            </span>
                                            @error('city')
                                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- NOTES -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="notes" class="form-label">Notes :</label>
                                        <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="1"
                                            placeholder="Observations, commentaires...">{{ $client->notes }}</textarea>
                                        @error('notes')
                                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--end::Card body-->
                        </div>

                        <!-- Submit Buttons -->
                        <div class="d-flex">
                            <button type="submit" name="action" id="submitBtn" value="save"
                                class="btn btn-primary me-2">
                                <span class="indicator-label">
                                    <i class="bi bi-check-lg fs-4 me-2"></i>Mettre à jour
                                </span>
                                <span class="indicator-progress">
                                    Veuillez patienter... <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                            <a href="{{ route('clients.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left fs-4 me-2"></i>Retour
                            </a>
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
        // Function to check if client exists
        async function checkClientExists(data) {
            try {
                const formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                Object.keys(data).forEach(key => {
                    formData.append(key, data[key]);
                });

                const response = await fetch('{{ route('clients.check-exists') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return await response.json();
            } catch (error) {
                console.error('Error checking client:', error);
                return {
                    exists: false
                };
            }
        }

        // Prevent double form submission
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('form');
            const submitBtn = document.getElementById('submitBtn');
            const fullNameInput = document.getElementById('full_name');
            const companyNameInput = document.getElementById('company_name');
            const typeInput = document.getElementById('type');
            const currentClientId = '{{ $client->id }}';

            async function handleSubmit(e, button) {
                // Prevent the default form submission
                e.preventDefault();

                // Check if client exists based on type
                const type = typeInput.value;
                let checkData = {
                    type,
                    exclude_id: currentClientId // Exclude current client from check
                };

                if (type === 'particulier' && fullNameInput.value) {
                    checkData.full_name = fullNameInput.value;
                } else if (type === 'societe' && companyNameInput.value) {
                    checkData.company_name = companyNameInput.value;
                }

                try {
                    const {
                        exists
                    } = await checkClientExists(checkData);

                    if (exists) {
                        // Show SweetAlert2 confirmation
                        const result = await Swal.fire({
                            text: 'Ce client existe déjà. Voulez-vous l\'ajouter ?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Oui, ajouter',
                            cancelButtonText: 'Non, annuler',
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: 'btn btn-primary',
                                cancelButton: 'btn btn-light'
                            }
                        });

                        if (!result.isConfirmed) {
                            return;
                        }
                    }
                } catch (error) {
                    console.error('Error during client check:', error);
                }

                // Create a hidden input for the action value
                const actionInput = document.createElement('input');
                actionInput.type = 'hidden';
                actionInput.name = 'action';
                actionInput.value = button.value;
                form.appendChild(actionInput);

                // Disable the submit button
                submitBtn.disabled = true;

                // Show loading state
                submitBtn.querySelector('.indicator-label').style.display = 'none';
                submitBtn.querySelector('.indicator-progress').style.display = 'block';

                // Submit the form
                form.submit();

                // Enable button after 5 seconds (in case of error)
                setTimeout(function() {
                    submitBtn.disabled = false;
                    submitBtn.querySelector('.indicator-label').style.display = 'block';
                    submitBtn.querySelector('.indicator-progress').style.display = 'none';
                }, 5000);
            }

            form.addEventListener('submit', function(e) {
                const clickedButton = document.activeElement;
                if (clickedButton === submitBtn) {
                    handleSubmit(e, clickedButton);
                }
            });
        });

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
            const initialCity = '{{ $client->city }}';
            if (initialCity) {
                $('#city').val(initialCity).trigger('change');
            }
        });
    </script>
@endpush
