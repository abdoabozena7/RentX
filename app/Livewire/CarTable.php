<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * مكون يعرض جدول السيارات فى لوحة التحكم مع خيارات الحذف.
 */
class CarTable extends Component
{
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    public $selectedId = null;
    public function updatingSearch(){ $this->resetPage(); }
    public function edit($id)
    {
        $this->selectedId = $id;
    }
    public function delete($id)
    {
        Car::findOrFail($id)->delete();
        session()->flash('success','تم حذف السيارة');
    }
    public function clearForm()
    {
        $this->selectedId = null;
    }
    public function render()
    {
        $cars = Car::query()
            ->when($this->search, function($q){
                $q->where('name','like','%'.$this->search.'%')->orWhere('model','like','%'.$this->search.'%');
            })
            ->orderBy('id','desc')
            ->paginate(10);
        $selected = $this->selectedId ? Car::find($this->selectedId) : null;
        return view('livewire.car-table', [
            'cars'    => $cars,
            'selected' => $selected,
        ]);
    }
}