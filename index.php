<?php
require 'config.php';
?>
<html>

<head>
    <title>
        JQuery Pagination
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <head>
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .wrapper {
                margin: 30px auto;
                text-align: center;
            }

            h1 {
                margin-bottom: 1em;
                color: #007bff;
            }

            #pagination-demo {
                display: inline-block;
                margin-bottom: 1em;
                margin-top: 1em;
            }

            #pagination-demo li {
                display: inline-block;
            }

            #data td,
            #data th {
                border: 1px solid #ddd;
                padding: 6px;
            }

            #data tr:hover {
                background-color: #ddd;
            }

            .page-content {
                background: #eee;
                display: inline-block;
                padding: 10px;
                width: 100%;
                max-width: 660px;
            }

            #data th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #007bff;
                color: white;
            }

            table,
            th,
            td {
                border: 1px solid black;
            }

            #page-content {
                color: white;
                background-color: #007bff;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.1/jquery.twbsPagination.min.js">
        </script>
        <script>
            $(document).ready(function() {

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
                        $('#pagination').append(
                            '<nav aria-label="Page navigation example"> <ul class="pagination justify-content-end"> <li class="page-item"> <a class="page-link">' +
                            i + '</a> </li></ul> </nav>');
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

    <body>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

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
                    </div>
                </div>
                <div id="page-content" class="page-content"> Page 1</div>
            </div>
        </div>
        <div id="pagination"></div>
        <script src="./assets/js/bootstrap.bundle.min.js"></script>
    </body>

</html>