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
                        <!-- ID Client -->
                        <div class="col-sm-4 mb-5">
                            <label class="form-label">ID Client :</label>
                            <input class="form-control form-control-lg" type="text" wire:model.defer='id_client' />
                        </div>

                        <!-- Type -->
                        <div class="col-sm-4 mb-5">
                            <label class="form-label">Type :</label>
                            <div wire:ignore>
                                <select class="form-select sel" id="type_filter" data-control="select2"
                                    data-hide-search="true">
                                    <option value="">Tous</option>
                                    <option value="particulier">Particulier</option>
                                    <option value="societe">Société</option>
                                </select>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="col-sm-4 mb-5">
                            <label class="form-label">Téléphone :</label>
                            <input class="form-control form-control-lg" type="text" wire:model.defer='phone' />
                        </div>

                        <!-- Email -->
                        <div class="col-sm-4 mb-5">
                            <label class="form-label">Email :</label>
                            <input class="form-control form-control-lg" type="text" wire:model.defer='email' />
                        </div>

                        <!-- Civility -->
                        <div class="col-sm-4 mb-5">
                            <label class="form-label">Civilité :</label>
                            <div wire:ignore>
                                <select class="form-select sel" id="civility_filter" data-control="select2"
                                    data-hide-search="true">
                                    <option value="">Tous</option>
                                    <option value="Monsieur">Monsieur</option>
                                    <option value="Madame">Madame</option>
                                </select>
                            </div>
                        </div>

                        <!-- Full Name -->
                        <div class="col-sm-4 mb-5">
                            <label class="form-label">Nom Complet :</label>
                            <input class="form-control form-control-lg" type="text" wire:model.defer='full_name' />
                        </div>

                        <!-- Company Name -->
                        <div class="col-sm-4 mb-5">
                            <label class="form-label">Raison Sociale :</label>
                            <input class="form-control form-control-lg" type="text"
                                wire:model.defer='company_name' />
                        </div>

                        <!-- Legal Form -->
                        <div class="col-sm-4 mb-5">
                            <label class="form-label">Forme Juridique :</label>
                            <div wire:ignore>
                                <select class="form-select sel" id="legal_form_filter" data-control="select2"
                                    data-hide-search="true">
                                    <option value="">Tous</option>
                                    <option value="SA">Société Anonyme</option>
                                    <option value="SARL">Société à Responsabilité Limitée</option>
                                    <option value="SARL AU">SARL à Associé Unique</option>
                                    <option value="SNC">Société en Nom Collectif</option>
                                    <option value="SCS">Société en Commandite Simple</option>
                                    <option value="SCA">Société en Commandite par Actions</option>
                                    <option value="GIE">Groupement d'Intérêt Économique</option>
                                    <option value="SP">Société en Participation</option>
                                    <option value="SUCCURSALE">Succursale</option>
                                    <option value="AUTO ENTREPRENEUR">Auto Entrepreneur</option>

                                </select>
                            </div>
                        </div>

                        <!-- Contact Person -->
                        <div class="col-sm-4 mb-5">
                            <label class="form-label">Personne Contact :</label>
                            <input class="form-control form-control-lg" type="text"
                                wire:model.defer='contact_person' />
                        </div>

                        <!-- RC Number -->
                        <div class="col-sm-4 mb-5">
                            <label class="form-label">N° RC :</label>
                            <input class="form-control form-control-lg" type="text"
                                wire:model.defer='rc_number' />
                        </div>

                        <!-- ICE -->
                        <div class="col-sm-4 mb-5">
                            <label class="form-label">ICE :</label>
                            <input class="form-control form-control-lg" type="text" wire:model.defer='ice' />
                        </div>

                        <!-- Address -->
                        <div class="col-sm-4 mb-5">
                            <label class="form-label">Adresse :</label>
                            <input class="form-control form-control-lg" type="text" wire:model.defer='address' />
                        </div>

                        <!-- City -->
                        <div class="col-sm-4 mb-5">
                            <label class="form-label">Ville :</label>
                            <div wire:ignore>
                                <select class="form-select sel" id="city" data-control="select2"
                                    data-hide-search="false">
                                    <option value="">Tous</option>
                                    <option value="Agadir">Agadir</option>
                                    <option value="Al Hoceima">Al Hoceima</option>
                                    <option value="Assilah">Assilah</option>
                                    <option value="Azemmour">Azemmour</option>
                                    <option value="Azrou">Azrou</option>
                                    <option value="Beni Mellal">Beni Mellal</option>
                                    <option value="Berkane">Berkane</option>
                                    <option value="Berrechid">Berrechid</option>
                                    <option value="Casablanca">Casablanca</option>
                                    <option value="Chefchaouen">Chefchaouen</option>
                                    <option value="Dakhla">Dakhla</option>
                                    <option value="El Jadida">El Jadida</option>
                                    <option value="Errachidia">Errachidia</option>
                                    <option value="Essaouira">Essaouira</option>
                                    <option value="Fès">Fès</option>
                                    <option value="Fnideq">Fnideq</option>
                                    <option value="Guelmim">Guelmim</option>
                                    <option value="Ifrane">Ifrane</option>
                                    <option value="Kénitra">Kénitra</option>
                                    <option value="Khemisset">Khemisset</option>
                                    <option value="Khouribga">Khouribga</option>
                                    <option value="Ksar El Kebir">Ksar El Kebir</option>
                                    <option value="Laâyoune">Laâyoune</option>
                                    <option value="Larache">Larache</option>
                                    <option value="Marrakech">Marrakech</option>
                                    <option value="Martil">Martil</option>
                                    <option value="Meknès">Meknès</option>
                                    <option value="Mohammedia">Mohammedia</option>
                                    <option value="Nador">Nador</option>
                                    <option value="Ouarzazate">Ouarzazate</option>
                                    <option value="Oued Zem">Oued Zem</option>
                                    <option value="Oujda">Oujda</option>
                                    <option value="Rabat">Rabat</option>
                                    <option value="Safi">Safi</option>
                                    <option value="Salé">Salé</option>
                                    <option value="Sefrou">Sefrou</option>
                                    <option value="Settat">Settat</option>
                                    <option value="Sidi Bennour">Sidi Bennour</option>
                                    <option value="Sidi Ifni">Sidi Ifni</option>
                                    <option value="Sidi Kacem">Sidi Kacem</option>
                                    <option value="Sidi Slimane">Sidi Slimane</option>
                                    <option value="Skhirat">Skhirat</option>
                                    <option value="Tan-Tan">Tan-Tan</option>
                                    <option value="Tanger">Tanger</option>
                                    <option value="Taroudant">Taroudant</option>
                                    <option value="Taza">Taza</option>
                                    <option value="Témara">Témara</option>
                                    <option value="Tétouan">Tétouan</option>
                                    <option value="Tiznit">Tiznit</option>
                                    <option value="Youssoufia">Youssoufia</option>
                                    <option value="Zagora">Zagora</option>
                                </select>
                            </div>
                        </div>

                        <!-- Date Range -->
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
