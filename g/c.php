<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>ธนโชติ วงศ์ดี (กาย)</title>

<!-- ✅ Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- ✅ DataTables + Bootstrap 5 -->
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg rounded-4">
        <div class="card-body">

            <h3 class="text-center mb-4 fw-bold">
                66010914031 ธนโชติ วงศ์ดี (กาย)
            </h3>

            <table id="myTable" class="table table-striped table-bordered table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Order ID</th>
                        <th>สินค้า</th>
                        <th>ประเภทสินค้า</th>
                        <th>วันที่</th>
                        <th>ประเทศ</th>
                        <th>จำนวนเงิน</th>
                        <th>รูปภาพ</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                include_once("connectdb.php");

                $sql = "SELECT * FROM popsupermarket";
                $rs = mysqli_query($conn, $sql);
                $total = 0;

                while ($data = mysqli_fetch_array($rs)) {
                    $total += $data['p_amount'];
                ?>
                    <tr>
                        <td class="text-center"><?php echo $data['p_order_id']; ?></td>
                        <td><?php echo $data['p_product_name']; ?></td>
                        <td class="text-center">
                            <span class="badge bg-info">
                                <?php echo $data['p_category']; ?>
                            </span>
                        </td>
                        <td class="text-center"><?php echo $data['p_date']; ?></td>
                        <td class="text-center"><?php echo $data['p_country']; ?></td>
                        <td class="text-end fw-semibold">
                            <?php echo number_format($data['p_amount'], 0); ?>
                        </td>
                        <td class="text-center">
                            <img src="img/<?php echo $data['p_product_name']; ?>.jpg"
                                 class="img-thumbnail"
                                 width="55">
                        </td>
                    </tr>
                <?php
                }
                mysqli_close($conn);
                ?>
                </tbody>

                <!-- 🔻 แถวรวมยอด -->
                <tfoot>
                    <tr class="table-secondary fw-bold">
                        <td colspan="5" class="text-end">รวมทั้งหมด</td>
                        <td class="text-end"><?php echo number_format($total, 0); ?></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
</div>

<!-- ✅ JS -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- ✅ DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function () {
    $('#myTable').DataTable({
        language: {
            search: "ค้นหา:",
            lengthMenu: "แสดง _MENU_ รายการ",
            info: "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
            paginate: {
                first: "หน้าแรก",
                last: "หน้าสุดท้าย",
                next: "ถัดไป",
                previous: "ก่อนหน้า"
            }
        }
    });
});
</script>

</body>
</html>
