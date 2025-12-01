<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Workshop HTML Form - Dark Theme</title>

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

        /* ช่อง input/select/textarea */
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

    <form class="form-box">
        <div class="row mb-3">
            <label class="col-4 col-form-label">ชื่อ</label>
            <div class="col-8">
                <input type="text" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-4 col-form-label">สกุล</label>
            <div class="col-8">
                <input type="text" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-4 col-form-label">วัน/เดือน/ปีเกิด</label>
            <div class="col-8">
                <input type="date" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-4 col-form-label">อายุ</label>
            <div class="col-8">
                <input type="number" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-4 col-form-label">เพศ</label>
            <div class="col-8 pt-2">
                <input type="radio" name="gender" id="male"> <label for="male">ชาย</label>
                <input type="radio" name="gender" id="female" class="ms-3"> <label for="female">หญิง</label>
                <input type="radio" name="gender" id="other" class="ms-3"> <label for="other">อื่น ๆ</label>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-4 col-form-label">รูป</label>
            <div class="col-8">
                <input type="file" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-4 col-form-label">ที่อยู่</label>
            <div class="col-8">
                <textarea class="form-control"></textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-4 col-form-label">สีที่ชอบ</label>
            <div class="col-8">
                <select class="form-select">
                    <option selected disabled>-- เลือกสีที่ใช่ --</option>
                    <option>ดำ</option>
                    <option>แดง</option>
                    <option>น้ำเงิน</option>
                    <option>เขียว</option>
                    <option>เหลือง</option>
                    <option>ม่วง</option>
                    <option>ขาว</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-4 col-form-label">แนวเพลงที่ชอบ</label>
            <div class="col-8">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="pop">
                    <label class="form-check-label" for="pop">Pop/Synth-Pop</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="rock">
                    <label class="form-check-label" for="rock">Rock/Metal</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="classic">
                    <label class="form-check-label" for="classic">คลาสสิก/บรรเลง</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="indie">
                    <label class="form-check-label" for="indie">Indie/Alternative</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="thai-songs">
                    <label class="form-check-label" for="thai-songs">เพลงไทย (ลูกทุ่ง/เพื่อชีวิต)</label>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 offset-4">
                <input type="checkbox" id="consent-checkbox"> 
                <label for="consent-checkbox">ข้าพเจ้ายินยอมให้เก็บข้อมูล</label>
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

</body>
</html>