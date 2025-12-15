<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Workshop HTML Form - Dark Theme (Validated)</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;700&display=swap" rel="stylesheet">

    <style>
        /* 💡 ธีม Dark Mode/เน้นสีแดง */
        :root {
            --dark-red: #8B0000; /* สีแดงเข้ม */
            --dark-black: #000000; /* สีดำสนิท */
            --dark-bg-grey: #1a1a1a; /* พื้นหลังเทาเข้ม */
            --dark-glow: rgba(139, 0, 0, 0.7); /* แสงเรืองรองสีแดง */
            --dark-font-main: 'Sarabun', sans-serif;
            --validation-red: #dc3545; /* สีแดงสำหรับ Error */
            --validation-green: #198754; /* สีเขียวสำหรับ Success */
        }

        body {
            font-family: var(--dark-font-main);
            background-color: var(--dark-black); /* พื้นหลังสีดำ */
            color: #ccc; /* ข้อความสีเทาอ่อน */
            padding-bottom: 50px;
        }

        .container {
            max-width: 600px;
        }

        /* ส่วนหัวข้อ */
        h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark-red);
            text-shadow: 0 0 5px var(--dark-red); /* ลดการเรืองแสงลง */
            letter-spacing: 1px;
            margin-bottom: 30px !important;
        }

        /* กล่องฟอร์ม */
        .form-box {
            background-color: var(--dark-bg-grey); /* กล่องฟอร์มสีเทาเข้ม */
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px var(--dark-glow); /* เงาเรืองแสงสีแดง */
            border: 2px solid var(--dark-red);
        }

        /* ป้ายกำกับ (Label) */
        .col-form-label {
            font-weight: 700;
            color: #e0e0e0;
        }

        /* ช่อง input/select/textarea (ทั่วไป) */
        .form-control, .form-select, textarea {
            background-color: #2c2c2c;
            border: 1px solid #444;
            color: #fff;
        }

        .form-control:focus, .form-select:focus, textarea:focus {
            background-color: #2c2c2c;
            color: #fff;
            border-color: var(--dark-red);
            box-shadow: 0 0 0 0.25rem rgba(139, 0, 0, 0.4);
        }

        textarea {
            height: 120px;
        }

        /* ------------------------------------- */
        /* 🎨 CSS เพิ่มเติมสำหรับ Validation */
        /* ------------------------------------- */

        /* สไตล์กรอบเมื่อข้อมูลถูกต้อง (สีเขียว) */
        .is-valid {
            border-color: var(--validation-green) !important;
            padding-right: 2.25rem;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%23198754' d='M2.343 5.438L1.172 4.266 0.465 4.973 2.343 6.852 7.535 1.66 6.828 0.953z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }

        .is-valid:focus {
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.4) !important;
        }

        /* สไตล์กรอบเมื่อข้อมูลไม่ถูกต้อง (สีแดง) */
        .is-invalid {
            border-color: var(--validation-red) !important;
            padding-right: 2.25rem;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }

        .is-invalid:focus {
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.4) !important;
        }

        /* ข้อความแจ้งเตือน Error */
        .invalid-feedback-custom {
            display: none;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 0.875em;
            color: var(--validation-red);
        }
        .is-invalid + .invalid-feedback-custom {
            display: block;
        }
        /* ข้อความแจ้งเตือน Error สำหรับ Radio/Checkbox */
        .form-group-validation .invalid-feedback-custom {
             margin-top: 0.5rem;
        }
        /* ------------------------------------- */

        /* ปุ่ม Submit */
        .btn-primary {
            background-color: var(--dark-red);
            border-color: var(--dark-red);
            font-weight: 700;
            text-transform: uppercase;
        }

        .btn-primary:hover {
            background-color: #A30000;
            border-color: #A30000;
        }

        /* ปุ่ม Reset */
        .btn-secondary {
            background-color: #444;
            border-color: #444;
            color: #eee;
        }

        /* Radio/Checkbox */
        input[type="radio"], input[type="checkbox"] {
            accent-color: var(--dark-red);
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">แบบฟอร์มลงทะเบียน</h2>

    <form class="form-box" id="registrationForm" onsubmit="return validateForm(event)">
        <div class="row mb-3">
            <label for="firstName" class="col-4 col-form-label">ชื่อ</label>
            <div class="col-8">
                <input type="text" class="form-control" id="firstName" name="firstName">
                <div class="invalid-feedback-custom" id="firstNameError">กรุณากรอกชื่อ</div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="lastName" class="col-4 col-form-label">สกุล</label>
            <div class="col-8">
                <input type="text" class="form-control" id="lastName" name="lastName">
                <div class="invalid-feedback-custom" id="lastNameError">กรุณากรอกสกุล</div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="dob" class="col-4 col-form-label">วัน/เดือน/ปีเกิด</label>
            <div class="col-8">
                <input type="date" class="form-control" id="dob" name="dob">
                <div class="invalid-feedback-custom" id="dobError">กรุณาเลือกวัน/เดือน/ปีเกิด</div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="age" class="col-4 col-form-label">อายุ</label>
            <div class="col-8">
                <input type="number" class="form-control" id="age" name="age">
                <div class="invalid-feedback-custom" id="ageError">กรุณากรอกอายุให้ถูกต้อง (อย่างน้อย 1 ปี)</div>
            </div>
        </div>

        <div class="row mb-3 form-group-validation">
            <label class="col-4 col-form-label">เพศ</label>
            <div class="col-8 pt-2" id="genderGroup">
                <input type="radio" name="gender" id="male" value="male"> <label for="male">ชาย</label>
                <input type="radio" name="gender" id="female" value="female" class="ms-3"> <label for="female">หญิง</label>
                <input type="radio" name="gender" id="other" value="other" class="ms-3"> <label for="other">อื่น ๆ</label>
                <div class="invalid-feedback-custom" id="genderError">กรุณาเลือกเพศ</div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="profilePic" class="col-4 col-form-label">รูป</label>
            <div class="col-8">
                <input type="file" class="form-control" id="profilePic" name="profilePic">
            </div>
        </div>

        <div class="row mb-3">
            <label for="address" class="col-4 col-form-label">ที่อยู่</label>
            <div class="col-8">
                <textarea class="form-control" id="address" name="address"></textarea>
                <div class="invalid-feedback-custom" id="addressError">กรุณากรอกที่อยู่</div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="favColor" class="col-4 col-form-label">สีที่ชอบ</label>
            <div class="col-8">
                <select class="form-select" id="favColor" name="favColor">
                    <option value="" selected disabled>-- เลือกสีที่ใช่ --</option>
                    <option value="black">ดำ</option>
                    <option value="red">แดง</option>
                    <option value="blue">น้ำเงิน</option>
                    <option value="green">เขียว</option>
                    <option value="yellow">เหลือง</option>
                    <option value="purple">ม่วง</option>
                    <option value="white">ขาว</option>
                </select>
                <div class="invalid-feedback-custom" id="favColorError">กรุณาเลือกสีที่ชอบ</div>
            </div>
        </div>

        <div class="row mb-3 form-group-validation">
            <label class="col-4 col-form-label">แนวเพลงที่ชอบ</label>
            <div class="col-8" id="musicGroup">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input music-checkbox" id="pop" name="music" value="pop">
                    <label class="form-check-label" for="pop">Pop/Synth-Pop</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input music-checkbox" id="rock" name="music" value="rock">
                    <label class="form-check-label" for="rock">Rock/Metal</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input music-checkbox" id="classic" name="music" value="classic">
                    <label class="form-check-label" for="classic">คลาสสิก/บรรเลง</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input music-checkbox" id="indie" name="music" value="indie">
                    <label class="form-check-label" for="indie">Indie/Alternative</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input music-checkbox" id="thai-songs" name="music" value="thai">
                    <label class="form-check-label" for="thai-songs">เพลงไทย (ลูกทุ่ง/เพื่อชีวิต)</label>
                </div>
                <div class="invalid-feedback-custom" id="musicError">กรุณาเลือกแนวเพลงที่ชอบอย่างน้อย 1 แนว</div>
            </div>
        </div>

        <div class="row mb-3 form-group-validation">
            <div class="col-12 offset-4">
                <input type="checkbox" id="consent-checkbox" name="consent" class="consent-checkbox">
                <label for="consent-checkbox">ข้าพเจ้ายินยอมให้เก็บข้อมูล</label>
                <div class="invalid-feedback-custom" id="consentError">กรุณายินยอมให้เก็บข้อมูล</div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-6 text-start">
                <button type="reset" class="btn btn-secondary w-100">ล้างข้อมูล</button>
            </div>
            <div class="col-6 text-end">
                <button type="submit" class="btn btn-primary w-100">ส่งข้อมูล</button>
            </div>
        </div>
    </form>
</div>

<script>
    function setValidationStatus(inputElement, isValid, errorMessageId, messageText = "") {
        const errorElement = document.getElementById(errorMessageId);

        // ล้างสถานะเดิม
        inputElement.classList.remove('is-invalid', 'is-valid');
        if (errorElement) {
            errorElement.style.display = 'none';
        }

        if (isValid) {
            inputElement.classList.add('is-valid');
        } else {
            inputElement.classList.add('is-invalid');
            if (errorElement) {
                if (messageText) {
                    errorElement.textContent = messageText;
                }
                errorElement.style.display = 'block';
            }
        }
    }

    function validateForm(event) {
        // ป้องกันการ Submit ฟอร์มแบบปกติ (ไม่ให้เปลี่ยนหน้า)
        event.preventDefault();

        let isValidForm = true;

        // ------------------------------------------
        // 1. Text/Date/Number/Textarea/Select Validation (Required)
        // ------------------------------------------

        // กำหนดช่องที่ต้องตรวจสอบ (Input, Select, Textarea)
        const fieldsToValidate = [
            { id: 'firstName', errorId: 'firstNameError', required: true, check: (val) => val.trim() !== '' },
            { id: 'lastName', errorId: 'lastNameError', required: true, check: (val) => val.trim() !== '' },
            { id: 'dob', errorId: 'dobError', required: true, check: (val) => val.trim() !== '' },
            { id: 'age', errorId: 'ageError', required: true, check: (val) => val.trim() !== '' && parseInt(val) > 0 }, // ตรวจสอบว่าต้องมีค่าและมากกว่า 0
            { id: 'address', errorId: 'addressError', required: true, check: (val) => val.trim() !== '' },
            { id: 'favColor', errorId: 'favColorError', required: true, check: (val) => val.trim() !== '' }, // Select
        ];

        fieldsToValidate.forEach(field => {
            const input = document.getElementById(field.id);
            if (input) {
                const value = input.value;
                const isValid = field.check(value);
                setValidationStatus(input, isValid, field.errorId);
                if (!isValid) {
                    isValidForm = false;
                }
            }
        });

        // ------------------------------------------
        // 2. Radio Group Validation (เพศ)
        // ------------------------------------------
        const genderInputs = document.querySelectorAll('input[name="gender"]');
        let isGenderSelected = false;
        genderInputs.forEach(radio => {
            if (radio.checked) {
                isGenderSelected = true;
            }
        });

        const genderGroup = document.getElementById('genderGroup'); // ใช้ element ที่ครอบคลุม Radio Group
        if (!isGenderSelected) {
            // ในกรณีของ Radio/Checkbox group เราจะใช้ class is-invalid/is-valid กับ element ที่เกี่ยวข้อง
            // แต่สำหรับฟอร์มนี้ เราจะให้ข้อความ error แสดงขึ้นมาเท่านั้น
            document.getElementById('genderError').style.display = 'block';
            isValidForm = false;
        } else {
            document.getElementById('genderError').style.display = 'none';
        }


        // ------------------------------------------
        // 3. Checkbox Group Validation (แนวเพลงที่ชอบ)
        // ------------------------------------------
        const musicCheckboxes = document.querySelectorAll('.music-checkbox:checked');
        let isMusicSelected = musicCheckboxes.length > 0;

        const musicGroup = document.getElementById('musicGroup'); // ใช้ element ที่ครอบคลุม Checkbox Group
        if (!isMusicSelected) {
            document.getElementById('musicError').style.display = 'block';
            isValidForm = false;
        } else {
            document.getElementById('musicError').style.display = 'none';
        }

        // ------------------------------------------
        // 4. Single Checkbox Validation (ยินยอม)
        // ------------------------------------------
        const consentCheckbox = document.getElementById('consent-checkbox');
        let isConsentChecked = consentCheckbox.checked;

        if (!isConsentChecked) {
            // ในกรณีของ Single Checkbox ที่ต้องการเน้นเฉพาะข้อความ
             document.getElementById('consentError').style.display = 'block';
             isValidForm = false;
        } else {
             document.getElementById('consentError').style.display = 'none';
        }

        // ------------------------------------------
        // 5. สรุปผลการ Validation
        // ------------------------------------------
        if (isValidForm) {
            alert('แบบฟอร์มถูกต้อง! (จำลองการส่งข้อมูล)');
            // สามารถเพิ่มโค้ดสำหรับส่งข้อมูลไปยังเซิร์ฟเวอร์ (เช่น fetch/axios) ได้ที่นี่
            // ถ้าไม่ต้องการให้ฟอร์มล้างข้อมูลอัตโนมัติ ให้ใช้ event.target.reset() เพื่อล้างข้อมูล
        } else {
            // เลื่อนหน้าจอไปที่ element แรกที่มีข้อผิดพลาด
            const firstInvalid = document.querySelector('.is-invalid, .invalid-feedback-custom:not([style*="none"])');
            if (firstInvalid) {
                firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }

        return false; // ป้องกันการ Submit ฟอร์มแบบปกติซ้ำอีกครั้ง (แม้จะมีการเรียก event.preventDefault() แล้ว)
    }

</script>
</body>
</html>
