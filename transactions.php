<?php

  if(isset($_POST['balance'])){
    $url = 'http://localhost:3000/transactions/balance/' . $_POST['user_id'];
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    //var_dump($data);
    if (sizeof($data) == 0) {
      echo "User not found";
    } else {
      $fname = $data['fname'];
      $lname = $data['lname'];
      $name  = $fname." ".$lname;
      $balance = $data['balance'];

        echo '
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="card">
                <div class="card-body">
                  <table class="table">
                    <tbody>
                      <tr>
                        <th>Account Holder</th>
                        <td>' . $name . '</td>
                      </tr>
                      <tr>
                        <th>Closing Balance</th>
                        <td>SZL ' . $balance . '</td>
                      </tr>
                    </tbody>
                  </table>
                  <p class="card-text text-center">Thank you for choosing our service!</p>
                </div>
              </div>
            </div>
          </div>
        </div>';
    }
  }
  if(isset($_POST['recharge'])){

      $url = 'http://localhost:3000/transactions/recharge/';
      $data = array(
        'user_id' => $_POST['user_id'],
        'amount' => $_POST['amount']
      );

      $options = array(
        'http' => array(
          'method' => 'POST',
          'header' => 'Content-Type: application/json',
          'content' => json_encode($data)
        )
      );

      $context = stream_context_create($options);
      $result = file_get_contents($url, true, $context);
      $datas = json_decode($result, true);
      //var_dump($options);
      if ($result === false) {
        echo "Error occurred while recharging the wallet";
      } else {
        $accountHolder = $datas['accountHolder'];
        $prevBal = $datas['prevBal'];
        $newBal = $datas['newBal'];
        $amount = $datas['amount'];
        $msg = $datas['msg'];
        echo '
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="card">
                <div class="card-body">
                  <p class="card-text text-center">' . $msg . '</p>
                  <table class="table">
                    <tbody>
                      <tr>
                        <th>Account Holder</th>
                        <td>' . $accountHolder . '</td>
                      </tr>
                      <tr>
                        <th>Recharge Amount</th>
                        <td>' . $amount . '</td>
                      </tr>
                      <tr>
                        <th>Opening Balance</th>
                        <td>SZL ' . $prevBal . '</td>
                      </tr>
                      <tr>
                        <th>Closing Balance</th>
                        <td>SZL ' . $newBal . '</td>
                      </tr>
                    </tbody>
                  </table>
                  <p class="card-text text-center">Thank you for choosing our service!</p>
                </div>
              </div>
            </div>
          </div>
        </div>';


      }
  }
  if(isset($_POST['withdrawal'])){

      $url = 'http://localhost:3000/transactions/withdrawal/';
      $data = array(
        'user_id' => $_POST['user_id'],
        'amount' => $_POST['amount']
      );

      $options = array(
        'http' => array(
          'method' => 'POST',
          'header' => 'Content-Type: application/json',
          'content' => json_encode($data)
        )
      );

      $context = stream_context_create($options);
      $result = file_get_contents($url, true, $context);
      $datas = json_decode($result, true);
      //var_dump($options);
      if ($result === false) {
        echo "Error occurred while withdrawing funds";
      } else {
        $accountHolder = $datas['accountHolder'];
        $newBal = $datas['balance'];
        $amount = $datas['withdrawnAmount'];
        $msg = $datas['msg'];
        echo '
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body text-center">
                  <table class="table">
                    <tbody>
                      <tr>
                        <th>Account Holder</th>
                        <td>' . $accountHolder . '</td>
                      </tr>
                      <tr>
                        <th>Withdrawn Amount</th>
                        <td>SZL ' . $amount . '</td>
                      </tr>
                      <tr>
                        <th>Closing Balance</th>
                        <td>SZL ' . $newBal . '</td>
                      </tr>
                    </tbody>
                  </table>
                  <p class="card-text">' . $msg . '</p>
                  <hr>
                  <p class="card-text">Thank you for choosing our service!</p>
                </div>
              </div>
            </div>
          </div>
        </div>';


      }
  }
  include "forms.html";
?>


