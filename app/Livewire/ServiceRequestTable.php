<?php

namespace App\Livewire;

use App\Models\ServiceRequest;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * مكون يعرض جميع طلبات الخدمات فى لوحة التحكم.
 */
class ServiceRequestTable extends Component
{
    use WithPagination;
    public $search = '';
    protected $queryString = ['search'];
    public function updatingSearch(){ $this->resetPage(); }
    public function render()
    {
        $requests = ServiceRequest::query()
            ->when($this->search, function($query){
                $query->where('name','like','%'.$this->search.'%')
                      ->orWhere('phone','like','%'.$this->search.'%')
                      ->orWhere('request_type','like','%'.$this->search.'%');
            })
            ->orderBy('id','desc')
            ->paginate(10);
        return view('livewire.service-request-table', ['requests'=>$requests]);
    }
}