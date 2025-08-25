<div>
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <input type="text" wire:model="search" class="form-control w-50" placeholder="ابحث عن شحنة…">
        <button class="btn-action btn-sm" wire:click="clearForm">إضافة شحنة جديدة</button>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <livewire:shipping-form :shipment="$selected" wire:key="{{ $selected?->id ?? 'new-shipment' }}" />
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>النوع</th>
                <th>الوصف</th>
                <th>الحالة</th>
                <th>المرجع</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($shipments as $sh)
                <tr>
                    <td>{{ $sh->type }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($sh->description, 50) }}</td>
                    <td>{{ $sh->status }}</td>
                    <td>{{ $sh->reference }}</td>
                    <td>
                        <button class="btn-action btn-sm" wire:click="edit({{ $sh->id }})">تعديل</button>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $sh->id }})" onclick="return confirm('متأكد من الحذف؟')">حذف</button>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">لا توجد بيانات</td></tr>
            @endforelse
        </tbody>
    </table>
    {{ $shipments->links() }}
</div>