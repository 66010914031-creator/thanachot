<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ใบสมัครงาน - TechWave Solutions Co., Ltd.</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
    <style>
        body {
            background-color: #f8f9fa; /* สีพื้นหลังอ่อน */
        }
        .form-card {
            border-top: 5px solid #007bff; /* สีขอบบนเป็นสีหลักของ Bootstrap */
        }
    </style>
</head>

<body>

<div class="container my-5">
    <div class="card form-card shadow-lg mx-auto" style="max-width: 800px;">
       
        <div class="card-header bg-primary text-white text-center">
            <h1 class="card-title mb-0 fs-3">ใบสมัครงาน</h1>
            <p class="mb-0">บริษัท TechWave Solutions จำกัด</p>
        </div>

        <div class="card-body p-4">
            <form action="f.php" method="post">
               
                <h4 class="mb-3 text-primary border-bottom pb-2">ข้อมูลการสมัคร</h4>
               
                <div class="mb-3">
                    <label for="position" class="form-label fw-bold">ตำแหน่งที่ต้องการสมัคร <span class="text-danger">*</span></label>
                    <select class="form-select" id="position" name="position" required>
                        <option value="" selected disabled>--- กรุณาเลือกตำแหน่งที่สนใจ ---</option>
                        <option value="Software Developer">Software Developer</option>
                        <option value="UI/UX Designer">UI/UX Designer</option>
                        <option value="Marketing Specialist">Marketing Specialist</option>
                        <option value="Data Analyst">Data Analyst</option>
                        <option value="Other">อื่นๆ (ระบุในช่องหมายเหตุ)</option>
                    </select>
                </div>
               
                <hr class="my-4">

                <h4 class="mb-3 text-primary border-bottom pb-2">ข้อมูลส่วนตัว</h4>

                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="prefix" class="form-label">คำนำหน้าชื่อ <span class="text-danger">*</span></label>
                        <select class="form-select" id="prefix" name="prefix" required>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>

                    <div class="col-md-9">
                        <label for="fullname" class="form-label">ชื่อ-สกุล <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="fullname" name="fullname" required placeholder="ชื่อจริง นามสกุล">
                    </div>

                    <div class="col-md-4">
                        <label for="dob" class="form-label">วันเดือนปีเกิด <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>

                    <div class="col-md-4">
                        <label for="phone" class="form-label">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="phone" name="phone" required placeholder="0XX-XXX-XXXX">
                    </div>

                     <div class="col-md-4">
                        <label for="email" class="form-label">อีเมล <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="example@mail.com">
                    </div>
                </div>

                <hr class="my-4">

                <h4 class="mb-3 text-primary border-bottom pb-2">ประวัติการศึกษาและความสามารถ</h4>

                <div class="mb-3">
                    <label for="education" class="form-label fw-bold">ระดับการศึกษาสูงสุด <span class="text-danger">*</span></label>
                    <select class="form-select" id="education" name="education" required>
                        <option value="" selected disabled>--- กรุณาเลือก ---</option>
                        <option value="มัธยมศึกษา">มัธยมศึกษา/ปวช.</option>
                        <option value="ปวส.">ปวส./อนุปริญญา</option>
                        <option value="ปริญญาตรี">ปริญญาตรี</option>
                        <option value="ปริญญาโท">ปริญญาโท</option>
                        <option value="ปริญญาเอก">ปริญญาเอก</option>
                    </select>
                </div>
               
                <div class="mb-3">
                    <label for="skills" class="form-label fw-bold">ความสามารถพิเศษ (เช่น ภาษา, โปรแกรม, ทักษะเฉพาะด้าน)</label>
                    <textarea class="form-control" id="skills" name="skills" rows="3" placeholder="ระบุความสามารถพิเศษที่เกี่ยวข้องกับตำแหน่งงาน"></textarea>
                </div>

                <div class="mb-3">
                    <label for="experience" class="form-label fw-bold">ประสบการณ์ทำงานโดยสรุป</label>
                    <textarea class="form-control" id="experience" name="experience" rows="4" placeholder="ระบุประสบการณ์ทำงานที่เกี่ยวข้อง (ชื่อบริษัท, ตำแหน่ง, ระยะเวลา)"></textarea>
                </div>
               
                <div class="mb-4">
                    <label for="resume" class="form-label fw-bold">แนบ Resume/CV <span class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
                    <div class="form-text">เฉพาะไฟล์ .pdf, .doc, .docx เท่านั้น (ไม่เกิน 5 MB)</div>
                </div>

                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="dataConsent" required>
                    <label class="form-check-label" for="dataConsent">
                        ข้าพเจ้ายินยอมให้บริษัทเก็บรวบรวมและใช้ข้อมูลส่วนบุคคลนี้เพื่อการพิจารณารับเข้าทำงาน
                    </label>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="reset" class="btn btn-outline-secondary px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                        </svg>
                        ยกเลิก
                    </button>
                    <button type="submit" class="btn btn-primary px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.72a.5.5 0 0 0-.124.71L1.905 9.792l4.872-4.871L11.17 12.085l-4.227 1.832a.5.5 0 0 0-.131.577l2.844 4.14a.5.5 0 0 0 .874-.473l-2.844-4.14a.5.5 0 0 0-.113-.538L7.027 8.01 15.964.686z"/>
                        </svg>
                        ส่งใบสมัคร
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>