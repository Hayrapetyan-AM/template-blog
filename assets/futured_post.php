 <?php 
        require_once $_SERVER["DOCUMENT_ROOT"] . ("/classes/Post/Post.php");
        $data = new Post($_GET['category']);
        $data->futured_post();
  ?>

<!-- Featured blog post-->
                

