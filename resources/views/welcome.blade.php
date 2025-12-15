<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workshop HTML Form Validation</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <style>
        /* CSS สำหรับสถานะเขียว/แดง (เพิ่มใหม่) */
        .validation-status.valid {
            color: green;
            font-weight: 500;
        }
        .validation-status.invalid {
            color: red;
            font-weight: 500;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        /* เพิ่ม CSS ที่จำเป็นสำหรับฟอร์มเพื่อให้ดูดีขึ้น */
        .form-input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #d1d5db; /* gray-300 */
            border-radius: 0.125rem; /* rounded-sm */
            background-color: white;
        }
        .form-label {
            display: block;
            margin-bottom: 0.25rem;
            font-weight: 500;
        }
    </style>

    </head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        </header>

    <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">

            <div class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">

                <h1 class="mb-6 text-xl font-semibold">แบบฟอร์มลงทะเบียน Workshop</h1>

                <form id="workshopForm" class="flex flex-col gap-4">

                    <div class="flex gap-4">
                        <div class="flex-1 form-group">
                            <label for="firstName" class="form-label">ชื่อ:</label>
                            <input type="text" id="firstName" name="firstName" class="form-input">
                            <span id="status-firstName" class="validation-status text-xs mt-1 inline-block"></span>
                        </div>
                        <div class="flex-1 form-group">
                            <label for="lastName" class="form-label">สกุล:</label>
                            <input type="text" id="lastName" name="lastName" class="form-input">
                            <span id="status-lastName" class="validation-status text-xs mt-1 inline-block"></span>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-1 form-group">
                            <label for="dob" class="form-label">วันเดือนปีเกิด:</label>
                            <input type="date" id="dob" name="dob" class="form-input">
                            <span id="status-dob" class="validation-status text-xs mt-1 inline-block"></span>
                        </div>
                        <div class="flex-1 form-group">
                            <label for="age" class="form-label">อายุ:</label>
                            <input type="number" id="age" name="age" min="1" class="form-input">
                            <span id="status-age" class="validation-status text-xs mt-1 inline-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="form-label">เพศ:</span>
                        <div class="flex gap-3">
                            <label><input type="radio" name="gender" value="ชาย"> ชาย</label>
                            <label><input type="radio" name="gender" value="หญิง"> หญิง</label>
                        </div>
                        <span id="status-gender" class="validation-status text-xs mt-1 inline-block"></span>
                    </div>

                    <div class="form-group">
                        <label for="profilePic" class="form-label">รูป:</label>
                        <input type="file" id="profilePic" name="profilePic" class="w-full text-sm">
                        <span id="status-profilePic" class="validation-status text-xs mt-1 inline-block"></span>
                    </div>

                    <div class="form-group">
                        <label for="address" class="form-label">ที่อยู่:</label>
                        <textarea id="address" name="address" rows="3" class="form-input"></textarea>
                        <span id="status-address" class="validation-status text-xs mt-1 inline-block"></span>
                    </div>

                    <div class="form-group">
                        <label for="favoriteColor" class="form-label">สีที่ชอบ:</label>
                        <select id="favoriteColor" name="favoriteColor" class="form-input">
                            <option value="">--เลือกสี--</option>
                            <option value="red">แดง</option>
                            <option value="blue">น้ำเงิน</option>
                            <option value="green">เขียว</option>
                        </select>
                        <span id="status-favoriteColor" class="validation-status text-xs mt-1 inline-block"></span>
                    </div>

                    <div class="form-group">
                        <span class="form-label">แนวเพลงที่ชอบ (เลือกอย่างน้อย 1):</span>
                        <div class="flex gap-3">
                            <label><input type="checkbox" name="music" value="Pop"> Pop</label>
                            <label><input type="checkbox" name="music" value="Rock"> Rock</label>
                            <label><input type="checkbox" name="music" value="Jazz"> Jazz</label>
                        </div>
                        <span id="status-music" class="validation-status text-xs mt-1 inline-block"></span>
                    </div>

                    <div class="form-group">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" id="consent" name="consent">
                            <span class="font-medium">ข้าพเจ้ายินยอมให้ใช้ข้อมูลนี้</span>
                        </label>
                        <span id="status-consent" class="validation-status text-xs mt-1 inline-block"></span>
                    </div>

                    <button type="submit" class="w-full px-5 py-2 mt-4 text-white bg-black rounded-sm hover:opacity-90 dark:bg-white dark:text-[#1b1b18]">
                        Submit
                    </button>
                </form>
                </div>

            </main>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('workshopForm');

        // ฟังก์ชันย่อยสำหรับกำหนดสถานะ (สีเขียว/แดง)
        function setStatus(elementId, isValid) {
            const statusSpan = document.getElementById(`status-${elementId}`);

            // ล้างสถานะเดิม
            statusSpan.textContent = '';
            statusSpan.classList.remove('valid', 'invalid');

            if (isValid) {
                statusSpan.classList.add('valid');
                statusSpan.textContent = '✔️ ข้อมูลถูกต้อง';
            } else {
                statusSpan.classList.add('invalid');
                statusSpan.textContent = '❌ กรุณาระบุข้อมูล';
            }
        }

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            let isFormValid = true; // Flag รวม

            // ===============================================
            // 1. ตรวจสอบ Text, Date, Number, Textarea, Select
            // ===============================================

            // 1.1 ชื่อ (Text)
            const firstName = document.getElementById('firstName').value.trim();
            const validFirstName = firstName.length > 0;
            setStatus('firstName', validFirstName);
            if (!validFirstName) isFormValid = false;

            // 1.2 สกุล (Text)
            const lastName = document.getElementById('lastName').value.trim();
            const validLastName = lastName.length > 0;
            setStatus('lastName', validLastName);
            if (!validLastName) isFormValid = false;

            // 1.3 วันเดือนปีเกิด (Date)
            const dob = document.getElementById('dob').value;
            const validDob = dob !== '';
            setStatus('dob', validDob);
            if (!validDob) isFormValid = false;

            // 1.4 อายุ (Number) - ต้องมีค่าและ > 0
            const age = document.getElementById('age').value;
            const validAge = age !== '' && parseInt(age) > 0;
            setStatus('age', validAge);
            if (!validAge) isFormValid = false;

            // 1.5 ที่อยู่ (Textarea)
            const address = document.getElementById('address').value.trim();
            const validAddress = address.length > 0;
            setStatus('address', validAddress);
            if (!validAddress) isFormValid = false;

            // 1.6 สีที่ชอบ (Select) - ต้องไม่ใช่ value=""
            const favoriteColor = document.getElementById('favoriteColor').value;
            const validFavoriteColor = favoriteColor !== '';
            setStatus('favoriteColor', validFavoriteColor);
            if (!validFavoriteColor) isFormValid = false;

            // 1.7 รูป (File) - ตรวจสอบว่ามีไฟล์ถูกเลือกหรือไม่
            const profilePic = document.getElementById('profilePic').files;
            const validProfilePic = profilePic.length > 0;
            setStatus('profilePic', validProfilePic);
            if (!validProfilePic) isFormValid = false;


            // ===============================================
            // 2. ตรวจสอบ Radio Buttons (เพศ)
            // ===============================================
            const genderRadios = document.getElementsByName('gender');
            let genderChecked = false;
            for (let radio of genderRadios) {
                if (radio.checked) {
                    genderChecked = true;
                    break;
                }
            }
            setStatus('gender', genderChecked);
            if (!genderChecked) isFormValid = false;

            // ===============================================
            // 3. ตรวจสอบ Checkboxes (แนวเพลงที่ชอบ) - ต้องเลือกอย่างน้อย 1
            // ===============================================
            const musicCheckboxes = document.getElementsByName('music');
            let musicChecked = false;
            for (let checkbox of musicCheckboxes) {
                if (checkbox.checked) {
                    musicChecked = true;
                    break;
                }
            }
            setStatus('music', musicChecked);
            if (!musicChecked) isFormValid = false;

            // ===============================================
            // 4. ตรวจสอบ Checkbox ยินยอม
            // ===============================================
            const consent = document.getElementById('consent').checked;
            setStatus('consent', consent);
            if (!consent) isFormValid = false;


            // ===============================================
            // สรุปผล
            // ===============================================
            if (isFormValid) {
                alert('✅ ข้อมูลถูกต้องครบถ้วน! พร้อมส่งฟอร์ม');
                // หากต้องการให้ส่งฟอร์มจริง ๆ ให้ยกเลิก comment บรรทัดนี้:
                // form.submit();
            } else {
                alert('❌ กรุณาตรวจสอบและแก้ไขข้อมูลที่มีเครื่องหมายสีแดงให้ครบถ้วน');
            }
        });
    });
    </script>
    </body>
</html>
