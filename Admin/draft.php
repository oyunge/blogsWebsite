<?php 

require "includes/dbh.php";
session_start();

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Dream</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <!-- Summernote -->
   <link href='summernote/summernote.min.css' rel='stylesheet' type='text/css' />

</head>
<body>
    <div id="wrapper">
        
    <?php include "header.php"; include "sidebar.php"; ?>

        <div id="page-wrapper" >
            <div id="page-inner">
			    <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Write A Blog
                        </h1>
                    </div>
                </div> 
                
                <?php 
                
                if (isset($_REQUEST['addblog'])) {
                    if ($_REQUEST['addblog'] == "emptytitle") {
                        echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Please add a blog title.
                        </div>";
                    }
                    else if ($_REQUEST['addblog'] == "emptycategory") {
                        echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Please select a blog category.
                        </div>";
                    }
                    else if ($_REQUEST['addblog'] == "emptysummary") {
                        echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Please enter a blog summary.
                        </div>";
                    }
                    else if ($_REQUEST['addblog'] == "emptycontent") {
                        echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Please add blog content.
                        </div>";
                    }
                    else if ($_REQUEST['addblog'] == "emptytags") {
                        echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Please add some blog tags.
                        </div>";
                    }
                    else if ($_REQUEST['addblog'] == "emptypath") {
                        echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Please add a blog path.
                        </div>";
                    }
                    else if ($_REQUEST['addblog'] == "sqlerror") {
                        echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Please try again.
                        </div>";
                    }
                    else if ($_REQUEST['addblog'] == "pathcontainsspaces") {
                        echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Please do not add any spaces in the blog path.
                        </div>";
                    }
                    else if ($_REQUEST['addblog'] == "emptymainimage") {
                        echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Please upload a main image.
                        </div>";
                    }
                    else if ($_REQUEST['addblog'] == "emptyaltimage") {
                        echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Please upload an alternate image.
                        </div>";
                    }
                    else if ($_REQUEST['addblog'] == "mainimageerror") {
                        echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Please upload another main image.
                        </div>";
                    }
                    else if ($_REQUEST['addblog'] == "altimageerror") {
                        echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Please upload another alternate image.
                        </div>";
                    }
                    else if ($_REQUEST['addblog'] == "invalidtypemainimage") {
                        echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Main Image -> Upload only jpg, jpeg, png, gif, bmp images.
                        </div>";
                    }
                    else if ($_REQUEST['addblog'] == "invalidtypealtimage") {
                        echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Alt Image -> Upload only jpg, jpeg, png, gif, bmp images.
                        </div>";
                    }
                    else if ($_REQUEST['addblog'] == "erroruploadingmainimage") {
                        echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Main Image -> There was an error while uploading. Please try again later.
                        </div>";
                    }
                    else if ($_REQUEST['addblog'] == "erroruploadingaltimage") {
                        echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Alt Image -> There was an error while uploading. Please try again later.
                        </div>";
                    }
                    else if ($_REQUEST['addblog'] == "titlebeingused") {
                        echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> The title is being used in another blog. Try picking a different title.
                        </div>";
                    }
                    else if ($_REQUEST['addblog'] == "pathbeingused") {
                        echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> The blog path is being used in another blog. Try picking a different blog path.
                        </div>";
                    }
                    else if ($_REQUEST['addblog'] == "homepageplacementerror") {
                        echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> An unexpected error occurred while trying to set the home page placement. Please try again.
                        </div>";
                    }
                }
                
                ?>

                <div class="row">
                  <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Write A Blog
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="POST" action="includes/add-blog.php" enctype="multipart/form-data" onsubmit="return validateImage();">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="blog-title" value="<?php if (isset($_SESSION['blogTitle'])) { echo $_SESSION['blogTitle']; } ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <input class="form-control" name="blog-meta-title"  value="<?php if (isset($_SESSION['blogMetaTitle'])) { echo $_SESSION['blogMetaTitle']; } ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Blog Category</label>
                                            <select class="form-control" name="blog-category">
                                                <option value="">Select a category</option>
                                                <?php 
                                                
                                                $sqlCategories = "SELECT * FROM blog_category";
                                                $queryCategories = mysqli_query($conn, $sqlCategories);

                                                while ($rowCategories = mysqli_fetch_assoc($queryCategories)) {

                                                    $cId = $rowCategories['n_category_id'];
                                                    $cName = $rowCategories['v_category_title'];

                                                    if (isset($_SESSION['blogCategoryId'])) {

                                                        if ($_SESSION['blogCategoryId'] == $cId) {
                                                            echo "<option value='".$cId."' selected=''>".$cName."</option>";
                                                        }
                                                        else {
                                                            echo "<option value='".$cId."'>".$cName."</option>";
                                                        }

                                                    }
                                                    else {
                                                        echo "<option value='".$cId."'>".$cName."</option>";
                                                    }

                                                }
                                                
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Main Image</label>
                                            <input type="file" name="main-blog-image" id="main-blog-image">
                                        </div>
                                        <div class="form-group">
                                            <label>Alternate Image</label>
                                            <input type="file" name="alt-blog-image" id="alt-blog-image">
                                        </div>
                                        <div class="form-group">
                                            <label>Blog Summary</label>
                                            <textarea class="form-control" rows="3" name="blog-summary"><?php if (isset($_SESSION['blogSummary'])) { echo $_SESSION['blogSummary']; } ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Blog Content</label>
                                            <textarea class="form-control" rows="3" name="blog-content" id="summernote"><?php if (isset($_SESSION['blogContent'])) { echo $_SESSION['blogContent']; } ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Blog Tags (separated by comma)</label>
                                            <input class="form-control" name="blog-tags"  value="<?php if (isset($_SESSION['blogTags'])) { echo $_SESSION['blogTags']; } ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Blog Path</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">www.parthmodi.com/</span>
                                                <input type="text" class="form-control" name="blog-path"  value="<?php if (isset($_SESSION['blogPath'])) { echo $_SESSION['blogPath']; } ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Home Page Placement</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="blog-home-page-placement" id="optionsRadiosInline1" value="1" <?php if (isset($_SESSION['blogHomePagePlacement'])) { if ($_SESSION['blogHomePagePlacement'] == 1) { echo "checked=''";}} ?>>1
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="blog-home-page-placement" id="optionsRadiosInline2" value="2" <?php if (isset($_SESSION['blogHomePagePlacement'])) { if ($_SESSION['blogHomePagePlacement'] == 2) { echo "checked=''";}} ?>>2
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="blog-home-page-placement" id="optionsRadiosInline3" value="3" <?php if (isset($_SESSION['blogHomePagePlacement'])) { if ($_SESSION['blogHomePagePlacement'] == 3) { echo "checked=''";}} ?>>3
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-default" name="submit-blog">Add Blog</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<?php include "footer.php"; ?>
			</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

    <!-- Summernote -->
    <script src="summernote/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                minHeight: null,
                maxHeight: null,
                focus: false
            });
        });
    </script>

    <script>
        function validateImage() {

            var main_img = $("#main-blog-image").val();
            var alt_img = $("#alt-blog-image").val();

            var exts = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];

            var get_ext_main_img = main_img.split('.');
            var get_ext_alt_img = alt_img.split('.');

            get_ext_main_img = get_ext_main_img.reverse();
            get_ext_alt_img = get_ext_alt_img.reverse();

            main_image_check = false;
            alt_image_check = false;

            if (main_img.length > 0) {
                if ($.inArray(get_ext_main_img[0].toLowerCase(), exts) >= -1) {
                    main_image_check = true;
                }
                else {
                    alert("Error -> Main Image. Upload only jpg, jpeg, png, gif, bmp images.");
                    main_img_check = false;
                }
            }
            else {
                alert("Please upload a main image.");
                main_img_check = false;
            }

            if (alt_img.length > 0) {
                if ($.inArray(get_ext_alt_img[0].toLowerCase(), exts) >= -1) {
                    alt_image_check = true;
                }
                else {
                    alert("Error -> Alternate Image. Upload only jpg, jpeg, png, gif, bmp images.");
                    alt_image_check = false;
                }
            }
            else {
                alert("Please upload a alternate image.");
                alt_image_check = false;
            }

            if (main_image_check == true && alt_image_check == true) {
                return true;
            }
            else {
                return false;
            }

        }
    </script>
   
