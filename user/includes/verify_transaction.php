<?php
// session_start();
// error_reporting(0);
// include('includes/payconnection.php');

// global get variable
$ref = $_GET['reference'];
if (empty($ref)) {
    // go back to previous page
    header("Location:javascript://history.go(-1)");
    exit;
}

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer sk_test_a5aebe2645c8a47c69829146ccf192e76ca4e475",
        "Cache-Control: no-cache",
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $result = json_decode($response);
    var_dump($result);

    // Check if the payment was successful
    if (isset($result->data->status) && $result->data->status === 'success') {
        // Read properties from the response and store them in variables for insertion into the database
        $status = $result->data->status;
        $reference = $result->data->reference;
        $firstName = $result->data->customer->first_name;
        $lastName = $result->data->customer->last_name;
        $fullName = $firstName . ' ' . $lastName;
        $cisMail = $result->data->customer->email;
        $dateTime = $result->data->created_at;

        // DB_Connection
        $conn = new mysqli('localhost', 'root', '', 'paystack_payment');
        if (!$conn) {
            echo 'not connected' . mysqli_error($conn);
            exit;
        }

        $stmt = $conn->prepare("INSERT INTO customer_details (status, reference, fullname, date_purchased, email) VALUES(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $status, $reference, $fullName, $dateTime, $cisMail);

        if (!$stmt->execute()) {
            echo 'Error: ' . $stmt->error;
            exit;
        }

        $stmt->close();
        $conn->close();

        // Redirect to the success.php page
        header("Location: success.php?status=success");
        exit;
    } else {
        // Redirect to the error.html page
        header("Location: error.html");
        exit;
    }
 }
?>




