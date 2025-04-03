<div>
    <form class="form">
        <div class="modal-body px-8 py-0">
            <div class="input-group mt-6">
                <input type="text" class="form-control @error('ville') is-invalid @enderror" placeholder="Ville.."
                wire:model.defer='ville' wire:model.debounce.300ms="search" />

                <button type="button"
                    class="btn btn-primary input-group-text "@if ($idVille) wire:click='update' @else wire:click='store' @endif>
                    Enregistrer
                </button>
                <button type="button" class="btn btn-warning input-group-text " wire:click='resetInputFields'
                    title="Réinitialiser">
                    <i class="bi bi-skip-backward fs-1"></i>
                </button>
            </div>
            @error('ville')
                <div class="fv-plugins-message-container invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            @if ($showNoticeUpdate)
                <div class="notice d-flex bg-light-danger rounded border-danger border border-dashed my-5 p-4">
                    <div class="fs-6 text-gray-700">Vous modifiez actuellement la ville : <span
                            class="fw-bolder text-black">{{ $ville }} . </span> Pour annuler, cliquez sur <i
                            class="bi bi-skip-backward text-danger fs-2 mt-1"></i>
                    </div>
                </div>
            @endif

            <div class="separator separator-dashed separator-content border-warning mt-9 mb-4"><i
                    class="bi bi-check2-circle fs-2 text-primary"></i>
            </div>

            <div class="mb-10">
                <div class="mh-300px scroll-y me-n7 pe-7">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_patients_table">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th scope="col" class="cursor-pointer text-center"
                                        wire:click="sortBy('ville')">Ville
                                        @include('shared.sort-icon', ['field' => 'ville'])
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="fw-bold text-gray-600">
                                @forelse ($villes as $ville)
                                    <tr>
                                        <td>
                                            {{ $ville->ville }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                <button type="button" wire:click='edit({{ $ville->id }})'
                                                    class="btn btn-icon btn-bg-light btn-active-color-info btn-sm me-1"
                                                    data-bs-toggle="tooltip" data-bs-original-title="Modifier"
                                                    aria-label="Modifier" title="Modifier">
                                                    <i class="bi bi-pencil-fill pe-0"></i>
                                                </button>

                                                <button type="button" wire:click='delete({{ $ville->id }})'
                                                    class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-original-title="Supprimer"
                                                    aria-label="Supprimer" title="Supprimer">
                                                    <i class="bi bi-trash-fill pe-0"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center text-muted">Aucune donnée à afficher</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
