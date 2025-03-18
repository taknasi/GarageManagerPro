<div wire:ignore.self class="modal fade" tabindex="-1" id="kt_modal_filter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px ">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="fw-bolder text-primary modal-title">Options de filtrage</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>

            <!--begin::Scroll-->
            <div class="modal-body ">
                <div class="d-flex flex-column me-n7 pe-7">
                    <div class="row">

                        <div class="col-sm-4 mb-5">
                            <label class="form-label">Immatriculation :</label>
                            <input class="form-control form-control-lg" type="text"
                                wire:model.defer='immatriculation' />
                        </div>


                        <div class="col-sm-4 mb-5">
                            <label class="form-label">Numero de chassis :</label>
                            <input class="form-control form-control-lg" type="text" wire:model.defer='n_chassis' />
                        </div>


                        <div class="col-sm-4 mb-5">
                            <label class="form-label">Marque :</label>
                            <input class="form-control form-control-lg" type="text" wire:model.defer='marque' />
                        </div>


                        <div class="col-sm-4 mb-5">
                            <label class="form-label">Modele :</label>
                            <input class="form-control form-control-lg" type="text" wire:model.defer='modele' />
                        </div>


                        <div class="col-sm-4 mb-5">
                            <label class="form-label">Annee de fabrication :</label>
                            <input class="form-control form-control-lg" type="text"
                                wire:model.defer='annee_fabrication' />
                        </div>


                        <div class="col-sm-4 mb-5">
                            <label class="form-label">Type de carburant :</label>
                            <div wire:ignore>

                                <select class="form-select sel" id="type_de_carburant" data-control="select2"
                                    data-hide-search="true">

                                    <option value="">Tous</option>
                                    <option value="essence">Essence</option>
                                    <option value="diesel">Diesel</option>
                                    <option value="hybride">Hybride</option>
                                    <option value="electrique">Électrique</option>
                                    <option value="gpl">GPL</option>
                                </select>

                            </div>
                        </div>


                        <div class="col-sm-4 mb-5">
                            <label class="form-label">Categorie :</label>
                            <div wire:ignore>
                                <select class="form-select sel" id="categorie_filter" data-control="select2"
                                    data-hide-search="true">
                                    <option value="">Tous</option>
                                    <option value="berline">Berline</option>
                                    <option value="suv">SUV</option>
                                    <option value="camionnette">Camionnette</option>
                                    <option value="moto">Moto</option>
                                    <option value="autre">Autre</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-sm-4 mb-5">
                            <label class="form-label">Couleur :</label>
                            <input class="form-control form-control-lg" type="text" wire:model.defer='couleur' />
                        </div>

                        <div class="col-sm-4 mb-5">
                            <label class="form-label">Utilisateur :</label>
                            <div wire:ignore>
                                <select class="form-select sel" id="user_filter" data-control="select2"
                                    data-hide-search="false" wire:model.defer="user_id">
                                    <option value="">Tous</option>
                                    @foreach (\App\Models\User::all() as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-8 mb-5">
                            <label class="form-label">Période de creation :</label>
                            <div class="d-flex" wire:ignore>
                                <input class="form-control form-control-lg me-2 flatpickr-input" type="date"
                                    wire:model.defer='dateDe' id="dateDe" readonly="readonly" />
                                <input class="form-control form-control-lg flatpickr-input" type="date"
                                    wire:model.defer='dateA' id="dateA" readonly="readonly" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" wire:click='resetInputFields'>Réinitialiser</button>
                <button type="button" id="kt_sign_in_submit" class="btn btn-primary " data-bs-dismiss="modal"
                    wire:click="$set('activateFilter',true)">
                    <span class="indicator-label">Rechercher</span>
                </button>
            </div>
            <!--end::Scroll-->

        </div>
    </div>
</div>
