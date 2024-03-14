<?php
session_start();

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="index.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Healthy Bytes | Home</title>
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <!-- Lenis Smooth Scroll -->

</head>

<body>
    <!-- navBar -->
    <?php
    include 'nav.php';


    ?>

    <main class="d-flex flex-column ">
        <!-- Slider -->
        <!-- <div class="main d-flex flex-column slider">
            <div class=" d-block container pt-4 w-90 ">
                <div id="carouselExampleControls " class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block " src="./images/1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block " src="./images/2.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block " src="./images/3.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div> -->
        <div id="carouselExampleIndicators" class=" carousel slide mt-5 slider w-75 mx-auto" data-ride="carousel">
            <ol class="carousel-indicators ">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner d-flex ">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="./images/1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./images/2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./images/3.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- Catagories -->
        <div class="catagories d-block container my-4">
            <!-- <div class="categories "> -->
            <h2>Order By Categories</h2>
            <div id="product-section section d-block container">
                <div class="product-container">
                    <div class="product">
                        <div class="product-content">
                            <h3>Protein Rich</h3>
                            <p>
                            Protein-rich foods are essential for muscle repair and growth, providing the body with the necessary building blocks for optimal health and strength.
                            </p>
                            <a href="./products.php#protein-rich" class="btn primary-btn card-btn">Show Product</a>
                        </div>
                    </div>

                    <div class="product">
                        <div class="product-content">
                            <h3>Fiber Rich</h3>
                            <p>
                            Fiber-rich salads are a nutritious addition to any meal, packed with a variety of vegetables, fruits, and whole grains. They promote digestive health.


                            </p>
                            <a href="./products.php#fiber-rich" class="btn primary-btn card-btn">Show Product</a>
                        </div>
                    </div>

                    <div class="product">
                        <div class="product-content">
                            <h3>Mediterranean</h3>
                            <p>
                            The Mediterranean diet emphasizes fresh produce, olive oil, fish, and nuts, offering a delicious and nutritious way to support longevity and health.
                            </p>
                            <a href="./products.php#mediterranean" class="btn primary-btn card-btn">Show Product</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- popular -->
        <!-- small cards with images to show popular products -->
        <div class="container d-block my-4">
            <h2 class="py-2">Popular Products</h2>

            <div class="flex-wrap justify-content-around d-flex">

                <a href="./product_details.php?id=20" class="link card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Berry Bliss Salad</div>
                    <div class="card-body text-center p-0">
                        <img class="w-50" src="./images/illustrations/1.webp" alt="">
                    </div>
                </a>
                <a href='product_details.php?id=5' class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Lentil Salad</div>
                    <div class="card-body text-center p-0">
                        <img class="w-50" src="./images/illustrations/2.webp" alt="">
                    </div>
                </a>
                <a href='product_details.php?id=10' class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Mediterranean Chopped Salad</div>
                    <div class="card-body text-center p-0">
                        <img class="w-50" src="./images/illustrations/3.webp" alt="">
                    </div>
                </a>
                <a href='product_details.php?id=15' class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Greek Salad</div>
                    <div class="card-body text-center p-0">
                        <img class="w-50" src="./images/illustrations/2.webp" alt="">
                    </div>
                </a>
                <a href='product_details.php?id=25' class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Fall Harvest</div>
                    <div class="card-body text-center p-0">
                        <img class="w-50" src="./images/illustrations/3.webp" alt="">
                    </div>
                </a>
                <a href='product_details.php?id=26' class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Tropical Paradise</div>
                    <div class="card-body text-center p-0">
                        <img class="w-50" src="./images/illustrations/1.webp" alt="">
                    </div>
                </a>

            </div>
        </div>


        <!-- bootstrap 4 footer -->
        <?php include 'footer.php'; ?>





    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <?php include './smoothscroll.php' ?>
    


</body>

</html>