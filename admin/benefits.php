<?php require_once '../php/connect.php' ?>
<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location: login.php?error=Не сте се логнали!");
	}
?>
<?php 
	$result = $mysqli->query("SELECT * FROM benefits WHERE is_box = 0") or die($mysqli->error);
	$result_box = $mysqli->query("SELECT * FROM benefits WHERE is_box = 1") or die($mysqli->error);
?>	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Редактиране - ПРЕДИМСТВА </title>
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
                <!-- BENEFITS -->
                <div class="container">
                    <div class="row layout-top-spacing">
                        <div class="col-lg-12 col-12  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">                                
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Предимства</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form action="./php/edit.php" method="POST">
                                            <?php while ($row = $result->fetch_assoc()): ?>
                                                <div class="form-group mb-4">
                                                    <label for="formGroupExampleInput">Предимства</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput" name="id[<?php echo $row['id'] ?>]" value="<?php echo $row['text'] ?>" placeholder="Example input">
                                                </div>  
                                        <?php endwhile; ?>
                                        <?php while ($row1 = $result_box->fetch_assoc()): ?>
                                                <div class="form-group mb-4">
                                                    <label for="formGroupExampleInput">Предимства в <span style="color: red;">кутийка</span></label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput"  name="id[<?php echo $row1['id'] ?>]"  value="<?php echo $row1['text'] ?>" placeholder="Example input">
                                                </div>
                                        <?php endwhile; ?>
                                            <button type="submit" name="edit_benefits" class="btn btn-primary">Запази</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

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
    
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/file-upload/file-upload-with-preview.min.js"></script>
</body>
</html>