<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>ธนโชติ วงศ์ดี (กาย)</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-light">

<div class="container mt-4">
    <h1 class="text-center mb-4">66010914031 ธนโชติ วงศ์ดี (กาย)</h1>

<?php
include_once("connectdb.php");

/* ชื่อเดือนภาษาไทย */
$month_th = [
    1 => "ม.ค.", 2 => "ก.พ.", 3 => "มี.ค.", 4 => "เม.ย.",
    5 => "พ.ค.", 6 => "มิ.ย.", 7 => "ก.ค.", 8 => "ส.ค.",
    9 => "ก.ย.", 10 => "ต.ค.", 11 => "พ.ย.", 12 => "ธ.ค."
];

$sql = "SELECT 
            MONTH(p_date) AS month,
            SUM(p_amount) AS total_sales
        FROM popsupermarket
        GROUP BY MONTH(p_date)
        ORDER BY MONTH(p_date)";

$rs = mysqli_query($conn, $sql);

$months = [];
$sales = [];
?>

<!-- ตาราง -->
<div class="card mb-4">
    <div class="card-header bg-primary text-white">ตารางยอดขายรายเดือน</div>
    <div class="card-body">
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>เดือน</th>
                    <th>ยอดขายรวม (บาท)</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($data = mysqli_fetch_assoc($rs)) { 
                $months[] = $month_th[$data['month']];
                $sales[]  = $data['total_sales'];
            ?>
                <tr>
                    <td><?php echo $month_th[$data['month']]; ?></td>
                    <td class="text-end"><?php echo number_format($data['total_sales'], 0); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php mysqli_close($conn); ?>

<!-- กราฟ -->
<div class="row">
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-header">Bar Chart แสดงยอดขาย</div>
            <div class="card-body">
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header">Donut Chart แสดงสัดส่วน</div>
            <div class="card-body">
                <canvas id="donutChart"></canvas>
            </div>
        </div>
    </div>
</div>

</div>

<script>
const labels = <?php echo json_encode($months); ?>;
const dataSales = <?php echo json_encode($sales); ?>;

// Bar Chart
new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'ยอดขาย (บาท)',
            data: dataSales,
            backgroundColor: '#0d6efd'
        }]
    },
    options: {
        plugins: {
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return context.parsed.y.toLocaleString() + ' บาท';
                    }
                }
            }
        }
    }
});

// Donut Chart
new Chart(document.getElementById('donutChart'), {
    type: 'doughnut',
    data: {
        labels: labels,
        datasets: [{
            data: dataSales,
            backgroundColor: [
                '#0d6efd','#198754','#0dcaf0',
                '#ffc107','#dc3545','#6c757d'
            ]
        }]
    },
    options: {
        cutout: '60%',
        plugins: {
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return context.label + ': ' +
                               context.parsed.toLocaleString() + ' บาท';
                    }
                }
            }
        }
    }
});
</script>

</body>
</html>
