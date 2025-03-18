<!-------------------------------------------- delete ------------------------------------------------------------------------------------>
<div wire:ignore.self class="modal fade " tabindex="-1" id="kt_modal_supprimer" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content border-bottom-5 border-warning">
            <div class="modal-header">
                <h5 class="modal-title"> Supprimer client </h5>


                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
            </div>
            <!--begin::Form-->
            <div wire:loading>
                <div class="d-flex justify-content-center align-items-center py-10">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

            </div>
            <form class="form" wire:loading.remove>
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
                                        <span class=" text-gray-600">Voulez-vous vraiment supprimer le client :
                                            <span class="text-black">{{ $deleteNomClient }}</span> ?
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