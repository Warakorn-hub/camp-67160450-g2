@extends('template.default')
@section('title', 'pokedex index')
@section('header', 'pokedex index page')

@section('content')
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-lg-16">
                <div class="row a">
                    <!-- ซ้าย : ฟอร์ม -->
                    <div class="col-md-5 d-flex">
                        <div class="card flex-fill border-0 shadow-sm rounded-4" id="formCard">
                            <div class="card-header bg-primary bg-gradient text-white p-4 rounded-top-4">
                                <h4 class="mb-0 fw-bold">
                                    <i class="bi bi-person-lines-fill me-2"></i>เพิ่ม Pokemon ใหม่
                                </h4>
                                <small class="text-white-50">กรุณากรอกข้อมูลให้ครบถ้วนเพื่อเพิ่ม Pokemon ใหม่</small>
                            </div>
                            <div class="card-body">
                                <!-- ฟอร์มของคุณ -->
                                <form class="row g-4 needs-validation" novalidate action="/pokedex" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-6 ">
                                        <label for="name" class="form-label fw-bold text-secondary">ชื่อ</label>
                                        <input type="text" class="form-control form-control bg-light"name="name"
                                            placeholder="Pokemon name">

                                    </div>
                                    <div class="col-md-6">
                                        <label for="type" class="form-label fw-bold text-secondary">ประเภท</label>
                                        <input type="text" class="form-control form-control bg-light"name="type"
                                            placeholder="e.g., Fire, Water">
                                    </div>
                                    <div class="col-md-6"><label for="species"
                                            class="form-label fw-bold text-secondary">สายพันธุ์</label>
                                        <input type="text" class="form-control form-control bg-light"name="species"
                                            placeholder="Enter species">
                                    </div>
                                    <div class="col-md-6"><label for="image_url"
                                            class="form-label fw-bold text-secondary">Image URL</label>
                                        <input type="text"class="form-control form-control bg-light" name="image_url"
                                            placeholder="Enter image url">
                                    </div>

                                    <div class="col-md-6"><label for="height"
                                            class="form-label fw-bold text-secondary">สูง</label>
                                        <input type="number"class="form-control form-control bg-light" name="height"
                                            placeholder="Enter height(m)">
                                    </div>
                                    <div class="col-md-6"><label for="weight"
                                            class="form-label fw-bold text-secondary">น้ำหนัก</label>
                                        <input type="number" class="form-control form-control bg-light"name="weight"
                                            placeholder="Enter weight(kg)">
                                    </div>
                                    <hr class="mt-4 mb-0 text-muted">
                                    <div class="col-md-6"><label for="hp"
                                            class="form-label fw-bold text-secondary">HP</label>
                                        <input type="number" class="form-control form-control bg-light"name="hp"
                                            placeholder="Enter hp">
                                    </div>
                                    <div class="col-md-6"><label for="attack"
                                            class="form-label fw-bold text-secondary">Attack</label>
                                        <input type="number" class="form-control form-control bg-light"name="attack"
                                            placeholder="Enter attack">
                                    </div>
                                    <div class="col-md-6"><label for="defense"
                                            class="form-label fw-bold text-secondary">Defense</label>
                                        <input type="number" class="form-control form-control bg-light"name="defense"
                                            placeholder="Enter defense">
                                    </div>



                                    <div class="col-12 mt-4 d-flex justify-content-between align-items-center">
                                        <button type="reset"
                                            class="btn btn-light text-muted px-4  shadow-sm">ล้างข้อมูล</button>
                                        <button class="btn btn-primary btn px-4 shadow-sm"
                                            type="submit">บันทึกข้อมูล</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- ขวา : ตาราง -->
                    <div class="col-md-7 d-flex">
                        <div class="card flex-fill border-0 shadow-sm rounded-4 overflow-hidden" id="tableCard">
                            <div class="card-header bg-primary bg-gradient text-white p-4 rounded-top-4" id="tableHeader">
                                <h4 class="mb-0 fw-bold">
                                    <i class="bi bi-table me-2">ตารางข้อมูล Pokemon</i>
                                </h4>
                                <small class="text-white-50">มารู้จักกับ Pokemon ใหม่ๆกันเลย</small>
                            </div>

                            @include('pokedex.tabel')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function adjustTableHeight() {
            const formCard = document.getElementById('formCard');
            const tableHeader = document.getElementById('tableHeader');
            const tableScrollArea = document.getElementById('tableScrollArea');

            // เช็คว่าองค์ประกอบครบไหม
            if (!formCard || !tableHeader || !tableScrollArea) return;

            // --- เพิ่มส่วนนี้: เช็คขนาดหน้าจอ ---
            // ถ้าหน้าจอกว้างน้อยกว่า 768px (มือถือ/Tablet แนวตั้ง)
            // ให้ตารางยาวตามธรรมชาติ ไม่ต้องบังคับสูง (เพราะมันจะเรียงลงมาข้างล่าง)
            if (window.innerWidth < 768) {
                tableScrollArea.style.height = 'auto';
                return; // จบการทำงานฟังก์ชันทันที
            }

            // --- จุดเปลี่ยนสำคัญ (The Fix) ---
            // 1. "แกล้ง" หดตารางให้เหลือ 0px ชั่วคราว
            // เพื่อปลดล็อคให้ Card ฝั่งซ้าย (Form) หดตัวลงมาเหลือเท่าเนื้อหาจริงๆ ไม่ใช่ความสูงที่ถูกยืด
            tableScrollArea.style.height = '0px';

            // 2. ตอนนี้ Form Card จะสูงเท่ากับเนื้อหาจริงๆ แล้ว ให้รีบวัดค่าเลย
            const naturalFormHeight = formCard.offsetHeight;
            const headerHeight = tableHeader.offsetHeight;

            // 3. คำนวณความสูงที่เหลือ (Form - Header - เส้นขอบนิดหน่อย)
            const availableHeight = naturalFormHeight - headerHeight - 2;

            // 4. ยัดความสูงกลับเข้าไปที่ตาราง
            // (ตรวจสอบนิดนึงว่าค่าไม่ติดลบ เผื่อ Header ใหญ่กว่า Form)
            if (availableHeight > 0) {
                tableScrollArea.style.height = availableHeight + 'px';
            } else {
                // กรณี Form สั้นมากๆ ให้กำหนดขั้นต่ำไว้สัก 300px
                tableScrollArea.style.height = '300px';
            }

            console.log("Calculated Natural Height:", availableHeight);
        }

        // ทำงานตอนโหลดหน้าเว็บ
        window.addEventListener('load', () => {
            adjustTableHeight();
            setTimeout(adjustTableHeight, 100); // ย้ำอีกทีเผื่อ CSS โหลดช้า
            setTimeout(adjustTableHeight, 500); // ย้ำรอบสุดท้าย
        });

        // ทำงานตอนย่อ-ขยายหน้าจอ
        window.addEventListener('resize', adjustTableHeight);
    </script>
@endpush