<?php
include '../../php/connection.php';

if (isset($_POST['edit_benefits'])) {

    $ids = $_POST['id'];

    foreach($ids as $id => $value){
        $value = htmlspecialchars($value);
        $mysqli->query("UPDATE benefits SET `text`='$value' WHERE id=$id ") or die($mysqli->error);
    }

    header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['edit_about'])) {
    $text = $_POST['about'];
    $mysqli->query("UPDATE about SET `text`='$text'") or die($mysqli->error);
    header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['add_instructor'])) {

    $name = $_POST['name'];
    $info = $_POST['info'];

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
    $folder = "../../images/instructors/".$filename;
            
    // Get all the submitted data from the form
    $mysqli->query("INSERT INTO `instructor` (`id`, `name`, `text`, `img`) VALUES (NULL, '$name', '$info', '$filename')") or die($mysqli->error);
    $msg = '';
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
    } else{
        $msg = "Failed to upload image";
    }
    header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['update_instructor'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $info = $_POST['info'];

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
    $folder = "../../images/instructors/".$filename;
    
    if ($filename) {
        $mysqli->query("UPDATE `instructor` SET `img` = '$filename' WHERE id = $id") or die($mysqli->error);
    }
    // Get all the submitted data from the form
    $mysqli->query("UPDATE `instructor` SET `name` = '$name', `text` = '$info' WHERE id = $id") or die($mysqli->error);
    $msg = '';
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
    } else{
        $msg = "Failed to upload image";
    }
    header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['delete_instructor'])) {
    $id = $_POST['id'];
    $mysqli->query("DELETE FROM `instructor` WHERE id = $id") or die($mysqli->error);
    header('location:'.$_SERVER['HTTP_REFERER']);
}
// ---
if (isset($_POST['add_brand'])) {

    $name = $_POST['name'];

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
    $folder = "../../assets/images/brand/".$filename;

    if ($filename) {
        // Get all the submitted data from the form
        $mysqli->query("INSERT INTO `brands` (`id`, `img`,`brand`) VALUES (NULL, '$filename','$name')") or die($mysqli->error);
        $msg = '';
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
        } else{
            $msg = "Failed to upload image";
        }
    } 
    header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['add_product'])) {

    $title = $_POST['title'];
    $text = $_POST['text'];
    $price = $_POST['price'];
    
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
    $folder = "../../assets/img/products/".$filename;

    if ($filename) {
        move_uploaded_file($tempname, $folder);
        $mysqli->query("INSERT INTO `menu` (`title`, `text`, `price`, `img`) VALUES ('$title', '$text', '$price', '$filename')") or die($mysqli->error);
    }

    header('location:'.$_SERVER['HTTP_REFERER']);

}

if (isset($_POST['edit_product'])) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $text = $_POST['text'];
    $price = $_POST['price'];
    
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
    $folder = "../../assets/img/products/".$filename;

    if ($filename) {
        move_uploaded_file($tempname, $folder);
        $mysqli->query("UPDATE `menu` SET `title` = '$title', `text` = '$text', `price` = '$price', `img` = '$filename' WHERE `id` = '$id'") or die($mysqli->error);
    } else {
        $mysqli->query("UPDATE `menu` SET `title` = '$title', `text` = '$text', `price` = '$price' WHERE `id` = '$id' ") or die($mysqli->error);
    }

    header('location:'.$_SERVER['HTTP_REFERER']);

}

