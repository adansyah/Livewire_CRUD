<div>
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>User</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModal">Add User <i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Invoice ID</th>
                                            <th>Name</th>
                                            <th>EMail</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataUser as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td class="font-weight-600">{{ $value->name }}</td>
                                                <td class="font-weight-600">{{ $value->email }}</td>

                                                <td>{{ Carbon\Carbon::parse($value->created_at)->translatedformat('d F Y') }}
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#exampleModal"
                                                        wire:click="edit({{ $value->id }})">Edit</button>
                                                    <button type="button" data-toggle="modal"
                                                        data-target="#deleteModal"
                                                        wire:click="deleteConfirm({{ $value->id }})"
                                                        class="btn btn-danger">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        {{-- Modal --}}
        <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-2">
                                <label for="">Name</label>
                                <input type="text" class="form-control" wire:model="name">
                            </div>
                            <div class="mb-2">
                                <label for="">email</label>
                                <input type="text" class="form-control" wire:model="email">
                            </div>
                            {{-- 
                            <div class="mb-2">
                                <label for="">Due Date</label>
                                <input type="date" class="form-control" wire:model="created_at">
                            </div> --}}
                        </form>
                    </div>
                    <div class="modal-footer br">
                        @if ($updateData == false)
                            <button type="button" class="btn btn-primary" wire:click="store()">Save</button>
                        @else
                            <button type="button" class="btn btn-primary" wire:click="update()">Update</button>
                        @endif
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Delete Modal --}}
        <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Yakin Mau Hapus Data Ini?
                    </div>
                    <div class="modal-footer br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <button type="button" class="btn btn-primary" wire:click="delete()">Iya</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('livewire:initialized', () => {
                Livewire.on('invoiceStored', () => {
                    $('#exampleModal').modal('hide');

                    // Fix: hapus backdrop secara paksa setelah modal ditutup
                    setTimeout(() => {
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                    }, 500);
                });
            });
        </script>
    </div>
</div>
