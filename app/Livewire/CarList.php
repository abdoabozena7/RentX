<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * مكون يعرض قائمة السيارات لزوار الموقع.
 * يدعم البحث عن اسم السيارة أو الموديل مع ترقيم الصفحات.
 */
class CarList extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $cars = Car::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('model', 'like', '%' . $this->search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(9);

        return view('livewire.car-list', [
            'cars' => $cars,
        ]);
    }
}