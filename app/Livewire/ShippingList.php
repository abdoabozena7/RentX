<?php

namespace App\Livewire;

use App\Models\Shipment;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * مكون يعرض خدمات الشحن للزوار.
 */
class ShippingList extends Component
{
    use WithPagination;
    public $search = '';
    protected $queryString = ['search'];
    public function updatingSearch(){ $this->resetPage(); }
    public function render()
    {
        $shipments = Shipment::query()
            ->when($this->search, function($query){
                $query->where('description','like','%'.$this->search.'%')
                      ->orWhere('type','like','%'.$this->search.'%');
            })
            ->orderBy('id','desc')
            ->paginate(9);
        return view('livewire.shipping-list', ['shipments'=>$shipments]);
    }
}