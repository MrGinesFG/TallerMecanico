<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class BuscadorClientes extends Component
{
    use WithPagination;

    public string $search = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function eliminar(int $id): void
    {
        Cliente::findOrFail($id)->delete();

        session()->flash('success', 'Cliente eliminado correctamente.');
    }
    public function render()
    {
        $clientes = Cliente::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('nombre', 'like', '%' . $this->search . '%')
                      ->orWhere('apellido', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('apellido')
            ->paginate(10);

        return view('livewire.buscador-clientes', compact('clientes'));
    }
}