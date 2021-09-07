<?php include 'components/nav.php' ?> 
<?php include_once 'php/connection.php' ?>
<?php
    $result = $mysqli->query("SELECT * FROM menu") or die($mysqli->error);
?>

        <div class="content-wrapper">

            <div class="breadcrumb-wrap bg-f br-1">
                <div class="overlay bg-black op-9"></div>
                <img src="assets/img/shape-1.png" alt="Image" class="br-shape-1">
                <img src="assets/img/shape-2.png" alt="Image" class="br-shape-2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-title">
                                <h2>Нашето Меню</h2>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="service-details-wrap pt-100 pb-100">
                <div class="container">
                    <div class="row gx-5">
                        <div class="col-xl-12 col-lg-12 order-xl-2 order-lg-1 order-md-1 order-1">
                            <div class="service-desc">
                             
                                <div class="row">
                                    <?php while($row = $result->fetch_assoc()): ?>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="feature-card style1">
                                                <div class="feature-img">
                                                    <img src="./assets/img/products/<?php echo $row['img'] ?>" alt="Image">
                                                </div>
                                                <div class="feature-info">
                                                    <h3 class="feature-title"><a href="shop-details.html"><?php echo $row['title'] ?></a>
                                                    </h3>
                                                    <p><?php echo $row['text'] ?></p>
                                                    <div class="feature-meta">
                                                        <p class="feature-price"><?php echo $row['price'] ?>лв</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile ?>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </section>


           

        </div>
<?php include 'components/footer.php' ?> 