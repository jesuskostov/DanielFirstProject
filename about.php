<?php include 'components/nav.php' ?>
<?php include_once 'php/connection.php' ?>
<?php
    $result = $mysqli->query("SELECT * FROM about") or die($mysqli->error);
    $row = $result->fetch_assoc();
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
                        <h2>За нас </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="about-wrap style2 ptb-100">
        <div class="container">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="about-img-wrap">
                        <img src="assets/img/about/about-shape-1.png" alt="Image" class="abouut-shape-1 sm-none">
                        <img src="assets/img/about/about-shape-2.png" alt="Image" class="abouut-shape-2 sm-none">
                        <div class="about-bg-4 bg-f"></div>
                        <div class="about-bg-5 bg-f"></div>
                        <div class="about-bg-6">
                            <img src="assets/img/about/about-6.jpg" alt="Image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="content-title style2 mb-15">
                            <h2>За нас</h2>
                        </div>
                        <p><?php echo $row['text'] ?></p>                        
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php include 'components/footer.php' ?> 
  