<div>
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <input type="text" wire:model="search" class="form-control w-50" placeholder="ابحث عن سيارة…">
        <button class="btn-action btn-sm" wire:click="clearForm">إضافة سيارة جديدة</button>
    </div>
    <!-- Add/Edit form -->
    <div class="card mb-4">
        <div class="card-body">
            <livewire:car-form :car="$selected" wire:key="{{ $selected?->id ?? 'new' }}" />
        </div>
    </div>
    <!-- Cars table -->
    <table class="table">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>الموديل</th>
                <th>السعر/يوم</th>
                <th>الصورة</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cars as $car)
                <tr>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->price_per_day }}</td>
                    <td>@if($car->image_path) <img src="{{ Storage::url($car->image_path) }}" alt="{{ $car->name }}" width="60"> @endif</td>
                    <td>
                        <button class="btn-action btn-sm" wire:click="edit({{ $car->id }})">تعديل</button>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $car->id }})" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">لا توجد سيارات</td></tr>
            @endforelse
        </tbody>
    </table>
    {{ $cars->links() }}
</div>