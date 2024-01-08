 <!-- Purpose: This file is used to create the navigation bar for the website. It is included in all pages except for the -->

<style>
    .navbar img {

        height: 4rem;

    }
</style>
<nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">

        <div class=" w-100 d-flex justify-content-between align-items-center">
            <div class="container">
                <a class="navbar-brand ml-3" href="#"><img src="./images/logo.png" alt="Healthy Bytes"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="container ">
                <form class=" form-inline my-2 my-lg-0">
                    <!-- make search bar center -->
                    <input class="w-75 form-control mr-sm-2" type="search" placeholder="Search Salads"
                        aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class=" container collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="text-right navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php">Sign In</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Catagories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</nav>