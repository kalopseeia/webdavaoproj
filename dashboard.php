<?php
require 'config.php';
session_start();
// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // User is not logged in, redirect to the login page
    header("Location: admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <style>
    body {
      background-color: #ececec;
    }

    /* #tablehver {
      --bs-table-hover-bg: #87cefa;
    } */

    .selected {
      font-weight: 700;
    }

    .tblehover tr {
      cursor: pointer;
    }
  </style>
  <script>
    // Content Hide & Show 
    function toggler(divId) {
      // console.log(divId);
      $('#infoconentdiv').children().hide();
      var divIvar = "#" + divId + "content";
      $(divIvar).show();
      // console.log(divIvar);
    }

    $(document).ready(function() {
      $('#infoconentdiv').children().hide();
      $("#elemlink1content").show();


      // Hoviring ---------------------------------------------
      $(".tblehover").on("click", "tr", function() {
        // Remove the "selected" class from all rows
        $("tr").removeClass("selected");

        // Add the "selected" class to the clicked row
        $(this).addClass("selected")
        var rowId = $(this).data("rowid");
        console.log("Selected row ID: " + rowId);

      });


      // Pagination ---------------------------------------------
      // Define the number of items per page
      var itemsPerPage = 10;

      // Get the total number of items
      var totalItems = $(".table tbody tr").length;
      console.log(totalItems);

      // Calculate the number of pages
      var totalPages = Math.ceil(totalItems / itemsPerPage);
      console.log(totalPages);

      // Initialize the current page
      var currentPage = 1;

      // Display the initial page
      showPage(currentPage);

      // Function to show a specific page
      function showPage(page) {
        $(".table tbody tr").hide();
        $(".table tbody tr").each(function(index) {
          if (index >= (page - 1) * itemsPerPage && index < page * itemsPerPage) {
            $(this).show();
          }
        });
      }

      // Function to update pagination links
      function updatePagination() {
        $("#pagination").empty();
        for (var i = 1; i <= totalPages; i++) {
          $("#pagination").append("<a href='#'>" + i + "</a>");
        }
        // Highlight the current page
        $("#pagination a:eq(" + (currentPage - 1) + ")").addClass("active");
      }

      // Initial pagination setup
      updatePagination();

      // Handle click events on pagination links
      $("#pagination").on("click", "a", function(e) {
        e.preventDefault();
        currentPage = parseInt($(this).text());
        showPage(currentPage);
        updatePagination();
      });


    });
  </script>
</head>

<body>
  <div class="row g-0 flex-nowrap">
    <!-- sidebar -->
    <div class="col-2 bg-dark p-3 fixed-top min-vh-100">
      <div class="w-100 text-center mb-4 mt-4">
        <i class="nav-icon material-icons" style="color: white;font-size: 7rem;">account_circle</i>
        <br>
        <p class="h5 text-white font-weight-bold">Admin</p>
      </div>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item" style="font-size: 13px;">
          <a class="nav-link active" aria-current="page" href="#">
            <span class="align-middle"><i class="nav-icon material-icons" style="font-size: 15px;">home</i></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item" style="font-size: 13px;">
          <a class="nav-link" href="#">
            <span class="align-middle"><i class="material-icons" style="font-size: 15px;">timeline</i></span>
            Data Analytics
          </a>
        </li>
        <li class="nav-item" style="font-size: 13px;">
          <a class="nav-link" href="#">
            <span class="align-middle"><i class="material-icons" style="font-size: 15px;">description</i></span>
            Reports
          </a>
        </li>
      </ul>
    </div>
































    <!-- main -->
    <div class="col offset-sm-2"
      style="background-image: url('./assets/img/bckground.png'); background-size: 100%; height: 270px;">
      <ul class="nav justify-content-end bg-dark">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"
            style="font-size: 15px;color: var(--bs-nav-link-hover-color);">Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="font-size: 15px;color: var(--bs-nav-link-hover-color);">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="font-size: 15px;color: var(--bs-nav-link-hover-color);">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="font-size: 15px;color: var(--bs-nav-link-hover-color);">Link</a>
        </li>
      </ul>
      <div class="row g-0 m-4 p-4" id="linkbtncontent">
        <div class="col d-flex justify-content-center">
          <button type="button" class="btn btn-danger btn-lg" onclick="toggler('elemlink1');">
            Electrical
          </button>
        </div>
        <div class="col d-flex justify-content-center">
          <button type="button" class="btn btn-primary btn-lg" onclick="toggler('elemlink2');">
            Office Equipment
          </button>
        </div>
        <div class="col d-flex justify-content-center">
          <button type="button" class="btn btn-success btn-lg" onclick="toggler('elemlink3');">
            Utilities
          </button>
        </div>
        <div class="col d-flex justify-content-center">
          <button type="button" class="btn btn-secondary btn-lg" onclick="toggler('elemlink4');">
            School Furniture
          </button>
        </div>
      </div>

      <div class="container px-5" id="infoconentdiv" style="margin-top: 5rem;">
        <div class="shadow-lg p-3 mb-5 bg-white rounded hddndivctn" id="elemlink1content">

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
          </button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="shadow-lg p-3 mb-5 bg-white rounded hddndivctn" id="elemlink2content">
          <h1>low 2</h1>
        </div>
        <div class="shadow-lg p-3 mb-5 bg-white rounded hddndivctn" id="elemlink3content">
          <h1>low 3</h1>
        </div>
        <div class="shadow-lg px-3 pb-1 mb-5 bg-white rounded hddndivctn" id="elemlink4content">
          <table class="table table-striped">
            <thead class="table-dark">
              <table class="table table-striped table-hover tblehover">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">Nr#</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Type</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
            try {
                $incmtn = 1;
                // SQL SELECT statement
                $sql = "SELECT * FROM `furniture`";

                // Prepare the SQL statement
                $stmt = $conn->prepare($sql);

                // Execute the statement
                $stmt->execute();

                // Fetch all rows as an associative array
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Check if there are rows
                if (count($rows) > 0) {?>
                  <?php foreach ($rows as $row) {
                      echo "<tr class='line-content' data-rowid='", $incmtn ,"'>";
                      echo "<td id='table", $incmtn , "content'>", $incmtn ,"</td>";
                      echo "<td>{$row['name']}</td>";
                      echo "<td>{$row['quantity']}</td>";
                      echo "<td>{$row['type']}</td>";
                      echo "<td>{$row['date']}</td>";
                      echo "</tr>";
                      $incmtn++;
                  }
                    ?>
                </tbody>
              </table>


              <?php
                } else {
                    echo "No data found.";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            } ?>

              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                  <li class="page-item">
                    <a class="page-link">Previous</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
              </nav>
        </div>
      </div>
    </div>
  </div>
  <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>