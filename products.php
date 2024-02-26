<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Salads | Healthy Bytes</title>
    <link rel="stylesheet" href="index.css">

    <style>
        /* Custom styles for scrollspy */
        .scrollspy {
            background: rgba(40, 167, 69, 0.2);
            backdrop-filter: blur(2px);
            padding: 0.75rem;
            position: fixed;
            top: 8rem;
            bottom: 2rem;
            left: 5rem;
            width: calc(20% - 1rem);
            border-radius: 1rem;
            z-index: 100;


        }
        footer{
            z-index: 101;
        }

        /* where should i apply scroll margin  */




        .scrollspy .nav-link {

            color: #003400;
            font-size: 1.5em;




        }

        .scrollspy .nav-link.active {
            color: #fff;
            /* Active link color */
            background-color: #28a745;
            /* Active link background color */
        }

        html {
            scroll-behavior: smooth;
        }

        /* implement scroll snap */
        .category {
            scroll-snap-align: center;
            /* margin-block: 1rem; */
            scroll-margin-block: 11rem;
        }

        .category+.category {
            margin-top: 2rem;
        }


        /* implement scroll snap aling center */
        .category-parent {
            scroll-snap-type: y mandatory;
        }
        .main{
            width: clamp(100%, 100%, 100%);
        }

        /* the active class should be applied to the nav-links as soon as the category is visibble in the viewport */


        /*  */
    </style>

</head>

<body data-spy="scroll" data-target="#navbar-example2" data-offset="300">
    <!-- navBar -->
    <?php
    session_start();
    include 'nav.php'; ?>
    <div class="container-fluid mx-auto main" >

        <?php
        // Database connection
        include 'db_connect.php';

        // SQL query
        $sql = "SELECT * FROM salads ORDER BY category";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Fetch all
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Free result set
        mysqli_free_result($result);

        // Close connection
        mysqli_close($conn);
        ?>

        <!-- Scrollspy navigation -->
        <!-- TODO: we can also make the titles dynamic -->
        <div class="row">
            <div class="col-md-3 scrollspy ">
                <h4 class="text-center mb-3">Categories</h4>
                <ul class="nav nav-pills flex-column" id="navbar-example2">
                    <li class="nav-item">
                        <a class="nav-link" href="#protein-rich">Protein</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#fiber-rich">fiber-rich</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#carbs-rich">carbs</a>
                    </li>
                </ul>
            </div>

            <!-- Salad cards grouped by category -->
            <div class="col-md-9 category-parent w-75 ml-auto">
                <h1 class="pt-4 pb-2">Salads</h1>

                <div id="protein-rich" class="category">
                    <h2>Protein-Rich</h2>
                    <div class="container">
                        <div class="row">
                            <?php
                            foreach ($products as $salad) {
                                if ($salad['category'] == 'protein-rich') {
                                    $category = 'protein-rich';

                                    include './components/salad_card.php'; // Include a separate file for card layout
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div id="fiber-rich" class="category">
                    <h2>Fiber Rich</h2>
                    <div class="container">
                        <div class="row">
                            <?php
                            foreach ($products as $salad) {
                                if ($salad['category'] == 'fiber-rich') {
                                    $category = 'fiber-rich';
                                    include './components/salad_card.php'; // Include a separate file for card layout
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div id="carbs-rich" class="category">
                    <h2>carbs</h2>
                    <div class="container">
                        <div class="row">
                            <?php
                            foreach ($products as $salad) {
                                if ($salad['category'] == 'carbs') {
                                    include './components/salad_card.php'; // Include a separate file for card layout
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>