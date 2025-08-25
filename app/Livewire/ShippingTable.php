<?php

namespace App\Livewire;

use App\Models\Shipment;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * مكون يعرض جدول عمليات الشحن فى لوحة التحكم.
 */
class ShippingTable extends Component
{
    use WithPagination;
    public $search = '';
    public $selectedId = null;
    protected $paginationTheme = 'bootstrap';
    public function updatingSearch(){ $this->resetPage(); }
    public function edit($id){ $this->selectedId = $id; }
    public function delete($id){ Shipment::findOrFail($id)->delete(); session()->flash('success','تم حذف الشحنة'); }
    public function clearForm(){ $this->selectedId = null; }
    public function render()
    {
        $shipments = Shipment::query()
            ->when($this->search, function($q){
                $q->where('type','like','%'.$this->search.'%')->orWhere('reference','like','%'.$this->search.'%');
            })
            ->orderBy('id','desc')
            ->paginate(10);
        $selected = $this->selectedId ? Shipment::find($this->selectedId) : null;
        return view('livewire.shipping-table', [
            'shipments' => $shipments,
            'selected'  => $selected,
        ]);
    }
}