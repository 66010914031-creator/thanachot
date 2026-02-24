<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>ธนโชติ วงศ์ดี (กาย)</title>

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="bg-light">

<div class="container mt-5">
<div class="card shadow rounded-4">
<div class="card-body">

<h3 class="text-center mb-4 fw-bold">
66010914031 ธนโชติ วงศ์ดี (กาย)
</h3>

<!-- 🔽 Dropdown ประเทศ -->
<form method="get" class="mb-4 text-center">
    <label class="fw-semibold">เลือกประเทศ :</label>
    <select name="country" onchange="this.form.submit()" class="form-select w-25 d-inline-block">
        <option value="">-- ทุกประเทศ --</option>
        <?php
        include_once("connectdb.php");
        $ct = mysqli_query($conn,"SELECT DISTINCT p_country FROM popsupermarket");
        while($c = mysqli_fetch_assoc($ct)){
            $sel = (isset($_GET['country']) && $_GET['country']==$c['p_country'])?"selected":"";
            echo "<option $sel>".$c['p_country']."</option>";
        }
        ?>
    </select>
</form>

<!-- 📋 ตาราง -->
<table class="table table-bordered table-striped text-center">
<thead class="table-dark">
<tr>
    <th>ประเทศ</th>
    <th>ยอดขายรวม</th>
</tr>
</thead>
<tbody>

<?php
$where = "";
if(!empty($_GET['country'])){
    $country = $_GET['country'];
    $where = " WHERE p_country='$country'";
}

$sql = "SELECT p_country, SUM(p_amount) AS total
        FROM popsupermarket
        $where
        GROUP BY p_country";

$rs = mysqli_query($conn,$sql);

$countries=[];
$totals=[];

while($data=mysqli_fetch_assoc($rs)){
    $countries[]=$data['p_country'];
    $totals[]=$data['total'];
?>
<tr>
    <td><?php echo $data['p_country'];?></td>
    <td class="text-end"><?php echo number_format($data['total'],0);?></td>
</tr>
<?php } ?>
</tbody>
</table>

<!-- 📊 Charts -->
<div class="row text-center">
    <div class="col-md-4">
        <h5>Bar Chart</h5>
        <canvas id="barChart"></canvas>
    </div>
    <div class="col-md-4">
        <h5>Pie Chart (%)</h5>
        <canvas id="pieChart"></canvas>
    </div>
    <div class="col-md-4">
        <h5>Line Chart</h5>
        <canvas id="lineChart"></canvas>
    </div>
</div>

</div>
</div>
</div>

<script>
const labels = <?php echo json_encode($countries); ?>;
const data = <?php echo json_encode($totals); ?>;

// 🔹 Bar
new Chart(barChart,{
    type:'bar',
    data:{labels:labels,datasets:[{data:data,backgroundColor:'#0d6efd'}]},
    options:{plugins:{legend:{display:false}}}
});

// 🔹 Pie + %
new Chart(pieChart,{
    type:'pie',
    data:{
        labels:labels,
        datasets:[{
            data:data,
            backgroundColor:['#0d6efd','#198754','#ffc107','#dc3545','#6f42c1']
        }]
    },
    options:{
        plugins:{
            tooltip:{
                callbacks:{
                    label:(ctx)=>{
                        let sum=data.reduce((a,b)=>a+b,0);
                        let pct=(ctx.raw/sum*100).toFixed(2);
                        return ctx.label+" : "+pct+"%";
                    }
                }
            }
        }
    }
});

// 🔹 Line
new Chart(lineChart,{
    type:'line',
    data:{labels:labels,datasets:[{data:data,borderColor:'#dc3545',fill:false}]},
    options:{plugins:{legend:{display:false}}}
});
</script>

</body>
</html>
