<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>ฟอร์มรับข้อมูล - ธนโชติ วงศ์ดี 66010914031</title>

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: #f5f7fa;
    }
    .form-container {
        max-width: 650px;
        background: #fff;
        padding: 30px;
        margin: 40px auto;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
</style>

</head>

<body>

<div class="container">
    <div class="form-container">
        <h2 class="text-center mb-4">ฟอร์มรับข้อมูล - ธนโชติ วงศ์ดี (chatgpt)</h2>

        <form method="post" action="">
            
            <div class="mb-3">
                <label class="form-label">ชื่อ-สกุล *</label>
                <input type="text" name="fullname" class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label class="form-label">เบอร์โทร *</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">ส่วนสูง (ซม.) *</label>
                <input type="number" name="height" class="form-control" min="100" max="200" required>
            </div>

            <div class="mb-3">
                <label class="form-label">ที่อยู่</label>
                <textarea name="address" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">วันเดือนปีเกิด</label>
                <input type="date" name="birthday" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">สีที่ชอบ</label>
                <input type="color" name="color" class="form-control form-control-color">
            </div>

            <div class="mb-3">
                <label class="form-label">สาขาวิชา</label>
                <select name="major" class="form-select">
                    <option value="การบัญชี">การบัญชี</option>
                    <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                    <option value="การตลาด">การตลาด</option>
                    <option value="การจัดการ">การจัดการ</option>
                </select>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" name="Submit" class="btn btn-primary">สมัครสมาชิก</button>
                <button type="reset" class="btn btn-warning">ยกเลิก</button>
                <button type="button" class="btn btn-info" onclick="window.location='https://www.msu.ac.th/';">ไปยัง MSU</button>
                <button type="button" class="btn btn-success" onclick="alert('hello');">Hello</button>
                <button type="button" class="btn btn-secondary" onclick="window.print();">พิมพ์</button>
            </div>

        </form>
    </div>
</div>

<hr>

<div class="container">

<?php
if(isset($_POST["Submit"])){
    $fullname = $_POST["fullname"];
    $phone = $_POST["phone"];
    $height = $_POST["height"];
    $address = $_POST["address"];
    $birthday = $_POST["birthday"];
    $color = $_POST["color"];
    $major = $_POST["major"];

    echo "<div class='alert alert-success mt-4'>";
    echo "<h4>ผลลัพธ์การส่งข้อมูล</h4>";
    echo "ชื่อ-สกุล: ".$fullname."<br>";
    echo "เบอร์โทร: ".$phone."<br>";
    echo "ส่วนสูง: ".$height." ซม.<br>";
    echo "ที่อยู่: ".$address."<br>";
    echo "วันเดือนปีเกิด: ".$birthday."<br>";
    echo "สีที่ชอบ: <div style='background-color:{$color}; width:150px; height:30px; border-radius:5px;'></div><br>";
    echo "สาขาวิชา: ".$major."<br>";
    echo "</div>";
}
?>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
