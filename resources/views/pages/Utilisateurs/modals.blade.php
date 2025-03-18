<!--------------------------------------------------- add user ------------------------------------------------------------------------------------>

<div wire:ignore.self class="modal fade" tabindex="-1" id="kt_modal_add_user" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-450px">
        <div class="modal-content"
            style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('assets/media/abstract.svg') }}); background-repeat: no-repeat;">
            <div class="modal-header">
                <h3 class="fw-bolder text-primary modal-title">Nouveau utilisateur</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <form class="form" wire:submit.prevent="store">
                <!--begin::Scroll-->
                <div class="modal-body">
                    <div class="d-flex flex-column me-n7 pe-7">
                        <!--begin::Form-->


                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="form-label cm-bolder required">Nom Complet :</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <div class="input-group ">
                                <span class="input-group-text"><i class="bi bi-person-fill fs-2"></i></span>
                                <input class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    type="text" wire:model.defer='name' required />
                            </div>
                            @error('name')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="form-label cm-bolder required">Nom d'utilisateur :</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <div class="input-group ">
                                <span class="input-group-text"><i class="bi bi-fingerprint fs-2"></i></span>
                                <input class="form-control form-control-lg @error('user_name') is-invalid @enderror"
                                    type="text" wire:model.defer='user_name' required />
                            </div>
                            @error('user_name')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label cm-bolder  fs-6 mb-0 required">Mot de passe :</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Input wrapper-->


                            <div class="input-group ">
                                <span class="input-group-text"><i class="bi bi-eye-slash fs-2"></i></span>
                                <input id="password"
                                    class="form-control form-control-lg  @error('password') is-invalid @enderror "
                                    type="text" placeholder="" autocomplete="off" wire:model.defer="password"
                                    required />

                            </div>
                            @error('password')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <!--end::Input wrapper-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label cm-bolder  fs-6 mb-0 required">Confirmer le mot de passe
                                    :</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Input wrapper-->
                            <div class="input-group ">
                                <span class="input-group-text"><i class="bi bi-asterisk "></i></span>
                                <input id="password"
                                    class="form-control form-control-lg  @error('password_confirmation') is-invalid @enderror "
                                    type="text" placeholder="" autocomplete="off"
                                    wire:model.defer="password_confirmation" required />
                            </div>
                            @error('password_confirmation')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <!--end::Input wrapper-->
                        </div>

                        <div class="row ">
                            <div wire:ignore class="col-9">
                                <label for="exampleFormControlInput1" class="form-label">Profil
                                    :</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-circle fs-2"></i></span>
                                    <div class="flex-fill">
                                        <select class="form-select rounded-0 rounded-end" data-control="select2"
                                            data-placeholder="Veuillez choisir" data-hide-search="true"  id='profil'>
                                            <option value="Admin">Admin</option>
                                            <option value="Assistant(e)">Assistant(e)</option>
                                            <option selected value="Opérateur de saisie">Opérateur de saisie</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="exampleFormControlInput1" class="form-label mt-5">Active
                                    :</label>

                                <span class="form-check form-check-solid form-check-sm ms-3">
                                    <input class="form-check-input " type="checkbox" name="type"
                                        wire:model.defer='active' checked />
                                </span>

                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->

                        <!--end::Actions-->

                        <!--end::Form-->

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary ">
                        <span class="indicator-label">Enregistrer</span>
                    </button>
                </div>
                <!--end::Scroll-->
            </form>
        </div>
    </div>
</div>

<!--------------------------------------------------- update user ------------------------------------------------------------------------------------>

