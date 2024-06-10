<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public  $is_create = false,
            $name,
            $created_by;

    public function render()
    {
        return view('livewire.categories', [
            'listCategory'  => Category::all(),
        ]);
    }

    public function openModalCreate()
    {
        return $this->is_create = true;
    }

    public function closeModalCreate()
    {
        $this->is_create = false;

        $this->resetValidation('name');

    }

    public function createKategori()
    {
        $this->reset('name');

        $this->openModalCreate();
    }

    public function storeKategori()
    {
        $this->validate([
            'name'  => 'required|min:5'
        ],[
            'name.required'     => 'Nama Kategori wajib diisi..',
            'name.min'          => 'Nama kategori minimal 5 karakter..'
        ]);

        Category::create([
            'name'          => $this->name,
            'created_by'    => auth()->user()->name
        ]);

        $this->closeModalCreate();

    }


}
