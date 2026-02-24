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
    <th>ประเทศ</th>
    <th>ยอดขายรวม</th>
</tr>

<?php
include_once("connectdb.php");

$sql = "SELECT p_country, SUM(p_amount) AS total
        FROM popsupermarket
        GROUP BY p_country";

$rs = mysqli_query($conn, $sql);

while ($data = mysqli_fetch_array($rs)) {
?>
<tr>
    <td><?php echo $data['p_country']; ?></td>
    <td align="right"><?php echo number_format($data['total'], 0); ?></td>
</tr>
<?php
}

mysqli_close($conn);
?>
</table>

</body>
</html>
