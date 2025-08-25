<div>
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <input type="text" wire:model="search" class="form-control w-50" placeholder="ابحث عن جهاز…">
        <button class="btn-action btn-sm" wire:click="clearForm">إضافة جهاز جديد</button>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <livewire:device-form :device="$selected" wire:key="{{ $selected?->id ?? 'new-device' }}" />
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>الوصف</th>
                <th>السعر</th>
                <th>الصورة</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($devices as $device)
                <tr>
                    <td>{{ $device->title }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($device->description, 50) }}</td>
                    <td>{{ $device->price }}</td>
                    <td>@if($device->image_path) <img src="{{ Storage::url($device->image_path) }}" width="60"> @endif</td>
                    <td>
                        <button class="btn-action btn-sm" wire:click="edit({{ $device->id }})">تعديل</button>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $device->id }})" onclick="return confirm('متأكد من الحذف؟')">حذف</button>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">لا توجد أجهزة</td></tr>
            @endforelse
        </tbody>
    </table>
    {{ $devices->links() }}
</div>