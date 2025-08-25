<?php

namespace App\Livewire;

use App\Models\Device;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * مكون يعرض جدول الأجهزة فى لوحة التحكم.
 */
class DeviceTable extends Component
{
    use WithPagination;
    public $search = '';
    public $selectedId = null;
    protected $paginationTheme = 'bootstrap';
    public function updatingSearch(){ $this->resetPage(); }
    public function edit($id) { $this->selectedId = $id; }
    public function delete($id) { Device::findOrFail($id)->delete(); session()->flash('success','تم حذف الجهاز'); }
    public function clearForm() { $this->selectedId = null; }
    public function render()
    {
        $devices = Device::query()
            ->when($this->search, function($q){ $q->where('title','like','%'.$this->search.'%'); })
            ->orderBy('id','desc')
            ->paginate(10);
        $selected = $this->selectedId ? Device::find($this->selectedId) : null;
        return view('livewire.device-table', ['devices'=>$devices, 'selected'=>$selected]);
    }
}