</body>
</html>






<?php

require "dbh.php";
session_start();

if (isset($_POST['submit-blog'])) {
    $title = $_POST['blog-title'];
    $metaTitle = $_POST['blog-meta-title'];
    $blogCategoryId = $_POST['blog-category'];
    $blogSummary = $_POST['blog-summary'];
    $blogContent = $_POST['blog-content'];
    $blogTags = $_POST['blog-tags'];
    $blogPath = $_POST['blog-path'];
    $homePagePlacement = $_POST['blog-home-page-placement'];

    $date = date("Y-m-d");
    $time = date("H:i:s");

    //checking if the input fields are empty then it will give an error
    //form error is a function which we have created that we be redirecting to write a blog
    if (empty($title)) {
        formError("emptytitle");
    } elseif (empty($blogCategoryId)) {
        formError("emptycategory");
    } elseif (empty($blogSummary)) {
        formError("emptysummary");
    } elseif (empty($blogContent)) {
        formError("emptycontent");
    } elseif (empty($blogTags)) {
        formError("emptytags");
    } elseif (empty($blogPath)) {
        formError("emptypath");
    }
    //checking if the blog paths has spaces, we have declared that we dont want spaces
    if (strpos($blogPath, " ") !== false) {
        formError("pathcontainsspaces");
    }

    if (empty($homePagePlacement)) {
        $homePagePlacement = 0;
    }
    //checking if the title is being used to avoid repetition
    $sqlCheckBlogTitle = "SELECT v_post_title FROM blog_post WHERE v_post_title = '$title' AND f_post_status != '2'";
    $queryCheckBlogTitle = mysqli_query($con, $sqlCheckBlogTitle);

    $sqlCheckBlogPath = "SELECT v_post_path FROM blog_post WHERE v_post_path = '$blogPath' AND f_post_status != '2'";
    $queryCheckBlogPath = mysqli_query($con, $sqlCheckBlogPath);

    if (mysqli_num_rows($queryCheckBlogTitle) > 0) {
        formError("titlebeingused");
    } elseif (mysqli_num_rows($queryCheckBlogPath) > 0) {
        formError("pathbeingused");
    }

    if ($homePagePlacement != 0) {
        $sqlCheckBlogHomePagePlacement = "SELECT * FROM blog_post WHERE n_home_page_placement = '$homePagePlacement' AND f_post_status != '2'";
        $queryCheckBlogHomePagePlacement = mysqli_query($con, $sqlCheckBlogHomePagePlacement);

        if (mysqli_num_rows($queryCheckBlogHomePagePlacement) > 0) {
            $sqlUpdateBlogHomePagePlacement = "UPDATE blog_post SET n_home_page_placement = '0' WHERE n_home_page_placement = '$homePagePlacement' AND f_post_status != '2'";

            if (!mysqli_query($con, $sqlUpdateBlogHomePagePlacement)) {
                formError("homepageplacementerror");
            }
        }
    }

    $mainImgUrl = uploadImage($_FILES["main-blog-image"]["name"], "main-blog-image", "main");
    $altImgUrl = uploadImage($_FILES["alt-blog-image"]["name"], "alt-blog-image", "alt");

    $sqlAddBlog = "INSERT INTO blog_post (n_category_id, v_post_title, v_post_meta_title, v_post_path, v_post_summary, v_post_content, v_main_image_url, v_alt_image_url, n_home_page_placement, f_post_status, d_date_created, d_time_created) VALUES ('$blogCategoryId', '$title', '$metaTitle', '$blogPath', '$blogSummary', '$blogContent', '$mainImgUrl', '$altImgUrl', '$homePagePlacement', '1', '$date', '$time')";

    if (mysqli_query($con, $sqlAddBlog)) {

        $blogPostId = mysqli_insert_id($con);
        $sqlAddTags = "INSERT INTO blog_tags (n_blog_post_id, v_tag) VALUES ('$blogPostId', '$blogTags')";

        if (mysqli_query($con, $sqlAddTags)) {
            mysqli_close($con);

            unset($_SESSION['blogTitle']);
            unset($_SESSION['blogMetaTitle']);
            unset($_SESSION['blogCategoryId']);
            unset($_SESSION['blogSummary']);
            unset($_SESSION['blogContent']);
            unset($_SESSION['blogTags']);
            unset($_SESSION['blogPath']);
            unset($_SESSION['blogHomePagePlacement']);

            header("Location: ../blogs.php");
            exit();
        } else {
            formError("sqlerror");
        }
    }
    else {
        formError("sqlerror");
    }
} else {
    header("Location: ../index.php");
    exit();
}

