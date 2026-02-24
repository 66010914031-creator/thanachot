<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ธนโชติ วงศ์ดี (กาย)</title>
</head>

<body>

<h1>66010914031 ธนโชติ วงศ์ดี (กาย)</h1>

<!-- 🔍 ฟอร์มค้นหา -->
<form method="get">
    ประเทศ :
    <input type="text" name="country" placeholder="เช่น Canada">

    ชื่อสินค้า :
    <input type="text" name="product" placeholder="เช่น Banana">

    ประเภทสินค้า :
    <select name="category">
        <option value="">-- ทั้งหมด --</option>
        <option value="Fruit">Fruit</option>
        <option value="Vegetables">Vegetables</option>
    </select>

    <input type="submit" value="ค้นหา">
    <input type="submit" name="all" value="แสดงทั้งหมด">
</form>
<br>

<table border="1">
<tr>
    <th>Order ID</th>
    <th>ซื้อสินค้า</th>
    <th>ประเภทสินค้า</th>
    <th>วันที่</th>
    <th>ประเทศ</th>
    <th>จำนวนเงิน</th>
    <th>รูปภาพ</th>
</tr>

<?php
include_once("connectdb.php");

$total = 0;

// 🔹 รับค่าจากฟอร์ม
$country  = isset($_GET['country']) ? $_GET['country'] : "";
$product  = isset($_GET['product']) ? $_GET['product'] : "";
$category = isset($_GET['category']) ? $_GET['category'] : "";

// 🔹 สร้าง SQL
$sql = "SELECT * FROM popsupermarket WHERE 1";

if ($country != "") {
    $sql .= " AND p_country LIKE '%$country%'";
}

if ($product != "") {
    $sql .= " AND p_product_name LIKE '%$product%'";
}

if ($category != "") {
    $sql .= " AND p_category = '$category'";
}

$rs = mysqli_query($conn, $sql);

while ($data = mysqli_fetch_array($rs)) {
    $total += $data['p_amount'];
?>
<tr>
    <td><?php echo $data['p_order_id']; ?></td>
    <td><?php echo $data['p_product_name']; ?></td>
    <td><?php echo $data['p_category']; ?></td>
    <td><?php echo $data['p_date']; ?></td>
    <td><?php echo $data['p_country']; ?></td>
    <td align="right"><?php echo number_format($data['p_amount'], 0); ?></td>
    <td>
        <img src="img/<?php echo $data['p_product_name']; ?>.jpg" width="55">
    </td>
</tr>
<?php
}
mysqli_close($conn);
?>

<!-- 🔻 แถวรวมยอด -->
<tr>
    <td colspan="5" align="right"><b>รวมทั้งหมด</b></td>
    <td align="right"><b><?php echo number_format($total, 0); ?></b></td>
    <td></td>
</tr>

</table>

</body>
</html>
