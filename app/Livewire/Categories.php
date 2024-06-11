<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public  $is_create = false,
            $is_edit = false,
            $name,
            $created_by,
            $category;

    public function render()
    {
        return view('livewire.categories', [
            'listCategory'  => Category::all(),
        ]);
    }

    public function openModalEdit()
    {
        return $this->is_edit = true;
    }

    public function closeModalEdit()
    {
        return $this->is_edit = false;

        $this->reset('name');

        $this->resetValidation('name');
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
            'name'  => 'required|min:5|unique:categories,name'
        ],[
            'name.required'     => 'Nama Kategori wajib diisi..',
            'name.min'          => 'Nama kategori minimal 5 karakter..',
            'name.unique'       => 'Nama kategori sudah digunakan..'
        ]);

        Category::create([
            'name'          => $this->name,
            'created_by'    => auth()->user()->name
        ]);

        $this->closeModalCreate();

    }

    public function editCategory($idCategory)
    {
        $category = Category::findOrFail($idCategory);

        $this->openModalEdit();
        
        $this->category = $category;

        $this->name = $category->name;
    }

    public function updateCategory($idCategory) 
    {
        $category = Category::findOrFail($idCategory);

        $category->update([
            'name'  => $this->name
        ]);

        $this->closeModalEdit();

    }


}
