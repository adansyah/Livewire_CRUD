<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Invoice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="mb-2">
                        <label for="">Customer</label>
                        <input type="text" class="form-control" wire:model="customer">
                    </div>
                    <div class="mb-2">
                        <label for="">Status</label>
                        <select name="" class="form-control" id="" wire:model="status">
                            <option value="">~~ Select Status ~~</option>
                            <option value="Paid">Paid</option>
                            <option value="Unpaid">Unpaid</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="">Due Date</label>
                        <input type="date" class="form-control" wire:model="due_date">
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click="store()">Save changes</button>
            </div>
        </div>
    </div>
</div>
