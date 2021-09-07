<?php require_once '../php/connection.php' ?>
<?php
	$result_edit = $mysqli->query("SELECT * FROM menu") or die($mysqli->error);
	$result_script = $mysqli->query("SELECT * FROM menu") or die($mysqli->error);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Добавяне - Климатик</title>
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
                <div class="col-lg-12">
                    <div class="row layout-top-spacing">
                        <?php while($row_edit = $result_edit->fetch_assoc()): ?>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-content widget-content-area">
                                    <div class="custom-file-container__image-multi-preview" style="width: 100%; height: 300px; background-image: url('../assets/img/products/<?php echo $row_edit['img'] ?>')"></div>
                                    <form action="./php/edit.php" method="POST" enctype="multipart/form-data">
                                        <div class="custom-file-container" data-upload-id="instructor-<?php echo $row_edit['id'] ?>">
                                            <label><a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                        
                                        <div class="form-group mb-4">
                                            <input type="hidden" name="id" value="<?php echo $row_edit['id'] ?>">
                                            <label for="formGroupExampleInput">Заглавие</label>
                                            <input type="text" class="form-control mb-4" name="title" value="<?php echo $row_edit['title'] ?>">
                                            <label for="formGroupExampleInput">Текст</label>
                                            <input type="text" class="form-control mb-4" name="text" value="<?php echo $row_edit['text'] ?>">
                                            <label for="formGroupExampleInput">Цена</label>
                                            <input type="text" class="form-control mb-4" name="price" value="<?php echo $row_edit['price'] ?>">
                                            <button type="submit" name="edit_product" class="btn btn-primary">Редактирай</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile ?>
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
    <script src="plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    
    <?php while ($row = $result_script->fetch_assoc()): ?>
        <script>
            //First upload
            setTimeout(() => {
                var instructor<?=$row['id'];?> = new FileUploadWithPreview('instructor-<?=$row['id'];?>');
            }, 0);
        </script>
    <?php endwhile; ?>
   
</body>
</html>