if (isset($_POST['edit_brand'])) {

    $brand = $_POST['brand'];
    $name = $_POST['name'];

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
    $folder = "../../assets/images/brand/".$filename;

    if ($filename && $name) {
        // Get all the submitted data from the form
        $mysqli->query("UPDATE `brands` SET `img` = '$filename', brand = '$name' WHERE brand = '$brand'") or die($mysqli->error);
        $mysqli->query("UPDATE `product` SET brand = '$name' WHERE brand = '$brand'") or die($mysqli->error);
        $msg = '';
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
        } else{
            $msg = "Failed to upload image";
        }
    } else if ($filename && !$name) {
        $mysqli->query("UPDATE `brands` SET `img` = '$filename' WHERE brand = '$brand'") or die($mysqli->error);
        $msg = '';
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
        } else{
            $msg = "Failed to upload image";
        }
    } else if (!$filename && $name) {
        $mysqli->query("UPDATE `brands` SET brand = '$name' WHERE brand = '$brand'") or die($mysqli->error);
        $mysqli->query("UPDATE `product` SET brand = '$name' WHERE brand = '$brand'") or die($mysqli->error);
    }

    header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['delete_brand'])) {

    $brand = $_POST['brand_delete'];
    $mysqli->query("DELETE FROM `brands` WHERE brand = '$brand' ") or die($mysqli->error);
    $mysqli->query("DELETE FROM `product` WHERE brand = '$brand' ") or die($mysqli->error);
    header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['add_slider'])) {

    $title = $_POST['title'];
    $small_text_under = $_POST['small_text_under'];

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
    $folder = "../../assets/images/slider/".$filename;

    if ($filename) {
        // Get all the submitted data from the form
        $mysqli->query("INSERT INTO `slider` (`id`, `img`, `title`, `text`) VALUES (NULL, '$filename', '$title', '$small_text_under');") or die($mysqli->error);
        $msg = '';
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
        } else{
            $msg = "Failed to upload image";
        }
    } 
    header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['edit_slider'])) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $small_text_under = $_POST['small_text_under'];

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
    $folder = "../../assets/images/slider/".$filename;

    if ($filename) {
        // Get all the submitted data from the form
        $mysqli->query("UPDATE `slider` SET `img` = '$filename', `title` = '$title', `text` = '$small_text_under' WHERE `id` = $id") or die($mysqli->error);
        $msg = '';
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
        } else{
            $msg = "Failed to upload image";
        }
    } else {
        $mysqli->query("UPDATE `slider` SET `title` = '$title', `text` = '$small_text_under' WHERE `id` = $id") or die($mysqli->error);
    }
    
    header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['add_system'])) {

    $title = $_POST['title'];
    $brand = $_POST['brand'];
    $body_outer = $_POST['body_outer'];
    $body_inner_quantity = $_POST['body_inner_quantity'];
    $class = $_POST['class'];
    $cold_eer = $_POST['cold_eer'];
    $hot_cop = $_POST['hot_cop'];
    $warranty = $_POST['warranty'];
    $area = $_POST['area'];
    $price = $_POST['price'];
    $performance_cold = $_POST['performance_cold'];
    $performance_hot = $_POST['performance_hot'];
    $consume_cold = $_POST['consume_cold'];
    $consume_hot = $_POST['consume_hot'];
    $power = $_POST['power'];
    $seer = $_POST['seer'];
    $scop = $_POST['scop'];
    $noice = $_POST['noice'];
    $size_outer = $_POST['size_outer'];
    $weight_outer = $_POST['weight_outer'];
    $work_cold = $_POST['work_cold'];
    $work_hot = $_POST['work_hot'];
    $agent = $_POST['agent'];
    $origin = $_POST['origin'];

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
    $folder = "../../assets/images/products/".$filename;

    if ($filename) {
        $mysqli->query("INSERT INTO `multisplit_systems` (`img`, `title`, `brand`, `body_outer`, `body_inner_quantity`, `class`, `cold_eer`, `hot_cop`, `warranty`, `area`, `price`, `performance_cold`, `performance_hot`, `consume_cold`, `consume_hot`, `power`, `seer`, `scop`, `noice`, `size_outer`, `weight_outer`, `work_cold`, `work_hot`, `agent`, `origin`) VALUES ('$filename', '$title', '$brand', '$body_outer', '$body_inner_quantity', '$class', '$cold_eer', '$hot_cop', '$warranty', '$area', '$price', '$performance_cold', '$performance_hot', '$consume_cold', '$consume_hot', '$power', '$seer', '$scop', '$noice', '$size_outer', '$weight_outer', '$work_cold', '$work_hot', '$agent', '$origin')") or die($mysqli->error);
        $msg = '';
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
        } else{
            $msg = "Failed to upload image";
        }
    }

    header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['edit_system'])) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $body_outer = $_POST['body_outer'];
    $body_inner_quantity = $_POST['body_inner_quantity'];
    $class = $_POST['class'];
    $cold_eer = $_POST['cold_eer'];
    $hot_cop = $_POST['hot_cop'];
    $warranty = $_POST['warranty'];
    $area = $_POST['area'];
    $price = $_POST['price'];
    $performance_cold = $_POST['performance_cold'];
    $performance_hot = $_POST['performance_hot'];
    $consume_cold = $_POST['consume_cold'];
    $consume_hot = $_POST['consume_hot'];
    $power = $_POST['power'];
    $seer = $_POST['seer'];
    $scop = $_POST['scop'];
    $noice = $_POST['noice'];
    $size_outer = $_POST['size_outer'];
    $weight_outer = $_POST['weight_outer'];
    $work_cold = $_POST['work_cold'];
    $work_hot = $_POST['work_hot'];
    $agent = $_POST['agent'];
    $origin = $_POST['origin'];

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
    $folder = "../../assets/images/products/".$filename;

    if ($filename) {
        $mysqli->query("UPDATE `multisplit_systems` SET `img` = '$filename', `title` = '$title', `body_outer` = '$body_outer', `body_inner_quantity` = '$body_inner_quantity', `class` = '$class', `cold_eer` = '$cold_eer', `hot_cop` = '$hot_cop', `warranty` = '$warranty', `area` = '$area', `price` = '$price', `performance_cold` = '$performance_cold', `performance_hot` = '$performance_hot', `consume_cold` = '$consume_cold', `consume_hot` = '$consume_hot', `power` = '$power', `seer` = '$seer', `scop` = '$scop', `noice` = '$noice', `size_outer` = '$size_outer', `weight_outer` = '$weight_outer', `work_cold` = '$work_cold', `work_hot` = '$work_hot', `agent` = '$agent', `origin` = '$origin' WHERE id = '$id'") or die($mysqli->error);
        $msg = '';
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
        } else{
            $msg = "Failed to upload image";
        }
    } else {
        $mysqli->query("UPDATE `multisplit_systems` SET `title` = '$title', `body_outer` = '$body_outer', `body_inner_quantity` = '$body_inner_quantity', `class` = '$class', `cold_eer` = '$cold_eer', `hot_cop` = '$hot_cop', `warranty` = '$warranty', `area` = '$area', `price` = '$price', `performance_cold` = '$performance_cold', `performance_hot` = '$performance_hot', `consume_cold` = '$consume_cold', `consume_hot` = '$consume_hot', `power` = '$power', `seer` = '$seer', `scop` = '$scop', `noice` = '$noice', `size_outer` = '$size_outer', `weight_outer` = '$weight_outer', `work_cold` = '$work_cold', `work_hot` = '$work_hot', `agent` = '$agent', `origin` = '$origin' WHERE id = '$id'") or die($mysqli->error);
    }

    header('location:'.$_SERVER['HTTP_REFERER']);

}


