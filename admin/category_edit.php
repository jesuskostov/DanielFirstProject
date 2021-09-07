<?php require_once './connect.php' ?>
<?php 
	$result_category_edit = $mysqli->query("SELECT * FROM category") or die($mysqli->error);
	$result_category_edit_script = $mysqli->query("SELECT * FROM category") or die($mysqli->error);
?>	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Редактиране - КАТЕГОРИИ</title>
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


        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">
                <!-- EDIT CATEGORY -->
                <div class="col-lg-12">
                    <div class="row layout-top-spacing">
                        <?php while ($row_category_edit = $result_category_edit->fetch_assoc()): ?>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Редактиране на <?php echo $row_category_edit['name'] ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form action="./php/edit.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group mb-4">
                                            <div class="widget-header">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>Single File Upload</h4>
                                                    </div>      
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area">
                                                <div class="custom-file-container" data-upload-id="edit-category-<?php echo $row_category_edit['id'] ?>">
                                                    <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                    <label class="custom-file-container__custom-file" >
                                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" name="category-img" accept="image/*">
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview"></div>
                                                </div>
                                            </div>
                                            <input type="hidden" value="<?php echo $row_category_edit['id'] ?>" name="id">
                                            <label for="formGroupExampleInput">Заглавие</label>
                                            <input type="text" class="form-control mb-4" id="formGroupExampleInput" value="<?php echo $row_category_edit['name'] ?>" name="name">
                                            <label for="formGroupExampleInput">За категорията</label>
                                            <input type="text" class="form-control mb-4" id="formGroupExampleInput" value="<?php echo $row_category_edit['text'] ?>" name="text">
                                            <label for="textarea">Изисквания за започване на курса</label>
                                            <textarea id="textarea" name="req_start" class="form-control textarea mb-3" rows="5"><?php echo $row_category_edit['req_start'] ?></textarea>
                                            <label for="textarea">Необходими документи за записване</label>
                                            <textarea id="textarea" name="req_docs" class="form-control textarea mb-3" rows="5"><?php echo $row_category_edit['req_docs'] ?></textarea>
                                            <label for="textarea">Обучение</label>
                                            <textarea id="textarea" name="training" class="form-control textarea mb-3" rows="5"><?php echo $row_category_edit['training'] ?></textarea>
                                            <label for="textarea">Изпити</label>
                                            <textarea id="textarea" name="exam" class="form-control textarea mb-3" rows="5"><?php echo $row_category_edit['exam'] ?></textarea>
                                            <label for="textarea">Продължителност на курса</label>
                                            <textarea id="textarea" name="duration" class="form-control textarea mb-3" rows="5"><?php echo $row_category_edit['duration'] ?></textarea>
                                            <label for="formGroupExampleInput">Цена</label>
                                            <input type="text" class="form-control mb-4" id="formGroupExampleInput" value="<?php echo $row_category_edit['price'] ?>" name="price">
                                            <button type="submit" name="update_category" class="btn btn-primary">Редактиране</button>
                                            <button type="submit" name="delete_category" class="btn btn-danger">Изтрий</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
    
                        <!-- <div id="fuMultipleFile" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Multiple File Upload</h4>
                                        </div>      
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="custom-file-container" data-upload-id="mySecondImage">
                                        <label>Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                        <label class="custom-file-container__custom-file" >
                                            <input type="file" class="custom-file-container__custom-file__custom-file-input" multiple>
                                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
                                        <div class="custom-file-container__image-preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
    
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
    <?php while ($row_category_edit_script = $result_category_edit_script->fetch_assoc()): ?>
        <script>
            //First upload
            setTimeout(() => {
                var instructor<?=$row_category_edit_script['id'];?> = new FileUploadWithPreview('edit-category-<?=$row_category_edit_script['id'];?>');
            }, 0);
        </script>
    <?php endwhile; ?>
    <script>
        var firstUpload = new FileUploadWithPreview('myFirstImage');
        var firstUpload2 = new FileUploadWithPreview('add-category');
        var firstUpload3 = new FileUploadWithPreview('add-gallery');
    </script>
    <!-- END PAGE LEVEL PLUGINS -->    
</body>
</html>