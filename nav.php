<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="index.css">

<style>
    .dropdown:hover>.dropdown-menu {
        display: block;
    }

    .dropdown-menu {
        top: 90%;
        right: 50%;
    }

    .dropdown>.dropdown-toggle:active {
        /*Without this, clicking will make it sticky*/
        pointer-events: none;

    }

    .dropdown-toggle::after {
        display: block;
        visibility: hidden;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top mb-3">
    <a class="navbar-brand pr-3 pl-4" href="#">
        <img src="./images/logo.png" class="d-inline-block align-top" alt="">

    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo ($_SERVER['PHP_SELF'] == '/HealthyBytes/index.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo ($_SERVER['PHP_SELF'] == '/HealthyBytes/products.php') ? 'active' : ''; ?>">
                <a class="nav-link " href="./products.php">Salads</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Catagories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./products.php#protein-rich">Protein-Rich</a>
                    <a class="dropdown-item" href="./products.php#fiber-rich">Fiber-Rich</a>
                    <a class="dropdown-item" href="./products.php#vegan">Vegan Salad</a>
                    <a class="dropdown-item" href="./products.php#mediterranean">Mediterranean </a>
                    <a class="dropdown-item" href="./products.php#fruit-salad">Fruit Salads</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./login.php">Sign In</a>
            </li>
        </ul>

        <div class="d-flex align-items-center ">

            <!------------------------- CART LOGO -------------------------->
            <a href="cart.php" class="nav-link text-dark d-flex mt-2 flex-column justify-content-center align-items-center">
                <i class="cart fa-solid fa-cart-shopping">
                    <span>
                        <?php
                        require_once 'db_connect.php';
                        if (isset($_SESSION['user_id'])) {
                            $user_id = $_SESSION['user_id'];
                            $result = $conn->query("SELECT SUM(cart_items.quantity) as total_quantity
                            FROM cart_items
                            JOIN cart ON cart_items.cart_id = cart.id
                            WHERE cart.user_id = " . $user_id);
                            $row = $result->fetch_assoc();
                            if ($row['total_quantity'] == null) {
                                echo 0;
                            } else {
                                echo $row['total_quantity'];
                            }
                        } else {
                            echo 0;
                        }
                        ?>
                    </span>
                </i>
                <span>Cart & Orders</span>
            </a>
            <!------------------------- USER LOGO -------------------------->
            <div class=" dropdown d-flex flex-column justify-content-center align-items-center py-2">

                <i class="user dropdown-toggle fa-solid fa-circle-user mx-4 "></i>
                <span>
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    } else {
                        echo "Guest";

                    }

                    ?>
                </span>
                <!--TODO:  logout -->
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">


                    <a href="./logout.php" class="btn dropdown-item">Logout</a>




                </ul>

            </div>
        </div>

    </div>
</nav>