function formError($errorCode)
{

    require "dbh.php";

    $_SESSION['blogTitle'] = $_POST['blog-title'];
    $_SESSION['blogMetaTitle'] = $_POST['blog-meta-title'];
    $_SESSION['blogCategoryId'] = $_POST['blog-category'];
    $_SESSION['blogSummary'] = $_POST['blog-summary'];
    $_SESSION['blogContent'] = $_POST['blog-content'];
    $_SESSION['blogTags'] = $_POST['blog-tags'];
    $_SESSION['blogPath'] = $_POST['blog-path'];
    $_SESSION['blogHomePagePlacement'] = $_POST['blog-home-page-placement'];

    mysqli_close($con);
    header("Location: ../write-a-blog.php?addblog=" . $errorCode);
    exit();
}

function uploadImage($img, $imgName, $imgType)
{

    $imgUrl = "";

    $validExt = array("jpg", "png", "jpeg", "bmp", "gif");

    if ($img == "") {
        formError("empty" . $imgType . "image");
    } else if ($_FILES[$imgName]["size"] <= 0) {
        formError($imgType . "imageerror");
    } else {

        $ext = strtolower(end(explode(".", $img)));
        if (!in_array($ext, $validExt)) {
            formError("invalidtype" . $imgType . "image");
        }

        $folder = "../images/blog-images/";
        $imgNewName = rand(10000, 990000) . '_' . time() . '.' . $ext;
        $imgPath = $folder . $imgNewName;

        if (move_uploaded_file($_FILES[$imgName]['tmp_name'], $imgPath)) {
            $imgUrl = "http://localhost/blog/admin/images/blog-images/" . $imgNewName;
        } else {
            formError("erroruploading" . $imgType . "image");
        }  
    }

    return $imgUrl;
}
