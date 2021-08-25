<?php
require "dbh.php";
//checking if the button was pressed
if (isset($_POST["add-category-btn"])) {
    $name = $_POST['category-title'];
    $categoryMetaTitle = $_POST['category-meta-table'];
    $categoryPath = $_POST['category-path'];

    $date = date('Y-m-d');
    $time = date('H:i:s');

    $sqlAddCategory = "INSERT INTO blog_category(v_category_title, v_category_meta_table, v_category_path, d_day_created, d_time_created)
 VALUES('$name', '$categoryMetaTitle', '$categoryPath', '$date', '$time')";

    if (mysqli_query($con, $sqlAddCategory)) {
        mysqli_close($con);
        header("Location:../blog-category.php?addcategory-success");
        exit();
    }
    else{
        mysqli_close($con);
        header("Location:../blog-category.php?addcategory-error");
        exit(); 
    }
}
//redirecting to the index page
else {
    header("Location:../index.php");
    exit();
}
