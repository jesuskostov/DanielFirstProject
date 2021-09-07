<?php require_once '../php/connect.php' ?>
<?php
    $id = $_GET['id'];
	$result_edit = $mysqli->query("SELECT * FROM multisplit_systems WHERE `id` = '$id'") or die($mysqli->error);
	$result_edit_combination = $mysqli->query("SELECT * FROM combination_product WHERE `product_id` = '$id'") or die($mysqli->error);
	$result_edit_combination_script = $mysqli->query("SELECT * FROM combination_product WHERE `product_id` = '$id'") or die($mysqli->error);
    $row_edit = $result_edit->fetch_assoc();
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
                <div class="col-lg-10">
                    <div class="row layout-top-spacing">
                        <div class="col-lg-6 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Редактиране</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                <div class="custom-file-container__image-multi-preview" style="background-image: url('../assets/images/products/<?php echo $row_edit['img'] ?>')"></div>
                                <form action="./php/edit.php" method="POST" enctype="multipart/form-data">
                                    <div class="custom-file-container" data-upload-id="myFirstImage">
                                        <label><a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                        <label class="custom-file-container__custom-file" >
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
                                        <label for="formGroupExampleInput">Външно тяло</label>
                                        <input type="text" class="form-control mb-4" name="body_outer" value="<?php echo $row_edit['body_outer'] ?>">
                                        <label for="formGroupExampleInput">Брой вътрешни тела</label>
                                        <input type="text" class="form-control mb-4" name="body_inner_quantity" value="<?php echo $row_edit['body_inner_quantity'] ?>">
                                        <label for="formGroupExampleInput">Енергиен клас</label>
                                        <input type="text" class="form-control mb-4" name="class" value="<?php echo $row_edit['class'] ?>">
                                        <label for="formGroupExampleInput">Охлаждане EER</label>
                                        <input type="text" class="form-control mb-4" name="cold_eer" value="<?php echo $row_edit['cold_eer'] ?>">
                                        <label for="formGroupExampleInput">Отопление COP</label>
                                        <input type="text" class="form-control mb-4" name="hot_cop" value="<?php echo $row_edit['hot_cop'] ?>">
                                        <label for="formGroupExampleInput">Гаранция</label>
                                        <input type="text" class="form-control mb-4" name="warranty" value="<?php echo $row_edit['warranty'] ?>">
                                        <label for="formGroupExampleInput">Квадратура</label>
                                        <input type="text" class="form-control mb-4" name="area" value="<?php echo $row_edit['area'] ?>">
                                        <label for="formGroupExampleInput">Цена</label>
                                        <input type="text" class="form-control mb-4" name="price" value="<?php echo $row_edit['price'] ?>">
                                        <label for="formGroupExampleInput">Отдавана мощност (охлаждане)(мин./ном./макс.)</label>
                                        <input type="text" class="form-control mb-4" name="performance_cold" value="<?php echo $row_edit['performance_cold'] ?>">
                                        <label for="formGroupExampleInput">Отдавана мощност (отопление)(мин./ном./макс.)</label>
                                        <input type="text" class="form-control mb-4" name="performance_hot" value="<?php echo $row_edit['performance_hot'] ?>">
                                        <label for="formGroupExampleInput">Консумирана мощност (охлаждане)</label>
                                        <input type="text" class="form-control mb-4" name="consume_cold" value="<?php echo $row_edit['consume_cold'] ?>">
                                        <label for="formGroupExampleInput">Консумирана мощност (отопление)</label>
                                        <input type="text" class="form-control mb-4" name="consume_hot" value="<?php echo $row_edit['consume_hot'] ?>">
                                        <label for="formGroupExampleInput">Захранване</label>
                                        <input type="text" class="form-control mb-4" name="power" value="<?php echo $row_edit['power'] ?>">
                                        <label for="formGroupExampleInput">SEER</label>
                                        <input type="text" class="form-control mb-4" name="seer" value="<?php echo $row_edit['seer'] ?>">
                                        <label for="formGroupExampleInput">SCOP</label>
                                        <input type="text" class="form-control mb-4" name="scop" value="<?php echo $row_edit['scop'] ?>">
                                        <label for="formGroupExampleInput">Нива на шум - вътрешно/външно тяло</label>
                                        <input type="text" class="form-control mb-4" name="noice" value="<?php echo $row_edit['noice'] ?>">
                                        <label for="formGroupExampleInput">Размери (външно тяло)</label>
                                        <input type="text" class="form-control mb-4" name="size_outer" value="<?php echo $row_edit['size_outer'] ?>">
                                        <label for="formGroupExampleInput">Тегло (външно тяло)</label>
                                        <input type="text" class="form-control mb-4" name="weight_outer" value="<?php echo $row_edit['weight_outer'] ?>">
                                        <label for="formGroupExampleInput">Работен диапазон при охлаждане</label>
                                        <input type="text" class="form-control mb-4" name="work_cold" value="<?php echo $row_edit['work_cold'] ?>">
                                        <label for="formGroupExampleInput">Работен диапазон при отопление</label>
                                        <input type="text" class="form-control mb-4" name="work_hot" value="<?php echo $row_edit['work_hot'] ?>">
                                        <label for="formGroupExampleInput">Хладилен агент</label>
                                        <input type="text" class="form-control mb-4" name="agent" value="<?php echo $row_edit['agent'] ?>">
                                        <label for="formGroupExampleInput">Произход</label>
                                        <input type="text" class="form-control mb-4" name="origin" value="<?php echo $row_edit['origin'] ?>">
                                        <button type="submit" name="edit_system" class="btn btn-primary">Редактирай</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 layout-spacing">
                            <div class="statbox widget box box-shadow mb-4">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Добавяне на климатик</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="./php/edit.php" method="POST" enctype="multipart/form-data">
                                        <div class="custom-file-container" data-upload-id="second">
                                            <label><a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                            <label class="custom-file-container__custom-file" >
                                                <input type="file" name="image" class="custom-file-container__custom-file__custom-file-input" accept="image/*" required>
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                        
                                        <div class="form-group mb-4">
                                            <input type="hidden" name="id" value="<?php echo $id ?>">
                                            <label for="formGroupExampleInput">Заглавие</label>
                                            <input type="text" class="form-control mb-4" name="title">
                                            <label for="formGroupExampleInput">Модел</label>
                                            <input type="text" class="form-control mb-4" name="models">
                                            <button type="submit" name="add_combination" class="btn btn-primary">Добави</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php while ($row_combination = $result_edit_combination->fetch_assoc()): ?>
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Редактиране</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form action="./php/edit.php" method="POST" enctype="multipart/form-data">
                                            <div class="custom-file-container__image-multi-preview" style="background-image: url('../assets/images/combinations/<?php echo $row_combination['img'] ?>')"></div>
                                            <div class="custom-file-container" data-upload-id="instructor-<?php echo $row_combination['id'] ?>">
                                                <label><a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                                <label class="custom-file-container__custom-file" >
                                                    <input type="file" name="image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                <div class="custom-file-container__image-preview"></div>
                                            </div>
                                            
                                            <div class="form-group mb-4">
                                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                                <label for="formGroupExampleInput">Заглавие</label>
                                                <input type="text" class="form-control mb-4" name="title" value="<?php echo $row_combination['title'] ?>">
                                                <label for="formGroupExampleInput">Модел</label> 
                                                <input type="text" class="form-control mb-4" name="models" value="<?php echo $row_combination['models'] ?>">
                                                <button type="submit" name="edit_combination" class="btn btn-primary">Редактиране</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
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
    <?php while ($row_instructor_script = $result_edit_combination_script->fetch_assoc()): ?>
        <script>
            //First upload
            setTimeout(() => {
                var instructor<?=$row_instructor_script['id'];?> = new FileUploadWithPreview('instructor-<?=$row_instructor_script['id'];?>');
            }, 0);
        </script>
    <?php endwhile; ?>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script>
        var firstUpload = new FileUploadWithPreview('myFirstImage');
        var firstUpload2 = new FileUploadWithPreview('second');
        // var firstUpload3 = new FileUploadWithPreview('add-gallery');
    </script>
    <!-- END PAGE LEVEL PLUGINS -->    
</body>
</html>