<form wire:submit.prevent="save">
    <div class="mb-3">
        <label class="form-label">اسم الجهاز</label>
        <input type="text" wire:model.defer="title" class="form-control">
        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">الوصف</label>
        <textarea wire:model.defer="description" class="form-control"></textarea>
        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">السعر</label>
        <input type="number" step="0.01" wire:model.defer="price" class="form-control">
        @error('price') <span class="text-danger">{{ $message }}</span> @enderror
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
    <button type="submit" class="btn btn-primary">{{ $deviceId ? 'تعديل' : 'إضافة' }}</button>
</form>