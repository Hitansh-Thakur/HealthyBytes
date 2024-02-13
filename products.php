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

</head>

<body>
    <!-- navBar -->
    <?php include 'nav.php'; ?>
    <div class="container ">

        <h1 class="pt-4 pb-2">Salads</h1>
        <?php
        // Database connection
        include 'db.php';

        // SQL query
        $sql = "SELECT * FROM salads";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Fetch all
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Free result set
        mysqli_free_result($result);

        // Close connection
        mysqli_close($conn);
        ?>

        <!-- Your existing HTML code -->

        <div class="container">
            <div class="row">
                <?php
                foreach ($products as $salad) {
                    ?>
                    <div class="col-sm-12 col-md-6 col-lg-4"> <!-- This makes the grid responsive -->

                        <div class="card" style="max-width: 18rem;">
                            <img class="card-img-top " src="<?php echo "./uploads/" . $salad['salad_img']; ?>"
                                alt="Card image cap" height="200px" style="object-fit:cover;">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $salad['salad_name']; ?>
                                </h5>
                                <p class="card-text text-truncate text-dark d-block" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;" >
                                    <?php echo $salad['salad_desc']; ?>
                                </p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <?php echo $salad['nutritional_content']; ?>
                                </li>

                            </ul>
                            <div class="card-body">
                                <span class="text-dark font-weight-bold align-middle" >
                                    <?php echo $salad['salad_price'] . " ₹ "; ?>
                                </span>
                                <!-- <a href="product_details.php?id=1" class="btn btn-primary float-right align-middle"></a> -->
                            <?php    
                                echo "<a href='product_details.php?id=" . $salad['id'] . "' class='btn btn-primary float-right align-middle'>View</a>";
                            ?>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                ?>


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