@extends('layouts.app')

@section('title', 'Nouveau Client | Garage Manager Pro')

@push('styles')
@endpush('styles')

@section('content')
    <div class="app-container container-xxl">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <!--begin::Content wrapper-->
            <div class="d-flex flex-column flex-column-fluid">
                <!--begin::Content-->
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    <form method="POST" action="{{ route('clients.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card pt-3 mb-5 ">
                    
                            <!--begin::Card body-->
                            <div class="card-body">
                                <div class="row">
                                    <!-- TYPE -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="type" class="form-label required">Type de client :</label>
                                        <div class="input-group">
                                            <select name="type" id="type" 
                                                    class="form-select @error('type') is-invalid @enderror"
                                                    data-control="select2" data-placeholder="Choisir un type" required>
                                                <option value="particulier" 
                                                    {{ old('type') === 'particulier' ? 'selected' : '' }}>
                                                    Particulier
                                                </option>
                                                <option value="societe" 
                                                    {{ old('type') === 'societe' ? 'selected' : '' }}>
                                                    Société
                                                </option>
                                            </select>
                                            <span class="input-group-text">
                                                <i class="bi bi-people fs-2"></i>
                                            </span>
                                        </div>
                                        @error('type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                    
                                    <!-- CIVILITY (Radio button example or select) -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label class="form-label">Civilité :</label>
                                        <!-- Example with pills (radio-like) -->
                                        <ul class="nav nav-pills nav-pills-custom mb-3 d-flex">
                                            <li class="nav-item mb-3 me-3 flex-fill" onclick="setCivilite('Mr')">
                                                <a class="nav-link btn btn-outline btn-flex btn-active-color-primary flex-column 
                                                       overflow-hidden w-100 h-85px pt-5 pb-2
                                                       @if (old('civility') == 'Mr' || !old('civility')) active @endif"
                                                   data-bs-toggle="pill">
                                                    <div class="nav-icon mb-3">
                                                        <i class="fa fa-person fs-1 p-0"></i>
                                                    </div>
                                                    <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1">Mr</span>
                                                    <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                                </a>
                                            </li>
                                            <li class="nav-item mb-3 flex-fill" onclick="setCivilite('Mme')">
                                                <a class="nav-link btn btn-outline btn-flex btn-active-color-primary flex-column 
                                                       overflow-hidden w-100 h-85px pt-5 pb-2
                                                       @if (old('civility') == 'Mme') active @endif"
                                                   data-bs-toggle="pill">
                                                    <div class="nav-icon mb-3">
                                                        <i class="fa fa-person-dress fs-1 p-0"></i>
                                                    </div>
                                                    <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1">Mme</span>
                                                    <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                                </a>
                                            </li>
                                        </ul>
                                        <input type="hidden" 
                                               name="civility" 
                                               id="civility" 
                                               value="{{ old('civility') ?? 'Mr' }}">
                                        @error('civility')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                    
                                    <!-- FULL_NAME -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="full_name" class="form-label required">Nom complet :</label>
                                        <div class="input-group">
                                            <input type="text" 
                                                   class="form-control @error('full_name') is-invalid @enderror"
                                                   id="full_name"
                                                   name="full_name" 
                                                   value="{{ old('full_name') }}" required />
                                            <span class="input-group-text">
                                                <i class="bi bi-person-check-fill fs-2"></i>
                                            </span>
                                        </div>
                                        @error('full_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                    
                                    <!-- COMPANY_NAME (shown if type=societe) -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="company_name" class="form-label">Raison sociale (Société) :</label>
                                        <div class="input-group">
                                            <input type="text" 
                                                   class="form-control @error('company_name') is-invalid @enderror"
                                                   id="company_name"
                                                   name="company_name" 
                                                   value="{{ old('company_name') }}" />
                                            <span class="input-group-text">
                                                <i class="bi bi-building fs-2"></i>
                                            </span>
                                        </div>
                                        @error('company_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                    
                                    <!-- LEGAL_FORM (Société) -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="legal_form" class="form-label">Forme juridique :</label>
                                        <div class="input-group">
                                            <input type="text" 
                                                   class="form-control @error('legal_form') is-invalid @enderror"
                                                   id="legal_form"
                                                   name="legal_form"
                                                   placeholder="Ex: SARL, SAS..." 
                                                   value="{{ old('legal_form') }}" />
                                            <span class="input-group-text">
                                                <i class="bi bi-briefcase fs-2"></i>
                                            </span>
                                        </div>
                                        @error('legal_form')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                    
                                    <!-- CONTACT_PERSON (Société) -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="contact_person" class="form-label">Contact / Gérant :</label>
                                        <div class="input-group">
                                            <input type="text" 
                                                   class="form-control @error('contact_person') is-invalid @enderror"
                                                   id="contact_person"
                                                   name="contact_person" 
                                                   placeholder="Nom du contact"
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
                                        <label for="rc_number" class="form-label">Numéro de registre de commerce (RC) :</label>
                                        <div class="input-group">
                                            <input type="text" 
                                                   class="form-control @error('rc_number') is-invalid @enderror"
                                                   id="rc_number"
                                                   name="rc_number"
                                                   value="{{ old('rc_number') }}" />
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
                                            <input type="text" 
                                                   class="form-control @error('ice') is-invalid @enderror"
                                                   id="ice"
                                                   name="ice" 
                                                   value="{{ old('ice') }}" />
                                            <span class="input-group-text">
                                                <i class="bi bi-123 fs-2"></i>
                                            </span>
                                        </div>
                                        @error('ice')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                    
                                    <!-- PHONE -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="phone" class="form-label">Téléphone :</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-telephone fs-2"></i>
                                            </span>
                                            <input type="tel" 
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   id="phone"
                                                   name="phone" 
                                                   value="{{ old('phone') }}" />
                                        </div>
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                    
                                    <!-- EMAIL -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="email" class="form-label">Email :</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-envelope fs-2"></i>
                                            </span>
                                            <input type="email" 
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   id="email"
                                                   name="email" 
                                                   value="{{ old('email') }}" />
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                    
                                    <!-- ADDRESS -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="address" class="form-label">Adresse :</label>
                                        <textarea class="form-control @error('address') is-invalid @enderror"
                                                  id="address"
                                                  name="address" rows="2">{{ old('address') }}</textarea>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                    
                                    <!-- CITY -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="city" class="form-label">Ville :</label>
                                        <div class="input-group">
                                            <input type="text" 
                                                   class="form-control @error('city') is-invalid @enderror"
                                                   id="city"
                                                   name="city"
                                                   value="{{ old('city') }}" />
                                            <span class="input-group-text">
                                                <i class="bi bi-geo-alt fs-2"></i>
                                            </span>
                                        </div>
                                        @error('city')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                    
                                    <!-- NOTES -->
                                    <div class="col-sm-6 col-xl-4 mb-5">
                                        <label for="notes" class="form-label">Notes :</label>
                                        <textarea class="form-control @error('notes') is-invalid @enderror"
                                                  id="notes"
                                                  name="notes" rows="2"
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
                            <button type="submit" class="btn btn-primary" name="store" value="Enregistrer et ajouter un autre">
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
 <!-- OPTIONAL: JavaScript to handle civility radio-pill selection -->
 <script>
    function setCivilite(value) {
        document.getElementById('civility').value = value;
    }
</script>
@endpush('scripts')