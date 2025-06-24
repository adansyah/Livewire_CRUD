<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Pengguna extends Component
{
    public $name;
    public $email;
    public $password;
    public $user_id;
    public $updateData = false;
    public function render()
    {
        $dataUser = User::all();
        return view('livewire.pengguna', ['dataUser' => $dataUser]);
    }

    public function store()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];
        $validated = $this->validate($rules);
        $validated = bcrypt($validated['password']);
        User::create($validated);
        $this->dispatch('invoiceStored');
    }

    public function edit($id)
    {
        $data = User::find($id);
        $this->name = $data->name;
        $this->email = $data->email;
        $this->password = $data->password;
        $this->user_id = $data->id;

        $this->updateData = true;
    }

    public function update()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'paswword' => 'required',
        ];
        $validated = $this->validate($rules);
        $validated = bcrypt($validated['password']);
        $data = User::find($this->invoice_id);
        $data->update($validated);
        $this->dispatch('invoiceStored');
    }

    public function deleteConfirm($id)
    {
        $this->user_id = $id;
    }

    public function delete()
    {
        $id = $this->invoice_id;
        User::find($id)->delete();
        $this->dispatch('invoiceStored');
    }
}
