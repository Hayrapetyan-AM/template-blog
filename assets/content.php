        <!-- Page content-->
        <!-- Futured post-->
<div class="container">
    <div class="row">
                <!-- Blog entries-->
<div class="col-lg-8">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . ("/assets/futured_post.php") ?>

    <div class="row">

    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . ("/classes/Pagination/paginateClass.php");
        $test = new Pagination(4, "posts"); // passing  limit of items per page (LIMIT) and table name
    ?>
    </div>
</div>

<!-- Side widgets-->
<div class="col-lg-4">
<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] .("/assets/side widgets/search_widget.php");
    require_once $_SERVER['DOCUMENT_ROOT'] .("/assets/side widgets/categories_widget.php");
    require_once $_SERVER['DOCUMENT_ROOT'] .("/assets/side widgets/titles_list_widget.php");
    require_once $_SERVER['DOCUMENT_ROOT'] .("/assets/side widgets/side_widget.php");
?>
</div>
            
    </div>
</div>