if (isset($_POST['add_combination'])) {

    $product_id = $_POST['id'];
    $title = $_POST['title'];
    $models = $_POST['models'];

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
    $folder = "../../assets/images/combinations/".$filename;

    if ($filename) {
        $mysqli->query("INSERT INTO `combination_product` (product_id, img, title, models) VALUES ('$product_id', '$filename', '$title', '$models')") or die($mysqli->error);
        $msg = '';
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
        } else{
            $msg = "Failed to upload image";
        }
    } 

    header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['edit_combination'])) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $models = $_POST['models'];

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
    $folder = "../../assets/images/combinations/".$filename;

    if ($filename) {
        $mysqli->query("UPDATE `combination_product` SET `img` = '$filename', `title` = '$title', `models` = '$models' WHERE id = '$id'") or die($mysqli->error);
        $msg = '';
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
        } else{
            $msg = "Failed to upload image";
        }
    } else {
        $mysqli->query("UPDATE `combination_product` SET `title` = '$title', `models` = '$models' WHERE id = '$id'") or die($mysqli->error);
    }

    header('location:'.$_SERVER['HTTP_REFERER']);

}


// --


if (isset($_POST['update_category'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $text = $_POST['text'];
    $req_start = $_POST['req_start'];
    $req_docs = $_POST['req_docs'];
    $training = $_POST['training'];
    $exam = $_POST['exam'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];

    $filename = $_FILES["category-img"]["name"];
    $tempname = $_FILES["category-img"]["tmp_name"];    
    $folder = "../../images/category/".$filename;

    if ($filename) {
        // Get all the submitted data from the form
        $mysqli->query("UPDATE `category` SET `img` = '$filename', `name` = '$name', `text` = '$text', `req_start` = '$req_start', `req_docs` = '$req_docs', `training` = '$training', `exam` = '$exam', `duration` = '$duration', `price` = '$price' WHERE `id` = $id ") or die($mysqli->error);
        $msg = '';
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
        } else{
            $msg = "Failed to upload image";
        }
    } else {
        $mysqli->query("UPDATE `category` SET `name` = '$name', `text` = '$text', `req_start` = '$req_start', `req_docs` = '$req_docs', `training` = '$training', `exam` = '$exam', `duration` = '$duration', `price` = '$price' WHERE `id` = $id ") or die($mysqli->error);
    }
    header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['delete_category'])) {
    $id = $_POST['id'];
    $mysqli->query("DELETE FROM `category` WHERE id = '$id' ") or die($mysqli->error);
    header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['edit_home'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $text = $_POST['text'];
    $mysqli->query("UPDATE `intro` SET `title` = '$title', `subtitle` = '$text' WHERE id = $id") or die($mysqli->error);
    header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['add_gallery']) && isset($_FILES['images'])) {
    
    if ($_FILES['images']) {
        
        foreach($_FILES['images']['tmp_name'] as $key => $value) {

            $filename = $_FILES["images"]["name"][$key];
            $filename_tmp = $_FILES["images"]["tmp_name"][$key];    
            $folder = "../../images/gallery/".$filename;
            move_uploaded_file($filename_tmp, $folder);

            $mysqli->query("INSERT INTO `gallery` (img) VALUES ('$filename')") or die($mysqli->error);

        }

    }
    header('location:'.$_SERVER['HTTP_REFERER']);

}


if (isset($_POST['delete_slider'])) {
    $id = $_POST['id'];
    $mysqli->query("DELETE FROM `slider` WHERE id = '$id' ") or die($mysqli->error);
    header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['edit_contact'])) {
    $id = $_POST['id'];
    $phone_1 = $_POST['phone_1'];
    $phone_2 = $_POST['phone_2'];
    $address = $_POST['address'];
    $mysqli->query("UPDATE `contact` SET `phone_1` = '$phone_1', `phone_2` = '$phone_2', `address` = '$address' WHERE `id` = $id ") or die($mysqli->error);
    header('location:'.$_SERVER['HTTP_REFERER']);
}
