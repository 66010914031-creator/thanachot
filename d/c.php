<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ฟอร์มรับข้อมูล - ธนโชติ วงศ์ดี (guy)</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    /* Custom style for the color display box */
    .color-box {
        width: 150px; /* Adjust size as needed */
        height: 30px;
        border: 1px solid #ccc;
        display: inline-block;
        vertical-align: middle;
        margin-left: 5px;
    }
</style>
</head>

<body>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-4">
                <h1 class="card-title text-center text-primary mb-4">ฟอร์มรับข้อมูล - ธนโชติ วงศ์ดี (gemini)</h1>

                <form method="post" action="">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">ชื่อ-สกุล <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="fullname" name="fullname" autofocus required placeholder="นาย/นาง/นางสาว...">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="phone" name="phone" required placeholder="0XX-XXX-XXXX">
                    </div>

                    <div class="mb-3">
                        <label for="height" class="form-label">ส่วนสูง (ซม.) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="height" name="height" min="100" max="200" required placeholder="เช่น 175">
                            <span class="input-group-text">ซม.</span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">ที่อยู่</label>
                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="บ้านเลขที่ ถนน ตำบล อำเภอ จังหวัด"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="birthday" class="form-label">วันเดือนปีเกิด</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="color" class="form-label">สีที่ชอบ</label>
                            <input type="color" class="form-control form-control-color" id="color" name="color" title="เลือกสีที่ชอบ">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="major" class="form-label">สาขาวิชา</label>
                        <select class="form-select" id="major" name="major">
                            <option value="การบัญชี">การบัญชี</option>
                            <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                            <option value="การตลาด">การตลาด</option>
                            <option value="การจัดการ">การจัดการ</option>
                        </select>
                    </div>
                    
                    <p class="text-danger small">* กรุณากรอกข้อมูลให้ครบถ้วน</p>

                    <div class="d-grid gap-2 d-md-block text-center mt-4">
                        <button type="submit" name="Submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-person-plus-fill"></i> สมัครสมาชิก
                        </button>
                        <button type="reset" class="btn btn-secondary btn-lg">
                            <i class="bi bi-arrow-counterclockwise"></i> ยกเลิก
                        </button>
                    </div>
                    <div class="d-grid gap-2 d-md-block text-center mt-3">
                        <button type="button" class="btn btn-outline-info" onClick="window.location='https://www.msu.ac.th/';">
                            <i class="bi bi-globe"></i> Go to MSU
                        </button>
                        <button type="button" class="btn btn-outline-warning" onClick="alert('สวัสดีครับ/ค่ะ!');">
                            <i class="bi bi-chat-dots"></i> Hello
                        </button>
                        <button type="button" class="btn btn-outline-success" onClick="window.print();">
                            <i class="bi bi-printer"></i> พิมพ์
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <hr class="my-5">

            <?php
            // The logic for displaying the result has been adjusted slightly for better CSS integration
            if(isset($_POST["Submit"])){
                // Retrieve data
                $fullname = $_POST["fullname"];
                $phone = $_POST["phone"];
                $height = $_POST["height"];
                // FIX: Address variable in original PHP code was incorrectly reading $_POST["height"]. 
                // It has been corrected here to read $_POST["address"].
                $address= $_POST["address"]; 
                $birthday= $_POST["birthday"];
                $color= $_POST["color"];
                $major= $_POST["major"];

                echo "<div class='alert alert-success' role='alert'>";
                echo "<h4 class='alert-heading'>🎉 ข้อมูลการสมัครสมาชิกถูกส่งเรียบร้อยแล้ว!</h4>";
                echo "<p>รายละเอียดข้อมูลที่คุณกรอก:</p>";
                echo "<ul class='list-group list-group-flush'>";
                
                echo "<li class='list-group-item'><strong>ชื่อ-สกุล:</strong> " . htmlspecialchars($fullname) . "</li>";
                echo "<li class='list-group-item'><strong>เบอร์โทรศัพท์:</strong> " . htmlspecialchars($phone) . "</li>";
                echo "<li class='list-group-item'><strong>ส่วนสูง:</strong> " . htmlspecialchars($height) . " ซม.</li>";
                echo "<li class='list-group-item'><strong>ที่อยู่:</strong> " . nl2br(htmlspecialchars($address)) . "</li>";
                echo "<li class='list-group-item'><strong>วันเดือนปีเกิด:</strong> " . htmlspecialchars($birthday) . "</li>";
                
                // Color display with Bootstrap classes and custom style
                echo "<li class='list-group-item d-flex align-items-center'><strong>สีที่ชอบ:</strong> ";
                echo "<span class='color-box' style='background-color:{$color};'></span>";
                echo "<span class='ms-2 text-muted'>(" . htmlspecialchars($color) . ")</span>";
                echo "</li>";
                
                echo "<li class='list-group-item'><strong>สาขาวิชา:</strong> " . htmlspecialchars($major) . "</li>";
                echo "</ul>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</body>
</html>