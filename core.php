<?php

if(isset($_POST['register'])){

      $url = 'http://localhost:3000/transactions/register/';
      $data = array(
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'dob' => $_POST['dob'],
        'age' => $_POST['age']
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
        echo "Error occurred while creating user account";
      } else {
        $accountHolder = $datas['accountHolder'];
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