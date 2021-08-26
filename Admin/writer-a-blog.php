<?php
require "includes/dbh.php"

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
</head>

<body>
    <div id="wrapper">
        <?php
        include "header.php";
        ?>
        <!-- side navbar -->
        <?php
        include "sidebar.php";
        ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Forms Page <small>Best form elements.</small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Basic Form Elements
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" method="POST" action="includes/add-blog.php" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input class="form-control" name="blog-title">
                                            </div>
                                            <div class="form-group">
                                                <label>Meta Title</label>
                                                <input class="form-control" placeholder="Enter text" name="blog-meta-title">
                                            </div>
                                            <div class="form-group">
                                                <label>Blog Category</label>
                                                <select class="form-control" name="blog-category">
                                                    <option>1</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Main Image</label>
                                                <input type="file" name="blog-main-image">
                                            </div>
                                            <div class="form-group">
                                                <label>Alternate Image</label>
                                                <input type="file" name="alt-blog-image">
                                            </div>
                                            <div class="form-group">
                                                <label>Summary </label>
                                                <textarea class="form-control" rows="3" name="blog-summary"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Blog Content </label>
                                                <textarea class="form-control" rows="3" name="blog-content"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Blog Tags (separated by comma) </label>
                                                <textarea class="form-control" rows="3" name="blog-tags"></textarea>
                                            </div>
                                            <div class=" input-group">
                                                <label>Blog Path </label>
                                                <span class="input-group-addon">www.oyunge.com/</span>
                                                <input type="text" class="form-control" placeholder="" name="blog-path">
                                            </div>

                                            <div class="form-group">
                                                <label>Home Page Placement</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="blog-home-page-placement" id="optionsRadiosInline1" value="option1" checked="">1
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="blog-home-page-placement" id="optionsRadiosInline2" value="option2">2
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="blog-home-page-placement" id="optionsRadiosInline3" value="option3">3
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
                <?php
                include "footer.php";
                ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>