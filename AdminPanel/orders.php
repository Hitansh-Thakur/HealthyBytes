<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dynamic Orders Page with Bootstrap</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="orders.css" rel="stylesheet">
</head>

<body>
  <?php
  session_start();

  include_once '../db_connect.php';
  include_once './adminNav.php';
  // select all orders from the database for all users 
  $result = $conn->query("SELECT orders.id,orders.user_id, orders.total_amount, orders.address, orders.order_status, order_items.salad_id, order_items.quantity, order_items.price FROM orders JOIN order_items ON orders.id = order_items.order_id; ");
  $orders = [];
  while ($order = $result->fetch_assoc()) {

    $orders[] = $order;
  }
  ?>

  <div class="container">
    <h1 class="mt-5 mb-3">Orders</h1>

    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Pending Orders
          </div>
          <ul class="list-group list-group-flush" id="pendingOrders">
            <?php
            foreach ($orders as $order) {
              if ($order['order_status'] == 'OutForDelivery') {
                # code...
                $result = $conn->query("SELECT * FROM salads WHERE id = " . $order['salad_id']);
                $salad = $result->fetch_assoc();
                echo "<li class='list-group-item'>" . $order['user_id'] . " - " . $salad['salad_name'] . " - " . $salad['salad_price'] . " <button class='btn btn-success btn-sm ml-2 completeBtn' data-id='" . $order['id'] . "'>Complete</button> <button class='btn btn-danger btn-sm ml-2 removePendingBtn' data-id='" . $order['id'] . "'>Remove</button></li>";

              }
            }
            // details of the order
            ?>
          </ul>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Completed Orders
          </div>
          <ul class="list-group list-group-flush" id="completedOrders">
            <?php
            foreach ($orders as $order) {
              if ($order['order_status'] == 'Delivered') {
                // details of the order
                $result = $conn->query("SELECT * FROM salads WHERE id = " . $order['salad_id']);
                $salad = $result->fetch_assoc();
                echo "<li class='list-group-item'>" . $order['user_id'] . " - " . $salad['salad_name'] . " - " . $salad['salad_price'] . " - " . $order['address'] . " <button class='btn btn-danger btn-sm ml-2 removeCompletedBtn' data-id='" . $order['id'] . "' onclick='updateOrderStatus(" . $order['id'] . ")'>Remove</button></li>";
              }
            }
            ?>
          </ul>
        </div>
      </div>


      <!-- <div class="card mt-4">
        <div class="card-header">
          Add New Order
        </div>
        <div class="card-body">
          <form id="addForm">
            <div class="form-group">
              <label for="customerName">Customer Name</label>
              <input type="text" class="form-control" id="customerName" placeholder="Enter customer name">
            </div>
            <div class="form-group">
              <label for="productName">Product</label>
              <input type="text" class="form-control" id="productName" placeholder="Enter product name">
            </div>
            <button type="submit" class="btn btn-primary">Add Order</button>
          </form>
        </div>
      </div> -->
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function () {
      var pendingOrders = [];
      var completedOrders = [];

      var pendingOrdersList = $('#pendingOrders');
      var completedOrdersList = $('#completedOrders');

      function updateLists() {
        pendingOrdersList.empty();
        completedOrdersList.empty();

        pendingOrders.forEach(function (order) {
          pendingOrdersList.append('<li class="list-group-item">' + order.customer + ' - ' + order.product + ' <button class="btn btn-success btn-sm ml-2 completeBtn" data-id="' + order.id + '">Complete</button> <button class="btn btn-danger btn-sm ml-2 removePendingBtn" data-id="' + order.id + '">Remove</button></li>');
        });

        completedOrders.forEach(function (order) {
          completedOrdersList.append('<li class="list-group-item">' + order.customer + ' - ' + order.product + ' <button class="btn btn-danger btn-sm ml-2 removeCompletedBtn" data-id="' + order.id + '">Remove</button></li>');
        })
      }

      $(document).on('click', '.completeBtn', function () {
        var id = $(this).data('id');
        var order = pendingOrders.find(order => order.id === id);
        if (order) {
          completedOrders.push(order);
          pendingOrders = pendingOrders.filter(order => order.id !== id);
          updateLists();
        }
      });

      $(document).on('click', '.removePendingBtn', function () {
        var id = $(this).data('id');
        pendingOrders = pendingOrders.filter(order => order.id !== id);
        updateLists();
      });

      $(document).on('click', '.removeCompletedBtn', function () {
        var id = $(this).data('id');
        completedOrders = completedOrders.filter(order => order.id !== id);
        updateLists();
      });

      // Handle form submission for adding new order
      $('#addForm').submit(function (e) {
        e.preventDefault();

        var customer = $('#customerName').val();
        var product = $('#productName').val();

        var id = new Date().getTime(); // Generate unique ID

        var order = { id: id, customer: customer, product: product };
        pendingOrders.push(order);

        updateLists();

        // Clear form inputs
        $('#customerName').val('');
        $('#productName').val('');
      });
    });
  </script>

</body>

</html>