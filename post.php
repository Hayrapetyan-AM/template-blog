<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?=$_GET['category']; ?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="bg-dark">


<?php require_once $_SERVER['DOCUMENT_ROOT'] . ("/assets/navbar.php"); ?>

<!-- Page content-->
<div class="container mt-5">
    <div class="row">
<?php  require_once $_SERVER['DOCUMENT_ROOT'] . ("/assets/single_post.php"); ?>

<!-- Side widgets-->
<div class="col-lg-4">
<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . ("/assets/side widgets/search_widget.php");
    require_once $_SERVER['DOCUMENT_ROOT'] . ("/assets/side widgets/categories_widget.php");
    require_once $_SERVER['DOCUMENT_ROOT'] . ("/assets/side widgets/titles_list_widget.php");
    require_once $_SERVER['DOCUMENT_ROOT'] . ("/assets/side widgets/side_widget.php");
?>
        </div>               
    </div>
</div>
       <?php require_once $_SERVER['DOCUMENT_ROOT'] . ("assets/footer.php"); ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
