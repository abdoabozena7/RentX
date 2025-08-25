<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use Livewire\WithFileUploads;

/**
 * مكون لإدارة السيارات فى لوحة التحكم. يسمح بإضافة وتعديل وحذف سيارة.
 */
class CarForm extends Component
{
    use WithFileUploads;

    public $carId;
    public $name;
    public $model;
    public $price_per_day;
    public $details;
    public $image;
    public $image_path;

    protected $rules = [
        'name'         => 'required|string|max:255',
        'model'        => 'nullable|string|max:255',
        'price_per_day'=> 'required|numeric|min:0',
        'details'      => 'nullable|string',
        'image'        => 'nullable|image|max:1024',
    ];

    public function mount($car = null)
    {
        if ($car) {
            $this->carId        = $car->id;
            $this->name         = $car->name;
            $this->model        = $car->model;
            $this->price_per_day= $car->price_per_day;
            $this->details      = $car->details;
            $this->image_path   = $car->image_path;
        }
    }

    public function save()
    {
        $data = $this->validate();
        // إذا تم رفع صورة جديدة نحفظها فى مجلد public/images
        if ($this->image) {
            $path = $this->image->store('cars', 'public');
            $data['image_path'] = $path;
        }
        if ($this->carId) {
            $car = Car::findOrFail($this->carId);
            $car->update($data);
        } else {
            Car::create($data);
            $this->reset(['name','model','price_per_day','details','image']);
        }
        session()->flash('success', 'تم حفظ السيارة بنجاح');
    }

    public function render()
    {
        return view('livewire.car-form');
    }
}