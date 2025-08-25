<?php

namespace App\Livewire;

use App\Models\Device;
use Livewire\Component;
use Livewire\WithFileUploads;

/**
 * مكون لإدارة الأجهزة الكهربائية فى لوحة التحكم.
 */
class DeviceForm extends Component
{
    use WithFileUploads;
    public $deviceId;
    public $title;
    public $description;
    public $price;
    public $image;
    public $image_path;
    protected $rules = [
        'title'       => 'required|string|max:255',
        'description' => 'nullable|string',
        'price'       => 'required|numeric|min:0',
        'image'       => 'nullable|image|max:1024',
    ];
    public function mount($device = null)
    {
        if ($device) {
            $this->deviceId    = $device->id;
            $this->title       = $device->title;
            $this->description = $device->description;
            $this->price       = $device->price;
            $this->image_path  = $device->image_path;
        }
    }
    public function save()
    {
        $data = $this->validate();
        if ($this->image) {
            $path = $this->image->store('devices', 'public');
            $data['image_path'] = $path;
        }
        if ($this->deviceId) {
            Device::findOrFail($this->deviceId)->update($data);
        } else {
            Device::create($data);
            $this->reset(['title','description','price','image']);
        }
        session()->flash('success', 'تم حفظ الجهاز بنجاح');
    }
    public function render()
    {
        return view('livewire.device-form');
    }
}