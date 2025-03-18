@extends('layouts.app')

@section('title', 'Modifier vehicule | Garage Manager Pro')

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
            <li class="breadcrumb-item text-white fw-bold lh-1">Vehicules</li>
            <!--end::Item-->
            <li class="breadcrumb-item">
                <i class="bi bi-arrow-right fs-7 text-gray-700 mx-n1"></i>
            </li>
            <li class="breadcrumb-item text-white fw-bold lh-1">Modifier vehicule</li>
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
                Modifier Vehicule
            </h1>
        </div>

        <div class="d-flex align-self-center flex-center flex-shrink-0">
            <label for="exampleFormControlInput1" class="form-label fs-5 fw-bolder text-gray-600 d-block mt-1 ">Nom
                d'utilisateur :
            </label>

            <span class=" badge py-3 px-4 fs-6 badge-light ms-2">{{ $vehicule->user->name }}
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
                    <form method="POST" action="{{ route('vehicules.update', $vehicule->id) }}"
                        enctype="multipart/form-data" id="form">
                        @csrf
                        @method('PUT')
                        <div class="card-border-warning card pt-3 mb-5 ">

                            <!--begin::Card body-->
                            <div class="card-header ">
                                <h3 class="card-title fw-bold text-gray-800 fs-4 "> Informations de base du véhicule :</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Immatriculation -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="immatriculation" class="form-label required">Immatriculation :</label>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control @error('immatriculation') is-invalid @enderror"
                                                id="immatriculation" name="immatriculation"
                                                value="{{ $vehicule->immatriculation }}" required />
                                            <span class="input-group-text">
                                                <i class="bi bi-card-text fs-2"></i>
                                            </span>
                                        </div>
                                        @error('immatriculation')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Numéro de châssis (VIN) -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="n_chassis" class="form-label required">N° de châssis :</label>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control @error('n_chassis') is-invalid @enderror" id="n_chassis"
                                                name="n_chassis" value="{{ $vehicule->n_chassis }}" required />
                                            <span class="input-group-text">
                                                <i class="bi bi-upc-scan fs-2"></i>
                                            </span>
                                        </div>
                                        @error('n_chassis')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Marque -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="marque" class="form-label required">Marque :</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('marque') is-invalid @enderror"
                                                id="marque" name="marque" value="{{ $vehicule->marque }}" required />
                                            <span class="input-group-text">
                                                <i class="bi bi-tags fs-2"></i>
                                            </span>
                                        </div>
                                        @error('marque')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Modèle -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="modele" class="form-label required">Modele :</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('modele') is-invalid @enderror"
                                                id="modele" name="modele" value="{{ $vehicule->modele }}" required />
                                            <span class="input-group-text">
                                                <i class="bi bi-card-list fs-2"></i>
                                            </span>
                                        </div>
                                        @error('modele')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Année de fabrication -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="annee_fabrication" class="form-label required">Annee de fabrication
                                            :</label>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control @error('annee_fabrication') is-invalid @enderror"
                                                id="annee_fabrication" name="annee_fabrication"
                                                value="{{ $vehicule->annee_fabrication }}" required />
                                            <span class="input-group-text">
                                                <i class="bi bi-calendar-check fs-2"></i>
                                            </span>
                                        </div>
                                        @error('annee_fabrication')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Type de carburant -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="type_carburant" class="form-label required">Type de carburant :</label>
                                        <div class="input-group">

                                            <div class="flex-fill">
                                                <select name="type_carburant" id="type_carburant"
                                                    class="form-select rounded-0 rounded-start @error('type_carburant') is-invalid @enderror"
                                                    data-control="select2" required>
                                                    <option value="">Sélectionner un type</option>
                                                    <option value="Essence"
                                                        {{ old('type_carburant', $vehicule->type_carburant) === 'Essence' ? 'selected' : '' }}>
                                                        Essence
                                                    </option>
                                                    <option value="Diesel"
                                                        {{ old('type_carburant', $vehicule->type_carburant) === 'Diesel' ? 'selected' : '' }}>
                                                        Diesel
                                                    </option>
                                                    <option value="Hybride"
                                                        {{ old('type_carburant', $vehicule->type_carburant) === 'Hybride' ? 'selected' : '' }}>
                                                        Hybride
                                                    </option>
                                                    <option value="Électrique"
                                                        {{ old('type_carburant', $vehicule->type_carburant) === 'Électrique' ? 'selected' : '' }}>
                                                        Électrique</option>
                                                    <option value="GPL"
                                                        {{ old('type_carburant', $vehicule->type_carburant) === 'GPL' ? 'selected' : '' }}>
                                                        GPL</option>
                                                </select>
                                            </div>


                                            <span class="input-group-text">
                                                <i class="bi bi-fuel-pump fs-2"></i>
                                            </span>
                                        </div>
                                        @error('type_carburant')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Catégorie du véhicule -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="categorie" class="form-label required">Categorie :</label>
                                        <div class="input-group">
                                            <div class="flex-fill">
                                                <select name="categorie" id="categorie"
                                                    class="form-select rounded-0 rounded-start  @error('categorie') is-invalid @enderror"
                                                    data-control="select2" required>
                                                    <option value="">Sélectionner une catégorie</option>
                                                    <option value="Berline"
                                                        {{ old('categorie', $vehicule->categorie) === 'Berline' ? 'selected' : '' }}>
                                                        Berline
                                                    </option>
                                                    <option value="SUV"
                                                        {{ old('categorie', $vehicule->categorie) === 'SUV' ? 'selected' : '' }}>
                                                        SUV
                                                    </option>
                                                    <option value="Camionnette"
                                                        {{ old('categorie', $vehicule->categorie) === 'Camionnette' ? 'selected' : '' }}>
                                                        Camionnette</option>
                                                    <option value="Moto"
                                                        {{ old('categorie', $vehicule->categorie) === 'Moto' ? 'selected' : '' }}>
                                                        Moto
                                                    </option>
                                                    <option value="Autre"
                                                        {{ old('categorie', $vehicule->categorie) === 'Autre' ? 'selected' : '' }}>
                                                        Autre
                                                    </option>
                                                </select>
                                            </div>
                                            <span class="input-group-text">
                                                <i class="bi bi-truck fs-2"></i>
                                            </span>
                                        </div>
                                        @error('categorie')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Couleur du véhicule -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="couleur" class="form-label ">Couleur :</label>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control @error('couleur') is-invalid @enderror" id="couleur"
                                                name="couleur" value="{{ $vehicule->couleur }}" required />
                                            <span class="input-group-text">
                                                <i class="bi bi-palette fs-2"></i>
                                            </span>
                                        </div>
                                        @error('couleur')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Image du véhicule -->
                                    <div class="col-4 text-center d-xl-block d-none d-flex align-self-center">
                                        <img src="{{ asset('assets/media/vehicule.png') }}" alt="Véhicule"
                                            class="w-100">
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
                            <a href="{{ route('vehicules.index') }}" class="btn btn-secondary">
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
        // Exécuter après le chargement du DOM
        document.addEventListener('DOMContentLoaded', function() {
            const immatriculation = document.getElementById('immatriculation');
            const n_chassis = document.getElementById('n_chassis');
            const marque = document.getElementById('marque');
            const modele = document.getElementById('modele');
            const annee_fabrication = document.getElementById('annee_fabrication');
            const type_carburant = document.getElementById('type_carburant');
            const categorie = document.getElementById('categorie');
            const couleur = document.getElementById('couleur');
            const submitBtn = document.getElementById('submitBtn');
            const form = document.getElementById('form');
            const currentVehiculeId = '{{ $vehicule->id ?? '' }}'; // Gérer le cas où $vehicule->id est null

            async function handleSubmit(e, button) {
                e.preventDefault(); // Empêcher la soumission par défaut

                // Désactiver le bouton avant la soumission
                submitBtn.disabled = true;
                submitBtn.querySelector('.indicator-label').style.display = 'none';
                submitBtn.querySelector('.indicator-progress').style.display = 'block';

                try {
                    form.submit();
                } catch (error) {
                    console.error('Erreur lors de la soumission du formulaire:', error);
                    submitBtn.disabled = false;
                }

                // Réactiver le bouton après 5 secondes en cas d'échec
                setTimeout(() => {
                    submitBtn.disabled = false;
                    submitBtn.querySelector('.indicator-label').style.display = 'block';
                    submitBtn.querySelector('.indicator-progress').style.display = 'none';
                }, 5000);
            }

            form.addEventListener('submit', function(e) {
                if (document.activeElement === submitBtn) {
                    handleSubmit(e, submitBtn);
                }
            });
        });
    </script>
@endpush
