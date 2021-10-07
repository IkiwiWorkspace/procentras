<div>
    <button type="button" class="btn btn-outline-primary" style="margin-top: 12px;" data-toggle="modal"
        data-target="#exampleModal">
        Pridėti naują +
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="save">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Sukurti naują variaciją</h5>
                        <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Pavadinimas:
                        <br />
                        <input wire:model="name" class="form-control @error('name') is-invalid @enderror" />
                        @error('name')
                            <span class=" invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Išsaugoti</button>
                        <button wire:click="closeModal" type="button" class="btn btn-secondary"
                            data-dismiss="modal">Uždaryti
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
