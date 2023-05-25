<?php
  $url = 'http://localhost:3000/transactions/balance/' . $_POST['id'];
  $response = file_get_contents($url);
  $data = json_decode($response, true);
  //var_dump($data);
  if (sizeof($data) == 0) {
    echo "User not found";
  } else {
    $fname = $data['fname'];
    $lname = $data['lname'];
    $balance = $data['balance'];
    echo "Hello $fname $lname, your balance is $balance";
  }
?>
