<?php include "core.php";?>
<!DOCTYPE html>
<html>
  <head>
    <title>Account Service</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <style>
      .form-container {
        margin-top: 20px;
      }
      .card {
         max-width: calc(100% - 20px);
         margin: 0 10px;
       }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>User Managements</h1>
      
      <div class="row">
        <div class="col-3">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-accounts-tab" data-bs-toggle="pill" href="#v-pills-accounts" role="tab" aria-controls="v-pills-accounts" aria-selected="true">Create Account</a>
            <a class="nav-link" id="v-pills-recharge-tab" data-bs-toggle="pill" href="#v-pills-recharge" role="tab" aria-controls="v-pills-recharge" aria-selected="false">Recharge Account</a>
            <a class="nav-link" id="v-pills-withdrawal-tab" data-bs-toggle="pill" href="#v-pills-withdrawal" role="tab" aria-controls="v-pills-withdrawal" aria-selected="false">Withdrawal Form</a>
          </div>
        </div>
        
        <div class="col-9">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-accounts" role="tabpanel" aria-labelledby="v-pills-accounts-tab">
              <div class="form-container">
                <h2>Create User Account</h2>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <div class="mb-3 col-lg-6">
                    <label for="fname" class="form-label">First Name:</label>
                    <input type="text" class="form-control" id="fname" name="fname" required>
                  </div>
                  <div class="mb-3 col-lg-6">
                    <label for="lname" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" id="lname" name="lname" required>
                  </div>
                  <div class="mb-3 col-lg-6">
                    <label for="email" class="form-label">Email Address:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                  </div>
                  <div class="mb-3 col-lg-6">
                    <label for="phone" class="form-label">Phone Number:</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                  </div>
                  <div class="mb-3 col-lg-8">
                    <label for="dob" class="form-label">D.O.B:</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                  </div>
                  <div class="mb-3 col-lg-4">
                    <label for="age" class="form-label">Age:</label>
                    <input type="number" class="form-control" id="age" name="age" required>
                  </div>
                  <button type="submit" name="register" class="btn btn-primary">Register</button>
                </form>
              </div>
            </div>
  
            <div class="tab-pane fade" id="v-pills-recharge" role="tabpanel" aria-labelledby="v-pills-recharge-tab">
              <div class="form-container">
                <h2>Recharge Account</h2>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <div class="mb-3">
                    <label for="user_id" class="form-label">UserID:</label>
                    <input type="number" class="form-control" id="user_id" name="user_id" required>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">Amount:</label>
                    <input type="number" class="form-control" id="amount" name="amount" required>
                  </div>
                  <button type="submit" name="recharge" class="btn btn-primary">Recharge</button>
                </form>
              </div>
            </div>
  
            <div class="tab-pane fade" id="v-pills-withdrawal" role="tabpanel" aria-labelledby="v-pills-withdrawal-tab">
              <div class="form-container">
                <h2>Withdrawal Form</h2>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <div class="mb-3">
                    <label for="user_id" class="form-label">UserID:</label>
                    <input type="number" class="form-control" id="user_id" name="user_id" required>
                  </div>
                <div class="mb-3">
                  <label for="amount" class="form-label">Amount:</label>
                  <input type="text" class="form-control" id="amount" name="amount" required>
                </div>
                <button type="submit" name="withdrawal" class="btn btn-primary">Withdraw</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="tabModal" tabindex="-1" aria-labelledby="tabModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tabModalLabel">Resume Last Accessed Tab?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Do you want to resume from the last accessed tab?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="modalContinueBtn">Yes</button>
            <button type="button" class="btn btn-secondary" id="modalStartBtn">No, Start from the Beginning</button>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
