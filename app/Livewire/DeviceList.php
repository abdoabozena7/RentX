<?php

namespace App\Livewire;

use App\Models\Device;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * مكون يعرض قائمة الأجهزة للزوار.
 */
class DeviceList extends Component
{
    use WithPagination;
    public $search = '';
    protected $queryString = ['search'];
    public function updatingSearch() { $this->resetPage(); }
    public function render()
    {
        $devices = Device::query()
            ->when($this->search, function($query){
                $query->where('title','like','%'.$this->search.'%');
            })
            ->orderBy('id','desc')
            ->paginate(9);
        return view('livewire.device-list', ['devices'=>$devices]);
    }
}