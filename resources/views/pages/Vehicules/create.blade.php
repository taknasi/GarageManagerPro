@extends('layouts.app')

@section('title', 'Nouveau Véhicule | Garage Manager Pro')

@push('styles')
    <style>
        @media (min-width: 992px) {
            .app-content {
                margin-top: -109px !important;
            }
        }
    </style>
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
            <li class="breadcrumb-item text-white fw-bold lh-1">Véhicules</li>
            <!--end::Item-->
            <li class="breadcrumb-item">
                <i class="bi bi-arrow-right fs-7 text-gray-700 mx-n1"></i>
            </li>
            <li class="breadcrumb-item text-white fw-bold lh-1">Nouveau véhicule</li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Toolbar wrapper-->
    <!--begin::Toolbar wrapper-->
    <div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-13 pb-6">
        <!--begin::Page title-->
        <div class="page-title me-5">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-white fw-bold fs-2 flex-column justify-content-center my-0">
                Nouveau Véhicule
            </h1>
        </div>
        <!--end::Page title-->
    </div>
    <!--end::Toolbar wrapper-->
@endsection

@section('content')
    <div class="app-container container-xxl">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <!--begin::Content wrapper-->
            <div class="d-flex flex-column flex-column-fluid">
                <!--begin::Content-->
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    <form method="POST" action="{{ route('vehicules.store') }}" enctype="multipart/form-data"
                        id="vehicleForm">
                        @csrf
                        <!-- =======================
                                             SECTION A: INFORMATIONS DE BASE
                                             ======================= -->
                        <div class="card card-border-warning pt-3 mb-5">
                            <div class="card-header ">
                                <h3 class="card-title fw-bold text-gray-800 fs-4 "> Informations de base du véhicule :</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Immatriculation -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="immatriculation" class="form-label required">Immatriculation :</label>
                                        <div class="input-group">
                                            <input type="text" name="immatriculation"
                                                class="form-control @error('immatriculation') is-invalid @enderror"
                                                id="immatriculation" name="immatriculation"
                                                value="{{ old('immatriculation') }}" required />
                                            <span class="input-group-text">
                                                <i class="bi bi-card-text fs-2"></i>
                                            </span>
                                        </div>
                                        @error('immatriculation')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Numéro de châssis (VIN) -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="numero_chassis" class="form-label required">N° de châssis (VIN)
                                            :</label>
                                        <div class="input-group">
                                            <input type="text" name="n_chassis"
                                                class="form-control @error('numero_chassis') is-invalid @enderror"
                                                id="numero_chassis" name="numero_chassis"
                                                value="{{ old('numero_chassis') }}" required />
                                            <span class="input-group-text">
                                                <i class="bi bi-upc-scan fs-2"></i>
                                            </span>
                                        </div>
                                        @error('numero_chassis')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Marque -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="marque" class="form-label required">Marque :</label>
                                        <div class="input-group">
                                            <input type="text" name="marque"
                                                class="form-control @error('marque') is-invalid @enderror" id="marque"
                                                name="marque" value="{{ old('marque') }}" required />
                                            <span class="input-group-text">
                                                <i class="bi bi-tags fs-2"></i>
                                            </span>
                                        </div>
                                        @error('marque')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Modèle -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="modele" class="form-label required">Modèle :</label>
                                        <div class="input-group">
                                            <input type="text" name="modele"
                                                class="form-control @error('modele') is-invalid @enderror" id="modele"
                                                name="modele" value="{{ old('modele') }}" required />
                                            <span class="input-group-text">
                                                <i class="bi bi-card-list fs-2"></i>
                                            </span>
                                        </div>
                                        @error('modele')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Année de fabrication -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="annee_fabrication" class="form-label required">Année de fabrication
                                            :</label>
                                        <div class="input-group">
                                            <input type="number" name="annee_fabrication"
                                                class="form-control @error('annee_fabrication') is-invalid @enderror"
                                                id="annee_fabrication" name="annee_fabrication"
                                                value="{{ old('annee_fabrication') }}" required min="1900"
                                                max="{{ date('Y') + 2 }}" />
                                            <span class="input-group-text">
                                                <i class="bi bi-calendar-check fs-2"></i>
                                            </span>
                                        </div>
                                        @error('annee_fabrication')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
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
                                                        {{ old('type_carburant') === 'Essence' ? 'selected' : '' }}>Essence
                                                    </option>
                                                    <option value="Diesel"
                                                        {{ old('type_carburant') === 'Diesel' ? 'selected' : '' }}>Diesel
                                                    </option>
                                                    <option value="Hybride"
                                                        {{ old('type_carburant') === 'Hybride' ? 'selected' : '' }}>Hybride
                                                    </option>
                                                    <option value="Électrique"
                                                        {{ old('type_carburant') === 'Électrique' ? 'selected' : '' }}>
                                                        Électrique</option>
                                                    <option value="GPL"
                                                        {{ old('type_carburant') === 'GPL' ? 'selected' : '' }}>GPL
                                                    </option>
                                                </select>
                                            </div>

                                            <span class="input-group-text">
                                                <i class="bi bi-fuel-pump fs-2"></i>
                                            </span>
                                        </div>
                                        @error('type_carburant')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Catégorie du véhicule -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="categorie_vehicule" class="form-label required">Catégorie :</label>
                                        <div class="input-group">
                                            <div class="flex-fill">
                                                <select name="categorie" id="categorie_vehicule"
                                                    class="form-select rounded-0 rounded-start @error('categorie_vehicule') is-invalid @enderror"
                                                    data-control="select2" required>
                                                    <option value="">Sélectionner une catégorie</option>
                                                    <option value="Berline"
                                                        {{ old('categorie_vehicule') === 'Berline' ? 'selected' : '' }}>
                                                        Berline
                                                    </option>
                                                    <option value="SUV"
                                                        {{ old('categorie_vehicule') === 'SUV' ? 'selected' : '' }}>SUV
                                                    </option>
                                                    <option value="Camionnette"
                                                        {{ old('categorie_vehicule') === 'Camionnette' ? 'selected' : '' }}>
                                                        Camionnette</option>
                                                    <option value="Moto"
                                                        {{ old('categorie_vehicule') === 'Moto' ? 'selected' : '' }}>Moto
                                                    </option>
                                                    <option value="Autre"
                                                        {{ old('categorie_vehicule') === 'Autre' ? 'selected' : '' }}>Autre
                                                    </option>
                                                </select>
                                            </div>
                                            <span class="input-group-text">
                                                <i class="bi bi-truck fs-2"></i>
                                            </span>
                                        </div>
                                        @error('categorie_vehicule')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Couleur du véhicule -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="couleur_vehicule" class="form-label">Couleur :</label>
                                        <div class="input-group">
                                            <input type="text" name="couleur"
                                                class="form-control @error('couleur_vehicule') is-invalid @enderror"
                                                id="couleur_vehicule" name="couleur_vehicule"
                                                value="{{ old('couleur_vehicule') }}" />
                                            <span class="input-group-text">
                                                <i class="bi bi-palette fs-2"></i>
                                            </span>
                                        </div>
                                        @error('couleur_vehicule')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Image du véhicule -->
                                    <div class="col-4 text-center d-xl-block d-none d-flex align-self-center">
                                        <img src="{{ asset('assets/media/vehicule.png') }}" alt="Véhicule"
                                            class="w-100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- =======================
                                             SECTION B: INFORMATIONS TECHNIQUES
                                             ======================= -->
                        <div class="card card-border-warning pt-3 mb-5">
                            <div class="card-header border-0">
                                <h3 class="card-title fw-bold text-gray-800 fs-4">Caractéristiques & Entretien</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Kilométrage actuel -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="kilometrage_actuel" class="form-label">Kilométrage actuel :</label>
                                        <div class="input-group">
                                            <input type="number"
                                                class="form-control @error('kilometrage_actuel') is-invalid @enderror"
                                                id="kilometrage_actuel" name="kilometrage_actuel"
                                                value="{{ old('kilometrage_actuel') }}" min="0"
                                                placeholder="ex: 85000" />
                                            <span class="input-group-text">
                                                <i class="bi bi-speedometer2 fs-2"></i>
                                            </span>
                                        </div>
                                        @error('kilometrage_actuel')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Puissance fiscale -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="puissance_fiscale" class="form-label">Puissance fiscale :</label>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control @error('puissance_fiscale') is-invalid @enderror"
                                                id="puissance_fiscale" name="puissance_fiscale"
                                                value="{{ old('puissance_fiscale') }}" placeholder="ex: 5 CV" />
                                            <span class="input-group-text">
                                                <i class="bi bi-lightning fs-2"></i>
                                            </span>
                                        </div>
                                        @error('puissance_fiscale')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Caractéristiques spécifiques -->
                                    <div class="col-sm-12 mb-5">
                                        <label for="caracteristiques_specifiques" class="form-label">Caractéristiques
                                            spécifiques :</label>
                                        <textarea class="form-control @error('caracteristiques_specifiques') is-invalid @enderror"
                                            id="caracteristiques_specifiques" name="caracteristiques_specifiques" rows="2"
                                            placeholder="Ex: Boîte automatique, turbo, etc.">{{ old('caracteristiques_specifiques') }}</textarea>
                                        @error('caracteristiques_specifiques')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Historique d’entretien (exemple de champ résumé ou multi-champs) -->
                                <div class="row">
                                    <div class="col-sm-12 mb-5">
                                        <label for="historique_entretien" class="form-label">Historique d’entretien /
                                            réparations :</label>
                                        <textarea class="form-control @error('historique_entretien') is-invalid @enderror" id="historique_entretien"
                                            name="historique_entretien" rows="3"
                                            placeholder="Dates, pièces remplacées, main-d'œuvre, diagnostics, etc.">{{ old('historique_entretien') }}</textarea>
                                        @error('historique_entretien')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- =======================
                                             SECTION C: DOCUMENTATION ET GARANTIES
                                             ======================= -->
                        <div class="card card-border-warning pt-3 mb-5">
                            <div class="card-header border-0">
                                <h3 class="card-title fw-bold text-gray-800 fs-4">Documentation & Garanties</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Assurance -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="assurance_compagnie" class="form-label">Compagnie d’assurance
                                            :</label>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control @error('assurance_compagnie') is-invalid @enderror"
                                                id="assurance_compagnie" name="assurance_compagnie"
                                                value="{{ old('assurance_compagnie') }}" />
                                            <span class="input-group-text">
                                                <i class="bi bi-shield-check fs-2"></i>
                                            </span>
                                        </div>
                                        @error('assurance_compagnie')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="assurance_numero_police" class="form-label">Numéro de police :</label>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control @error('assurance_numero_police') is-invalid @enderror"
                                                id="assurance_numero_police" name="assurance_numero_police"
                                                value="{{ old('assurance_numero_police') }}" />
                                            <span class="input-group-text">
                                                <i class="bi bi-shield-lock fs-2"></i>
                                            </span>
                                        </div>
                                        @error('assurance_numero_police')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Date d’expiration de l’assurance -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="assurance_expiration" class="form-label">Date d'expiration :</label>
                                        <div class="input-group">
                                            <input type="date"
                                                class="form-control @error('assurance_expiration') is-invalid @enderror"
                                                id="assurance_expiration" name="assurance_expiration"
                                                value="{{ old('assurance_expiration') }}" />
                                            <span class="input-group-text">
                                                <i class="bi bi-calendar2-check fs-2"></i>
                                            </span>
                                        </div>
                                        @error('assurance_expiration')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Contrôle technique -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="controle_technique_date" class="form-label">Date du contrôle technique
                                            :</label>
                                        <div class="input-group">
                                            <input type="date"
                                                class="form-control @error('controle_technique_date') is-invalid @enderror"
                                                id="controle_technique_date" name="controle_technique_date"
                                                value="{{ old('controle_technique_date') }}" />
                                            <span class="input-group-text">
                                                <i class="bi bi-tools fs-2"></i>
                                            </span>
                                        </div>
                                        @error('controle_technique_date')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Validité et remarques du contrôle technique -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="controle_technique_validite" class="form-label">Validité :</label>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control @error('controle_technique_validite') is-invalid @enderror"
                                                id="controle_technique_validite" name="controle_technique_validite"
                                                value="{{ old('controle_technique_validite') }}"
                                                placeholder="ex: Valide jusqu'au..." />
                                            <span class="input-group-text">
                                                <i class="bi bi-patch-check fs-2"></i>
                                            </span>
                                        </div>
                                        @error('controle_technique_validite')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="controle_technique_remarques" class="form-label">Remarques CT
                                            :</label>
                                        <textarea class="form-control @error('controle_technique_remarques') is-invalid @enderror"
                                            id="controle_technique_remarques" name="controle_technique_remarques" rows="1"
                                            placeholder="Remarques spécifiques...">{{ old('controle_technique_remarques') }}</textarea>
                                        @error('controle_technique_remarques')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Garantie constructeur / extension -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="garantie_details" class="form-label">Détails de garantie :</label>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control @error('garantie_details') is-invalid @enderror"
                                                id="garantie_details" name="garantie_details"
                                                value="{{ old('garantie_details') }}"
                                                placeholder="Ex: Garantie constructeur 2 ans" />
                                            <span class="input-group-text">
                                                <i class="bi bi-cash-coin fs-2"></i>
                                            </span>
                                        </div>
                                        @error('garantie_details')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="garantie_fin" class="form-label">Date de fin :</label>
                                        <div class="input-group">
                                            <input type="date"
                                                class="form-control @error('garantie_fin') is-invalid @enderror"
                                                id="garantie_fin" name="garantie_fin"
                                                value="{{ old('garantie_fin') }}" />
                                            <span class="input-group-text">
                                                <i class="bi bi-calendar2-event fs-2"></i>
                                            </span>
                                        </div>
                                        @error('garantie_fin')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Documents associés -->
                                    <div class="col-sm-12 mb-5">
                                        <label for="documents_associes" class="form-label">Documents associés :</label>
                                        <textarea class="form-control @error('documents_associes') is-invalid @enderror" id="documents_associes"
                                            name="documents_associes" rows="2" placeholder="Ex: Scans (carte grise, assurance), liens...">{{ old('documents_associes') }}</textarea>
                                        @error('documents_associes')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- =======================
                                             SECTION D: PLANIFICATION & NOTIFICATIONS
                                             ======================= -->
                        <div class="card card-border-warning pt-3 mb-5">
                            <div class="card-header border-0">
                                <h3 class="card-title fw-bold text-gray-800 fs-4">Planification & Notifications</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Date entretien futur -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="date_entretien_futur" class="form-label">Date d’entretien futur
                                            :</label>
                                        <div class="input-group">
                                            <input type="date"
                                                class="form-control @error('date_entretien_futur') is-invalid @enderror"
                                                id="date_entretien_futur" name="date_entretien_futur"
                                                value="{{ old('date_entretien_futur') }}" />
                                            <span class="input-group-text">
                                                <i class="bi bi-calendar-event fs-2"></i>
                                            </span>
                                        </div>
                                        @error('date_entretien_futur')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Rappels -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="rappels" class="form-label">Rappels :</label>
                                        <textarea class="form-control @error('rappels') is-invalid @enderror" id="rappels" name="rappels" rows="1"
                                            placeholder="Ex: Contrôle technique prochainement, assurance à renouveler...">{{ old('rappels') }}</textarea>
                                        @error('rappels')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- =======================
                                             SUBMIT BUTTONS
                                             ======================= -->
                        <div class="d-flex">
                            <button type="submit" name="store" id="submitBtn" value="Enregistrer"
                                class="btn btn-primary me-2">
                                <span class="indicator-label">
                                    <i class="bi bi-check-lg fs-4 me-2"></i>Enregistrer
                                </span>
                                <span class="indicator-progress" style="display: none;">
                                    Veuillez patienter...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                            <button type="submit" name="store" id="submitAndNewBtn" value="save_and_new"
                                class="btn btn-light-primary me-2">
                                <span class="indicator-label">
                                    <i class="bi bi-check-lg fs-4 me-2"></i>Enregistrer et ajouter un autre
                                </span>
                                <span class="indicator-progress" style="display: none;">
                                    Veuillez patienter...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                            <a href="{{ route('vehicules.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left fs-4 me-2"></i>Retour
                            </a>
                        </div>
                    </form>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Content wrapper-->
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/global/select2-fr.min.js') }}"></script>
    <script>
        // Basic script to avoid double submission, similar to your new client form
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('vehicleForm');
            const submitBtn = document.getElementById('submitBtn');
            const submitAndNewBtn = document.getElementById('submitAndNewBtn');

            async function handleSubmit(e, button) {
                e.preventDefault();

                // Disable both buttons
                submitBtn.disabled = true;
                submitAndNewBtn.disabled = true;

                // Show loading state for clicked button
                button.querySelector('.indicator-label').style.display = 'none';
                button.querySelector('.indicator-progress').style.display = 'block';

                // Actually submit the form
                form.submit();

                // In case of error, re-enable after a few seconds
                setTimeout(function() {
                    submitBtn.disabled = false;
                    submitAndNewBtn.disabled = false;
                    button.querySelector('.indicator-label').style.display = 'block';
                    button.querySelector('.indicator-progress').style.display = 'none';
                }, 5000);
            }

            form.addEventListener('submit', function(e) {
                const clickedButton = document.activeElement;
                if (clickedButton === submitBtn || clickedButton === submitAndNewBtn) {
                    handleSubmit(e, clickedButton);
                }
            });
        });
    </script>
@endpush
