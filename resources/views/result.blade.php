@extends('template.default')

@section('content')
<div class="container mt-5">
    <div class="card border-success">
        <div class="card-header bg-success text-white">
            <h4><i class="bi bi-check-circle-fill"></i> บันทึกข้อมูลเรียบร้อยแล้ว</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">ข้อมูลที่คุณกรอก:</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>ชื่อ-สกุล:</strong> {{ $data['first_name'] ?? '-' }} {{ $data['last_name'] ?? '-' }}</p>
                    <p><strong>วันเกิด:</strong> {{ $data['date'] ?? '-' }}</p>
                    <p><strong>เพศ:</strong> {{ $data['gender'] ?? '-' }}</p>
                    <p><strong>ที่อยู่:</strong> {{ $data['address'] ?? '-' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>สีที่ชอบ:</strong>
                        <span style="color: {{ $data['fav_color'] ?? 'black' }}">
                            {{ $data['fav_color'] ?? '-' }}
                        </span>
                    </p>
                    <p><strong>แนวเพลง:</strong> {{ $data['music'] ?? '-' }}</p>

                    {{-- ส่วนแสดงชื่อไฟล์รูป (ถ้ามีการอัปโหลด) --}}
                    @if(request()->hasFile('profile_pic'))
                        <p><strong>รูปโปรไฟล์:</strong> {{ request()->file('profile_pic')->getClientOriginalName() }}</p>
                    @endif
                </div>
            </div>

            <a href="{{ url('/') }}" class="btn btn-primary mt-3">กลับหน้าแรก</a>
        </div>
    </div>
</div>
@endsection
