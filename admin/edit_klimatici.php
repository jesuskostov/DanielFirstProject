<?php require_once '../php/connection.php' ?>
<?php
    // $brand = $_GET['brand'];
	// $result = $mysqli->query("SELECT * FROM brands") or die($mysqli->error);
	// $result_product = $mysqli->query("SELECT * FROM product WHERE brand = '$brand'") or die($mysqli->error);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Редактиране на марки</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
</head>
<body data-spy="scroll" data-target="#navSection" data-offset="100">
    
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <?php include 'nav.php' ?>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">
                <!-- ADD INSTRUCTOR -->
                <div class="col-lg-10">
                    <div class="row layout-top-spacing">
                        <div class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Редактиране на марки</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="./php/edit.php" id="test" method="POST" enctype="multipart/form-data">
                                        <label for="formGroupExampleInput">Марка</label>
                                        <input type="hidden" name="brand_delete" id="hidden-brand">
                                        <select id="brand-select" name="brand" class="form-control mb-4" onchange="takeBrand()">
                                            <?php if (!$brand): ?>
                                                <option value="">Избери марка</option>
                                            <?php elseif ($brand): ?>
                                                <option value="<?php echo $brand ?>"><?php echo $brand ?></option>
                                            <?php endif ?>
                                            <?php while ($row = $result->fetch_assoc()): ?>
                                                <option value="<?php echo $row['brand'] ?>"><?php echo $row['brand'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                        <a id="go-to" href="" class="btn btn-primary">Виж</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row layout-top-spacing">
                        <?php while ($row = $result_product->fetch_assoc()):?>
                            <div class="col-lg-6 mb-4">
                                <a href="edit_klimatici_2.php?id=<?php echo $row['id'] ?>" style="display: contents">
                                    <div class="am-item h-100 pb-0 d-flex flex-column">
                                        <div class="am-thumb">
                                            <img class="w-100" src="../assets/images/products/<?php echo $row['img'] ?>" alt="feature">
                                        </div>
                                        <div class="product-details">
                                            <p><strong>Производител:</strong> <?php echo $row['brand'] ?></p>
                                            <p><strong>Модел:</strong>  <?php echo $row['model'] ?></p>
                                            <p><strong>Тип:</strong>  <?php echo $row['type'] ?></p>
                                            <p><strong>Квадратура:</strong>  <?php echo $row['area'] ?></p>
                                        </div>
                                        <h3 class="mt-auto text-left mb-2"><?php echo $row['price'] ?></h3>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    
    
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script>
        var firstUpload = new FileUploadWithPreview('myFirstImage');
        function takeBrand() {
            let newUrl = 'edit_klimatici.php?brand=' + $('#brand-select').val()
            $('#go-to').attr('href', newUrl)
        }
    </script>
    <!-- END PAGE LEVEL PLUGINS -->    
</body>
</html>