<div wire:ignore.self class="modal fade" tabindex="-1" id="kt_modal_update_user" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-450px">
        <div class="modal-content"
            style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('assets/media/abstract.svg') }}); background-repeat: no-repeat;">
            <div class="modal-header">
                <h3 class="fw-bolder text-primary modal-title">Modifier utilisateur</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <form class="form" wire:submit.prevent="update({{ $user_id }})">
                <!--begin::Scroll-->
                <div class="modal-body">
                    <div class="d-flex flex-column me-n7 pe-7">
                        <!--begin::Form-->


                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="form-label cm-bolder required">Nom Complet :</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <div class="input-group ">
                                <span class="input-group-text"><i class="bi bi-person-fill fs-2"></i></span>
                                <input class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    type="text" wire:model.defer='name' required />
                            </div>
                            @error('name')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="form-label cm-bolder required">Nom d'utilisateur :</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <div class="input-group ">
                                <span class="input-group-text"><i class="bi bi-fingerprint fs-2"></i></span>
                                <input class="form-control form-control-lg @error('user_name') is-invalid @enderror"
                                    type="text" wire:model.defer='user_name' required />
                            </div>
                            @error('user_name')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label cm-bolder  fs-6 mb-0 required">Mot de passe :</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Input wrapper-->


                            <div class="input-group ">
                                <span class="input-group-text"><i class="bi bi-eye-slash fs-2"></i></span>
                                <input id="password"
                                    class="form-control form-control-lg  @error('password') is-invalid @enderror "
                                    type="text" placeholder="" autocomplete="off" wire:model.defer="password"
                                     />

                            </div>
                            @error('password')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <!--end::Input wrapper-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label cm-bolder  fs-6 mb-0 required">Confirmer le mot de passe
                                    :</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Input wrapper-->
                            <div class="input-group ">
                                <span class="input-group-text"><i class="bi bi-asterisk "></i></span>
                                <input id="password"
                                    class="form-control form-control-lg  @error('password_confirmation') is-invalid @enderror "
                                    type="text" placeholder="" autocomplete="off"
                                    wire:model.defer="password_confirmation"  />
                            </div>
                            @error('password_confirmation')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <!--end::Input wrapper-->
                        </div>

                        <div class="row ">
                            <div wire:ignore class="col-9">
                                <label for="exampleFormControlInput1" class="form-label">Profil
                                    :</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-circle fs-2"></i></span>
                                    <div class="flex-fill">
                                        <select class="form-select rounded-0 rounded-end" data-control="select2"
                                            data-placeholder="Veuillez choisir" data-hide-search="true"  id='profilU'>
                                            <option value="Admin">Admin</option>
                                            <option value="Assistant(e)">Assistant(e)</option>
                                            <option value="Opérateur de saisie">Opérateur de saisie</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="exampleFormControlInput1" class="form-label mt-5">Active
                                    :</label>

                                <span class="form-check form-check-solid form-check-sm ms-3">
                                    <input class="form-check-input " type="checkbox" name="type"
                                        wire:model.defer='active' checked />
                                </span>

                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->

                        <!--end::Actions-->

                        <!--end::Form-->

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary ">
                        <span class="indicator-label">Enregistrer</span>
                    </button>
                </div>
                <!--end::Scroll-->
            </form>
        </div>
    </div>
</div>

<!-------------------------------------------- delete ------------------------------------------------------------------------------------>
<div wire:ignore.self class="modal fade " tabindex="-1" id="kt_modal_supprimer" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content border-bottom-5 border-warning">
            <div class="modal-header">
                <h5 class="modal-title"> Supprimer utilisateur </h5>


                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
            </div>
            <!--begin::Form-->
            <form class="form">
                <!--begin::Scroll-->
                <div class="modal-body">
                    <div class="d-flex flex-column me-n7 pe-7">
                        <div class="row">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack justify-content-start">
                                <i class="bi bi-trash text-danger fs-3x me-4"></i>
                                <!--begin::Content-->
                                <div class="fw-bold">
                                    <div class="fs-6 text-gray-700">
                                        <span class=" text-gray-600">Voulez-vous vraiment supprimer l'utilisateur :
                                            <span class="text-black">{{ $nameD }}</span> ?
                                        </span>
                                    </div>
                                </div>
                                <!--end::Content-->
                            </div>
                        </div>

                    </div>
                </div>
                <!--end::Scroll-->
                <!--begin::Actions-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" wire:click.prevent="delete" class="btn btn-danger"
                        data-bs-dismiss="modal">Supprimer</button>
                </div>
                <!--end::Actions-->
            </form>

            <!--end::Form-->
        </div>
    </div>
</div>
