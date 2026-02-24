<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ผลการสมัครงาน - TechWave Solutions</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">

<div class="container my-5">
    <div class="card shadow-lg mx-auto" style="max-width: 800px;">
       
        <div class="card-header bg-success text-white text-center">
            <h1 class="card-title mb-0 fs-3">✅ ข้อมูลการสมัครงานที่ได้รับ</h1>
            <p class="mb-0">บริษัท TechWave Solutions จำกัด ได้รับข้อมูลของคุณแล้ว</p>
        </div>

        <div class="card-body p-4">
            <?php
            // ตรวจสอบว่ามีการส่งข้อมูลด้วยเมธอด POST และมีปุ่ม submit ถูกกดหรือไม่
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
               
                // รับค่าจากฟอร์ม
                $position = $_POST['position'] ?? ' - ไม่มีข้อมูล - ';
                $prefix = $_POST['prefix'] ?? ' - ไม่มีข้อมูล - ';
                $fullname = $_POST['fullname'] ?? ' - ไม่มีข้อมูล - ';
                $dob = $_POST['dob'] ?? ' - ไม่มีข้อมูล - ';
                $phone = $_POST['phone'] ?? ' - ไม่มีข้อมูล - ';
                $email = $_POST['email'] ?? ' - ไม่มีข้อมูล - ';
                $education = $_POST['education'] ?? ' - ไม่มีข้อมูล - ';
                $skills = $_POST['skills'] ?? ' - ไม่มีข้อมูล - ';
                $experience = $_POST['experience'] ?? ' - ไม่มีข้อมูล - ';
               
                // ข้อมูลไฟล์แนบ (ในทางปฏิบัติจริง ต้องมีการอัปโหลดไฟล์ แต่ในตัวอย่างนี้แสดงแค่ชื่อ)
                $resume_name = $_FILES['resume']['name'] ?? 'ไม่มีไฟล์แนบ (หรือฟอร์มไม่มี enctype="multipart/form-data")';

                // แปลงรูปแบบวันที่ให้อ่านง่าย (ถ้ามีข้อมูล)
                $formatted_dob = ' - ไม่มีข้อมูล - ';
                if (!empty($dob)) {
                    $dateObj = DateTime::createFromFormat('Y-m-d', $dob);
                    if ($dateObj) {
                        // วันที่ในรูปแบบ วัน/เดือน/ปีพ.ศ.
                        $formatted_dob = $dateObj->format('d/m/') . ($dateObj->format('Y') + 543);
                    }
                }
               
                // เริ่มแสดงผลข้อมูลด้วย Bootstrap Alerts และ List Group
                echo '<div class="alert alert-info" role="alert">';
                echo '<strong>หมายเหตุ:</strong> ข้อมูลนี้เป็นเพียงการแสดงผลลัพธ์เพื่อยืนยันว่าได้รับข้อมูลถูกต้อง หากมีไฟล์แนบ (Resume/CV) ในการใช้งานจริง บริษัทจะต้องมีกระบวนการอัปโหลดและจัดเก็บไฟล์ที่เหมาะสม';
                echo '</div>';

                echo '<h5 class="text-success mt-4">1. ข้อมูลการสมัคร</h5>';
                echo '<ul class="list-group list-group-flush mb-4">';
                echo '<li class="list-group-item"><strong>ตำแหน่งที่สมัคร:</strong> <span class="badge bg-primary">'.$position.'</span></li>';
                echo '</ul>';

                echo '<h5 class="text-success">2. ข้อมูลส่วนตัว</h5>';
                echo '<ul class="list-group list-group-flush mb-4">';
                echo '<li class="list-group-item"><strong>ชื่อ-สกุล:</strong> '.$prefix.$fullname.'</li>';
                echo '<li class="list-group-item"><strong>วันเดือนปีเกิด:</strong> '.$formatted_dob.'</li>';
                echo '<li class="list-group-item"><strong>เบอร์โทรศัพท์:</strong> '.$phone.'</li>';
                echo '<li class="list-group-item"><strong>อีเมล:</strong> '.$email.'</li>';
                echo '</ul>';

                echo '<h5 class="text-success">3. ประวัติการศึกษาและความสามารถ</h5>';
                echo '<ul class="list-group list-group-flush mb-4">';
                echo '<li class="list-group-item"><strong>ระดับการศึกษาสูงสุด:</strong> '.$education.'</li>';
               
                echo '<li class="list-group-item"><strong>ความสามารถพิเศษ:</strong>';
                echo '<div class="p-2 border rounded bg-light mt-1">'.nl2br(htmlspecialchars($skills)).'</div>';
                echo '</li>';

                echo '<li class="list-group-item"><strong>ประสบการณ์ทำงานโดยสรุป:</strong>';
                echo '<div class="p-2 border rounded bg-light mt-1">'.nl2br(htmlspecialchars($experience)).'</div>';
                echo '</li>';
               
                echo '<li class="list-group-item"><strong>ไฟล์ Resume/CV ที่แนบ:</strong> <span class="text-muted">'.$resume_name.'</span></li>';
                echo '</ul>';


               
            } else {
                // กรณีเข้าถึงไฟล์ f.php โดยตรงโดยไม่มีข้อมูล POST
                echo '<div class="alert alert-danger" role="alert">';
                echo '<strong>ข้อผิดพลาด:</strong> ไม่พบข้อมูลการสมัคร กรุณาสมัครผ่านหน้าฟอร์มที่กำหนด';
                echo '</div>';
            }
            ?>
            <div class="text-center mt-4">
                <a href="ชื่อไฟล์ฟอร์ม.html" class="btn btn-outline-primary">กลับสู่หน้าฟอร์มสมัครงาน</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>