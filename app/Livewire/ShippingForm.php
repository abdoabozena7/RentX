<?php

namespace App\Livewire;

use App\Models\Shipment;
use Livewire\Component;

/**
 * مكون لإدارة عمليات الشحن فى لوحة التحكم.
 */
class ShippingForm extends Component
{
    public $shipmentId;
    public $type;
    public $description;
    public $status;
    public $reference;
    protected $rules = [
        'type'        => 'required|string',
        'description' => 'nullable|string',
        'status'      => 'required|string',
        'reference'   => 'nullable|string',
    ];
    public function mount($shipment = null)
    {
        if ($shipment) {
            $this->shipmentId  = $shipment->id;
            $this->type        = $shipment->type;
            $this->description = $shipment->description;
            $this->status      = $shipment->status;
            $this->reference   = $shipment->reference;
        }
    }
    public function save()
    {
        $data = $this->validate();
        if ($this->shipmentId) {
            Shipment::findOrFail($this->shipmentId)->update($data);
        } else {
            Shipment::create($data);
            $this->reset(['type','description','status','reference']);
        }
        session()->flash('success','تم حفظ عملية الشحن');
    }
    public function render()
    {
        return view('livewire.shipping-form');
    }
}