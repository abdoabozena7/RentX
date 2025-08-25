<form wire:submit.prevent="save">
    <div class="mb-3">
        <label class="form-label">اسم السيارة</label>
        <input type="text" wire:model.defer="name" class="form-control">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">الموديل</label>
        <input type="text" wire:model.defer="model" class="form-control">
        @error('model') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">السعر اليومى</label>
        <input type="number" step="0.01" wire:model.defer="price_per_day" class="form-control">
        @error('price_per_day') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">وصف</label>
        <textarea wire:model.defer="details" class="form-control"></textarea>
        @error('details') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">الصورة</label>
        <input type="file" wire:model="image" class="form-control">
        @if($image)
            <img src="{{ $image->temporaryUrl() }}" width="100" class="mt-2">
        @elseif($image_path)
            <img src="{{ Storage::url($image_path) }}" width="100" class="mt-2">
        @endif
        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <button type="submit" class="btn btn-primary">{{ $carId ? 'تعديل' : 'إضافة' }}</button>
</form>