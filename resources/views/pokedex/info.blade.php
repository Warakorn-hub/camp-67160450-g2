@extends('template.default')
@section('title', 'Pokedex Info')
@section('header', 'ข้อมูลโปเกมอน')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="row g-4 align-items-center">

                            {{-- ส่วนรูปภาพโปเกมอน --}}
                            <div class="col-md-5 text-center">
                                <div class="position-relative d-inline-block">
                                    {{-- ใส่ onerror เผื่อรูปเสีย --}}
                                    <img src="{{ $pokedex->image_url }}" alt="{{ $pokedex->name }}" class="img-fluid"
                                        style="width: 100%; max-width: 400px; max-height: 400px; object-fit: contain;">
                                </div>
                            </div>

                            {{-- ส่วนข้อมูล --}}
                            <div class="col-md-7">
                                <div class="d-flex justify-content-between align-items-center">

                                    <h2 class="fw-bold mb-1 text-primary">{{ $pokedex->name }}</h2>

                                </div>
                                <p class="text-muted mb-4">รายละเอียดและค่าสถานะ</p>

                                <hr class="bg-light my-4">

                                <div class="row gy-3">
                                    {{-- แถวที่ 1: Species --}}
                                    {{-- แสดง Type เป็น Badge --}}
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <span class="fw-bold text-secondary" style="min-width: 100px;">Type:</span>
                                            <?php foreach($pokedex->type as $type) { ?>
                                            <span class="badge bg-primary bg-gradient me-1 mb-1">{{ $type }}</span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <span class="fw-bold text-secondary" style="min-width: 100px;">Species:</span>
                                            <span class="text-dark">{{ $pokedex->species }}</span>
                                        </div>
                                    </div>

                                    {{-- แถวที่ 2: Height & Weight --}}
                                    <div class="col-sm-6">
                                        <div class="d-flex">
                                            <span class="fw-bold text-secondary" style="min-width: 100px;">Height:</span>
                                            <span class="text-dark">{{ $pokedex->height }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex">
                                            <span class="fw-bold text-secondary" style="min-width: 100px;">Weight:</span>
                                            <span class="text-dark">{{ $pokedex->weight }}</span>
                                        </div>
                                    </div>

                                    <hr class="text-muted opacity-25 my-3">

                                    {{-- แถวที่ 3: Battle Stats (HP & Attack) --}}
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center">
                                            <span class="fw-bold text-danger" style="min-width: 100px;">HP:</span>
                                            <span class="fw-bold text-dark">{{ $pokedex->hp }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center">
                                            <span class="fw-bold text-warning" style="min-width: 100px;">Attack:</span>
                                            <span class="fw-bold text-dark">{{ $pokedex->attack }}</span>
                                        </div>
                                    </div>

                                    {{-- แถวที่ 4: Battle Stats (Defense) --}}
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center">
                                            <span class="fw-bold text-success" style="min-width: 100px;">Defense:</span>
                                            <span class="fw-bold text-dark">{{ $pokedex->defense }}</span>
                                        </div>
                                    </div>

                                    {{-- เพิ่มปุ่มย้อนกลับ (Optional) --}}
                                    <div class="col-12 mt-4 text-end">
                                        <a href="/pokedexes" class="btn btn-outline-secondary btn-sm rounded-pill px-4">
                                            <i class="bi bi-arrow-left"></i> ย้อนกลับ
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection