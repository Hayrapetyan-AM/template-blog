        <!-- Page content-->
<div class="container">
    <div class="row">
                <!-- Blog entries-->
<div class="col-lg-8">
    <div class="row">
<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . ("/classes/Search/search_class.php");
    if (isset($_POST['submit'])) { $search = new Search($_POST['search_data']); }
?>
    </div>
</div>

<!-- Side widgets-->
<div class="col-lg-4">
<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . ("/assets/side widgets/search_widget.php");
    require_once $_SERVER['DOCUMENT_ROOT'] . ("/assets/side widgets/categories_widget.php");
    require_once $_SERVER['DOCUMENT_ROOT'] . ("/assets/side widgets/side_widget.php");
?>
</div>
            
    </div>
</div>