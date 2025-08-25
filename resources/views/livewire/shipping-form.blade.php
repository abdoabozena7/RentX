<form wire:submit.prevent="save">
    <div class="mb-3">
        <label class="form-label">نوع الشحنة</label>
        <select wire:model.defer="type" class="form-select">
            <option value="">اختر النوع</option>
            <option value="برى">شحن برى</option>
            <option value="بحرى">شحن بحرى</option>
            <option value="جوى">شحن جوى</option>
        </select>
        @error('type') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">الوصف</label>
        <textarea wire:model.defer="description" class="form-control"></textarea>
        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">الحالة</label>
        <select wire:model.defer="status" class="form-select">
            <option value="">اختر الحالة</option>
            <option value="جديدة">جديدة</option>
            <option value="جارى التنفيذ">جارى التنفيذ</option>
            <option value="مكتملة">مكتملة</option>
        </select>
        @error('status') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">رقم مرجعى</label>
        <input type="text" wire:model.defer="reference" class="form-control">
        @error('reference') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <button type="submit" class="btn btn-primary">{{ $shipmentId ? 'تعديل' : 'إضافة' }}</button>
</form>