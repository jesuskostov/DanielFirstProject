<?php include 'components/nav.php' ?> 
<?php include_once 'php/connection.php' ?>
<?php
    $result = $mysqli->query("SELECT * FROM intro") or die($mysqli->error);
    $row = $result->fetch_assoc();
?>
        <section class="hero-wrap style1 bg-cod-grey">
            <img src="assets/img/hero/hero-shape-1.png" alt="Image" class="hero-shape-1">
            <img src="assets/img/hero/hero-shape-2.png" alt="Image" class="hero-shape-2">
            <img src="assets/img/hero/hero-shape-31.png" alt="Image" class="hero-shape-3 md-none">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero-content">
                            <h1><?php echo $row['title'] ?></h1>
                            <p><?php echo $row['subtitle'] ?></p>
                            <div class="hero-btn">
                                <a href="shop-left-sidebar.html" class="btn style1"><i class="las la-shopping-bag"></i>Виж нашето меню</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-img-wrap">
                            <img src="assets/img/hero/hero-img-1.png" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-wrap style1 ptb-100">
            <div class="container">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img-wrap">
                            <img src="assets/img/about/about-shape-1.png" alt="Image" class="abouut-shape-1 md-none">
                            <img src="assets/img/about/about-shape-2.png" alt="Image" class="abouut-shape-2 md-none">
                            <img src="assets/img/about/about-shape-3.png" alt="Image" class="abouut-shape-3 md-none">
                            <div class="about-bg-1 bg-f"></div>
                            <div class="about-bg-2 bg-f"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="content-title style2 mb-15">
                                <span>
                                </span>
                                <h2>Ние сме</h2>
                            </div>
                            <p>Още примерен текст Още примерен текст Още примерен текст Още примерен текст</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="service-wrap bg-f service-bg-1 pt-100 pb-75">
            <div class="overlay op-7 bg-white"></div>
            <div class="container">
                <div class="section-title style1 text-center mb-110">
                    <span>
                    </span>
                    <h2> Нашите предимства</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="service-card-wrap">
                            <div class="service-card style1">
                                <div class="service-img">
                                    <img src="assets/img/service/breakfast.png" alt="Image">
                                </div>
                                <div class="service-info">
                                    <h3 class="service-title"><a href="service-details.html">Breakfast</a></h3>
                                    <p>Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum.</p>
                                </div>
                            </div>
                            <div class="service-card style1">
                                <div class="service-img">
                                    <img src="assets/img/service/lunch.png" alt="Image">
                                </div>
                                <div class="service-info">
                                    <h3 class="service-title"><a href="service-details.html">Lunch</a></h3>
                                    <p>Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum.</p>
                                </div>
                            </div>
                            <div class="service-card style1">
                                <div class="service-img">
                                    <img src="assets/img/service/dinner.png" alt="Image">
                                </div>
                                <div class="service-info">
                                    <h3 class="service-title"><a href="service-details.html">Dinner</a></h3>
                                    <p>Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum.</p>
                                </div>
                            </div>
                            <div class="service-card style1">
                                <div class="service-img">
                                    <img src="assets/img/service/custom.png" alt="Image">
                                </div>
                                <div class="service-info">
                                    <h3 class="service-title"><a href="service-details.html">Custom</a></h3>
                                    <p>Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
   
        <section class="contact-wrap style1 bg-f contact-bg-1 pt-100 pb-70 pos-rel">
            <div class="overlay bg-black op-85"></div>
            <img src="assets/img/shape-1.png" alt="Iamge" class="contact-shape-1 lg-none">
            <img src="assets/img/shape-2.png" alt="Iamge" class="contact-shape-2 lg-none">
            <div class="section-title style6 text-center mb-40">
                <span class="text-sunshade">
                    <img src="assets/img/secion-shape-1.png" alt="Image">
                    Contact Us
                    <img src="assets/img/secion-shape-2.png" alt="Image">
                </span>
                <h2 class="text-white">Not Sure What To Order? <br> Contact Us Now</h2>
            </div>
            <div class="container pos-rel">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        <div class="contact-box-wrap">
                            <div class="contact-box-icon">
                                <i class="flaticon-phone-call"></i>
                            </div>
                            <div class="contact-box">
                                <h5>Make A Call</h5>
                                <a href="tel:880123654223">880-123-654</a>
                            </div>
                            <div class="contact-box">
                                <h5>Mail Us</h5>
                                <a href="mainto:hello@caban.com"><span class="__cf_email__" data-cfemail="0e666b6262614e6d6f6c6f60206d6163">[email&#160;protected]</span></a>
                                <img src="assets/img/contact/contact-img-1.png" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php include 'components/footer.php' ?> 
       