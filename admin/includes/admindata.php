<?php 
// session_start();
// error_reporting(0);
// include('includes/dbconnection.php');
$username = "root";
$password = "";
$database = "finaldbs";

try {
  $pdo = new PDO("mysql:host=localhost;database=$database", $username, $password);
  // Set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
  die("ERROR: Could not connect. " . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Data</title>
    <style>
        .chartbox{
            width: 700px;
        }
    </style>
</head>
<body>
<?php 
// query execution
try{
  $sql = "SELECT * FROM finaldbs.tblapplication";   
  $result = $pdo->query($sql);
  //Converting query to array
  if($result->rowCount() > 0) {
    // $revenue = array();
    $date = array();
    $name = array();
    while($row = $result->fetch()) {
        
        // echo $row["revenue"];
        // $revenue[] = $row["revenue"];
        $name[] = $row["FullName"];
        $date[] = $row["Dateofapply"];
        // $profit[] = $row["profit"];
    }
    

  unset($result);
  } else {
    echo "No records matching your query were found.";
  }
} catch(PDOException $e){
  die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);
?>


<div class="chartbox">
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>


<script>
//passing date from php to js

const dateArray = <?php echo json_encode($date); ?>;
// console.log(dateArray);
//parsing into proper date(time structure)
const tmDate = dateArray.map((day, index) => {
    var tdates = new Date(day);
    console.log(tdates);
    return tdates.setHours(0,0,0,0);
})
console.log(tmDate);
//setup
const revenue = <?php echo json_encode($name); ?>;
const data = {
labels: tmDate,
      datasets: [{
        label: 'Monthly Registrations',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
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
//Config 
const config = {
type: 'bar',
    data,
    options: {
      scales: {
        x: {
            
            type: 'time',
            time: {
                unit: 'day'
            }
        },
        y: {
 
          beginAtZero: true
        }
      }
    }
};
//Render 
const myChart = new Chart(
    document.getElementById('myChart'),
    config
);

</script>

</body>
</html>