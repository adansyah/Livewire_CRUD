<?php

namespace App\Livewire;

use App\Models\Invoice;
use Livewire\Component;

class Admin extends Component
{

    public $customer;
    public $status;
    public $due_date;
    public $invoice_id;
    public $updateData = false;
    public function render()
    {
        $dataInvoice = Invoice::all();
        return view('livewire.admin', ['dataInvoice' => $dataInvoice]);
    }

    public function store()
    {
        $rules = [
            'customer' => 'required',
            'status' => 'required',
            'due_date' => 'required',
        ];
        $validated = $this->validate($rules);
        Invoice::create($validated);
        $this->dispatch('invoiceStored');
    }

    public function edit($id)
    {
        $data = Invoice::find($id);
        $this->customer = $data->customer;
        $this->status = $data->status;
        $this->due_date = $data->due_date;
        $this->invoice_id = $data->id;

        $this->updateData = true;
    }

    public function update()
    {
        $rules = [
            'customer' => 'required',
            'status' => 'required',
            'due_date' => 'required',
        ];
        $validated = $this->validate($rules);
        $data = Invoice::find($this->invoice_id);
        $data->update($validated);
        $this->dispatch('invoiceStored');
    }

    public function deleteConfirm($id)
    {
        $this->invoice_id = $id;
    }

    public function delete()
    {
        $id = $this->invoice_id;
        Invoice::find($id)->delete();
        $this->dispatch('invoiceStored');
    }
}
