<!-------------------------------------------- Ville --------------------------------------------------------------------------------------------->
<div class="modal fade " tabindex="1" id="kt_modal_ville" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-420px ">
        <div class="modal-content border-bottom-5 border-warning">
            <div class="modal-header">

                <div></div>
                <h3 class="modal-title cm-bolder text-primary ">Ajouter une nouvelle ville</h3>

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
            @livewire('villes')
            <!--end::Form-->
        </div>
    </div>
</div>
