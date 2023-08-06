<?php

$username = "root";
$password = "";
$database = "finaldbs";

try {
  $pdo = new PDO("mysql:host=localhost;dbname=$database", $username, $password);
  // Set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
  die("ERROR: Could not connect. " . $e->getMessage());
}

// Fetch data from MySQL database
try {
    $query = "SELECT MONTH(Dateofapply) AS month, COUNT(*) AS total FROM finaldbs.tblapplication GROUP BY month ORDER BY month";
    $request = $pdo->query($query);
    $data = array();

    while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
        $data[$row['month']] = $row['total'];
    }
    
    unset($request);
    
    $months = array();
    $totals = array();

    // Create a JSON object with data
    for ($month = 1; $month <= 12; $month++){
        $months[] = date('F', mktime(0, 0, 0, $month, 1));
        $totals[] = isset($data[$month]) ? (int)$data[$month] : 0;
    }

} catch(PDOException $e){
  die("ERROR: Could not able to execute $query. " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Chart || Automated Birth & Death online Registration System</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<style>
        canvas {

            padding-left: 0;
            padding-right: 0;
            margin-left: auto;
            margin-right: auto;
            display: block;
            width: 600px;
            height: 500px;

        }

    </style>
    
<div style="margin-top: 20px;" class="col-lg-12 mt-5"><canvas id="adminChart" ></canvas></div>
<div style=" text-align: center; align-items:center; width: 100px; margin-left:400px;
 margin-top: 20px; margin-bottom: 40px; color: #fff; background-color: #303030; padding:7px;"
class="col-lg-12 mg-b-4 text-center mt-5">
    <?php
    // Calculate the overall sum of totals
    $totalSum = array_sum($totals);
    echo 'Total Sum: ' . $totalSum;
    ?>
</div>

<script>

    const labels = <?php echo json_encode($months); ?>;
        const data = {
            labels: labels,
            datasets: [{
                label: 'Total User Birth & Death Registration per month.',
                data: <?php echo json_encode($totals); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(255, 159, 64, 0.6)',
                    'rgba(255, 205, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(201, 203, 207, 0.6)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };

        var myChart = new Chart(document.getElementById('adminChart'),
        config
        );

</script>
    
</body>
</html>

