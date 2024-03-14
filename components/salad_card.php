<?php foreach ($products as $salad): ?>
    <?php if ($salad['LOWER(`category`)'] == $category): ?>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
            <div class="card" style="max-width: 18rem;">
                <img class="card-img-top" src="./uploads/<?php echo $salad['salad_img']; ?>" alt="<?php echo $salad['salad_name']; ?>" height="200px" style="object-fit:cover;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $salad['salad_name']; ?></h5>
                    <p class="card-text text-truncate text-dark d-block" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;"><?php echo $salad['salad_desc']; ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $salad['LOWER(`category`)']; ?></li>
                </ul>
                <div class="card-body">
                    <span class="text-dark font-weight-bold align-middle"><?php echo $salad['salad_price']; ?> ₹ </span>
                    <a href="product_details.php?id=<?php echo $salad['id']; ?>" class="btn btn-primary float-right align-middle">View</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>
