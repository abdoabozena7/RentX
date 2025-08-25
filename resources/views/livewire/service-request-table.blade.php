<div>
    <div class="mb-3">
        <input type="text" wire:model="search" class="form-control" placeholder="ابحث باسم أو هاتف أو نوع الطلب…">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>الهاتف</th>
                <th>البلد</th>
                <th>نوع الطلب</th>
                <th>نوع السيارة/الشحن</th>
                <th>التفاصيل</th>
                <th>تاريخ الطلب</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $req)
                <tr>
                    <td>{{ $req->id }}</td>
                    <td>{{ $req->name }}</td>
                    <td>{{ $req->phone_code }} {{ $req->phone }}</td>
                    <td>{{ $req->country }}</td>
                    <td>{{ $req->request_type }}</td>
                    <td>{{ $req->car_type ?? $req->shipping_type }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($req->details, 50) }}</td>
                    <td>{{ $req->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $requests->links() }}
</div>