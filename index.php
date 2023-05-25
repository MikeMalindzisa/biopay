<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <!-- Include Bootstrap CSS and other necessary stylesheets -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
    /* Add custom styles for the dashboard */
    .dashboard-content {
      padding: 20px;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <nav class="list-group">
          <h3 class="list-group-item active">Dashboard Menu</h3>
          <a class="list-group-item <?php if(basename($_SERVER['PHP_SELF']) == 'transactions.php') echo 'active'; ?>" href="transactions.php">
            <i class="fas fa-file-alt mr-3"></i>
            Transactions
          </a>
          <a class="list-group-item <?php if(basename($_SERVER['PHP_SELF']) == 'user-management.php') echo 'active'; ?>" href="user-management.php">
            <i class="fas fa-users mr-3"></i>
            User Management
          </a>
          <a class="list-group-item <?php if(basename($_SERVER['PHP_SELF']) == 'merchants.php') echo 'active'; ?>" href="merchants.php">
            <i class="fas fa-store mr-3"></i>
            Merchants
          </a>
          <a class="list-group-item <?php if(basename($_SERVER['PHP_SELF']) == 'stores.php') echo 'active'; ?>" href="stores.php">
            <i class="fas fa-building mr-3"></i>
            Stores
          </a>
        </nav>
      </div>
      <div class="col-md-10">
        <div class="dashboard-content">
          <?php
            // Fetch data from the database or API endpoints
            // Display the relevant content based on the selected menu option

            // Example code:
            $currentPage = basename($_SERVER['PHP_SELF']);

            switch ($currentPage) {
              case 'transactions.php':
                // Fetch and display transactions data
                break;
              case 'user-management.php':
                // Fetch and display user management data
                break;
              case 'merchants.php':
                // Fetch and display merchants data
                break;
              case 'stores.php':
                // Fetch and display stores data
                break;
              default:
                // Display a default landing page or an error message
                break;
            }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Include Bootstrap JS and other necessary scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
