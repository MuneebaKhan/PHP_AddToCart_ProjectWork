<?php include 'header.php'; ?>
<?php include 'connection.php'; ?>


<!-- Css Styles -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" type="text/css">



<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul>
                        <li><a href="#">Fresh Meat</a></li>
                        <li><a href="#">Vegetables</a></li>
                        <li><a href="#">Fruit & Nut Gifts</a></li>
                        <li><a href="#">Fresh Berries</a></li>
                        <li><a href="#">Ocean Foods</a></li>
                        <li><a href="#">Butter & Eggs</a></li>
                        <li><a href="#">Fastfood</a></li>
                        <li><a href="#">Fresh Onion</a></li>
                        <li><a href="#">Papayaya & Crisps</a></li>
                        <li><a href="#">Oatmeal</a></li>
                        <li><a href="#">Fresh Bananas</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="assets/img/hero/banner.jpg">
                    <div class="hero__text">
                        <span>FRUIT FRESH</span>
                        <h2>Vegetable <br />100% Organic</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="#" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Category Section -->
<?php
    $query = 'select * from category';
    ($res = mysqli_query($con, $query)) or die('Incorrect Query!!');
    $Rowcount = mysqli_num_rows($res);
    if ($Rowcount > 0) { ?>

<!-- Categories Section PHP Code Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <?php while ($data = mysqli_fetch_assoc($res)) {
                        echo '<div class="col-lg-3">'; ?>
                <div class="categories__item set-bg" data-setbg="<?= @$data[
                            'categoryImg'
                        ] ?>">
                    <h5><a href="#"><?= @$data[
                                'categoryName'
                            ] ?> </a></h5>
                </div>
                <?php echo '</div>';
                    } ?>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section PHP Code End -->

<?php } else {echo "<h5 class='text-danger'>No Record found</h5>";}
    ?>
<!-- Category Section End-->



<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>                
            </div>
        </div>


        <?php
            $query = 'select * from product';
            ($Prodres = mysqli_query($con, $query)) or die('Incorrect Query!!');
        ?>

        <div class="row featured__filter">
           
        <?php while ($data = mysqli_fetch_assoc($Prodres)) { echo "<div class='col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat'>";?>

            
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?= @$data['prodImg'] ?>">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="ProductDetail.php?id=<?=@$data['productId']?>"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#"><?= @$data['name'] ?></a></h6>
                        <h5>RS: <?= @$data['price'] ?></h5>
                    </div>
                </div>
           
        
        <?php echo "</div>" ;} ?>

        </div>

    </div>
</section>
<!-- Featured Section End -->



<!-- Js Plugins -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/jquery.slicknav.js"></script>
<script src="assets/js/mixitup.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/main.js"></script>