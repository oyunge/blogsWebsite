<?php

require "dbh.php";

if (isset($_POST['edit-category-btn'])) {

    $id = $_POST['category-id'];
    $name = $_POST['edit-category-name'];
    $metaTitle = $_POST['edit-category-meta-title'];
    $categoryPath = $_POST['edit-category-path'];

    $sqlEditCategory = "UPDATE blog_category SET v_category_title = '$name', v_category_meta_table = '$metaTitle', v_category_path = '$categoryPath' WHERE n_category_id = '$id'";

    if (mysqli_query($con, $sqlEditCategory)) {
        mysqli_close($con);
        header("Location: ../blog-category.php?editcategory=success");
        exit();
    }
    else {
        mysqli_close($con);
        header("Location: ../blog-category.php?editcategory=error");
        exit();
    }

}
else {
    header("Location: ../index.php");
    exit();
}