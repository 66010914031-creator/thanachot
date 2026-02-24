<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ธนโชติ วงศ์ดี (กาย)</title>
</head>

<body>

<h1>66010914031 ธนโชติ วงศ์ดี (กาย)</h1>

<table border="1" cellpadding="8">
<tr>
    <th>เดือน</th>
    <th>ยอดขายรวม</th>
</tr>

<?php
include_once("connectdb.php");

$sql = "SELECT 
            MONTH(p_date) AS month,
            SUM(p_amount) AS total_sales
        FROM popsupermarket
        GROUP BY MONTH(p_date)
        ORDER BY MONTH(p_date)";

$rs = mysqli_query($conn, $sql);

while ($data = mysqli_fetch_assoc($rs)) {
?>
<tr>
    <td align="center"><?php echo $data['month']; ?></td>
    <td align="right"><?php echo number_format($data['total_sales'], 0); ?></td>
</tr>
<?php
}

mysqli_close($conn);
?>
</table>

</body>
</html>
