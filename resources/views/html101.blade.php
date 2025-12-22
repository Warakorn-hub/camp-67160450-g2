@extends('template.default')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4 text-primary"><i class="bi bi-ui-checks"></i> Workshop #HTML - FORM</h2>

        {{-- 1. เพิ่ม method, action และ enctype (สำหรับอัปโหลดไฟล์) --}}
        <form class="form-box" id="myForm" method="POST" action="{{ url('/submit-form') }}" enctype="multipart/form-data">
            @csrf {{-- 2. ต้องมี Token เพื่อความปลอดภัย --}}

            <div class="row mb-3">
                <label for="first_name" class="col-4 col-form-label text-end fw-bold">ชื่อ :</label>
                <div class="col-8">
                    <div class="input-group has-validation"> <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        {{-- 3. เพิ่ม name="first_name" --}}
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="ระบุชื่อจริง">
                        <div class="invalid-feedback">กรุณาระบุชื่อจริง</div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="last_name" class="col-4 col-form-label text-end fw-bold">สกุล :</label>
                <div class="col-8">
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                        {{-- เพิ่ม name="last_name" --}}
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="ระบุนามสกุล">
                        <div class="invalid-feedback">กรุณาระบุนามสกุล</div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="date" class="col-4 col-form-label text-end fw-bold">วัน/เดือน/ปีเกิด :</label>
                <div class="col-8">
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                        {{-- เพิ่ม name="date" --}}
                        <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="date" name="date">
                        <div class="invalid-feedback">กรุณาระบุวันเกิด</div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-4 col-form-label text-end fw-bold">เพศ :</label>
                <div class="col-8">
                    <div class="btn-group w-100" role="group">
                        {{-- มี name="gender" อยู่แล้ว (ถูกต้อง) --}}
                        <input type="radio" class="btn-check" name="gender" id="male" value="male" autocomplete="off">
                        <label class="btn btn-outline-primary" for="male"><i class="bi bi-gender-male"></i> ชาย</label>

                        <input type="radio" class="btn-check" name="gender" id="female" value="female" autocomplete="off">
                        <label class="btn btn-outline-danger" for="female"><i class="bi bi-gender-female"></i> หญิง</label>
                    </div>
                    <div id="gender-error" class="text-danger mt-1 d-none" style="font-size: 0.875em;">
                        กรุณาระบุเพศ
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-4 col-form-label text-end fw-bold">รูป :</label>
                <div class="col-8">
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="bi bi-image"></i></span>
                        {{-- เพิ่ม name="profile_pic" --}}
                        <input type="file" class="form-control" id="profile_pic" name="profile_pic">
                        </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="address" class="col-4 col-form-label text-end fw-bold">ที่อยู่ :</label>
                <div class="col-8">
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                        {{-- เพิ่ม name="address" --}}
                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                        <div class="invalid-feedback">กรุณาระบุที่อยู่</div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-4 col-form-label text-end fw-bold">สีที่ชอบ :</label>
                <div class="col-8">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-palette-fill"></i></span>
                        {{-- เพิ่ม name="fav_color" --}}
                        <select class="form-select" id="fav_color" name="fav_color">
                            <option value="">เลือกสี...</option>
                            <option value="red">สีแดง</option>
                            <option value="green">สีเขียว</option>
                            <option value="blue">สีน้ำเงิน</option>
                            <option value="yellow">สีเหลือง</option>
                            <option value="pink">สีชมพู</option>
                            <option value="purple">สีม่วง</option>
                        </select>
                         <div class="invalid-feedback">กรุณาเลือกสีที่ชอบ</div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-4 col-form-label text-end fw-bold">แนวเพลงที่ชอบ :</label>
                <div class="col-8 pt-1">
                    {{-- มี name="music" อยู่แล้ว แต่ควรแก้ value ให้สื่อความหมาย --}}
                    <input type="radio" class="btn-check" name="music" id="pop" value="pop" autocomplete="off">
                    <label class="btn btn-outline-secondary btn-sm rounded-pill px-3" for="pop">ป๊อป</label>

                    <input type="radio" class="btn-check" name="music" id="rock" value="rock" autocomplete="off">
                    <label class="btn btn-outline-secondary btn-sm rounded-pill px-3" for="rock">ร็อก</label>

                    <input type="radio" class="btn-check" name="music" id="other" value="other" autocomplete="off">
                    <label class="btn btn-outline-secondary btn-sm rounded-pill px-3" for="other">อื่นๆ</label>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 text-center">
                    <div class="form-check d-inline-block">
                        {{-- เพิ่ม name="consent" --}}
                        <input type="checkbox" class="form-check-input" id="consent" name="consent" value="1">
                        <label class="form-check-label" for="consent">ยินยอมให้เก็บข้อมูล</label>
                        <div class="invalid-feedback text-start">
                            คุณต้องกดยินยอม
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6 text-start">
                    <button type="reset" class="btn btn-secondary w-100" onclick="resetValidation()"><i class="bi bi-arrow-counterclockwise"></i> Reset</button>
                </div>
                <div class="col-6 text-end">
                    <button type="button" id="btnSubmit" class="btn btn-success w-100"> Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnSubmit = document.getElementById('btnSubmit');
            const myForm = document.getElementById('myForm'); // อ้างอิงฟอร์ม

            btnSubmit.addEventListener('click', function(event) {
                event.preventDefault();
                validateForm();
            });

            function validateForm() {
                let isValid = true;
                if (!checkInput('first_name')) isValid = false;
                if (!checkInput('last_name')) isValid = false;
                if (!checkInput('date')) isValid = false;
                if (!checkInput('address')) isValid = false;
                if (!checkInput('fav_color')) isValid = false;

                const genderInputs = document.getElementsByName('gender');
                let genderChecked = false;
                for(let i=0; i < genderInputs.length; i++) {
                    if(genderInputs[i].checked) genderChecked = true;
                }
                const genderError = document.getElementById('gender-error');
                if (!genderChecked) {
                    genderError.classList.remove('d-none');
                    isValid = false;
                } else {
                    genderError.classList.add('d-none');
                }

                const consent = document.getElementById('consent');
                if (!consent.checked) {
                    consent.classList.add('is-invalid');
                    consent.classList.remove('is-valid');
                    isValid = false;
                } else {
                    consent.classList.remove('is-invalid');
                    consent.classList.add('is-valid');
                }

                // ผลลัพธ์รวม
                if (isValid) {
                    // *** แก้ไขตรงนี้: สั่งให้ฟอร์มส่งข้อมูล ***
                    myForm.submit();
                } else {
                    console.log('Form is invalid');
                }
            }

            function checkInput(id) {
                const el = document.getElementById(id);
                if (!el) return true;
                if (el.value.trim() === '') {
                    el.classList.add('is-invalid');
                    el.classList.remove('is-valid');
                    return false;
                } else {
                    el.classList.remove('is-invalid');
                    el.classList.add('is-valid');
                    return true;
                }
            }
        });

        function resetValidation() {
            const inputs = document.querySelectorAll('.form-control, .form-select, .form-check-input');
            inputs.forEach(input => {
                input.classList.remove('is-invalid');
                input.classList.remove('is-valid');
            });
            document.getElementById('gender-error').classList.add('d-none');
        }
    </script>
@endpush
