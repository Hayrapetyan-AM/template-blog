<?php 
/**
 * 
 */
class Post
{
	private $data;
	private $status = "futured";
	public $post_data;
	private $db;
	function __construct($data)
	{
		$this->data = $data;
		self::config();
	}

	public function create()
	{
		
		try {
			$query = $this->db->prepare('INSERT INTO posts(`title`, `text`, `description`, `category`, `tumbnail`) VALUES (:title, :ttext, :description, :category, :tumbnail)');
			$query->execute(array(':title'=> $this->data['title'], ':ttext' => $this->data['text'], ':description' => $this->data['description'], ':category' => $this->data['category'], ':tumbnail' => $this->data['tumbnail']));
		} catch (PDOException $e) {
			echo "Error" . $e->getMessage();
		}
		header("Location: " . $_SERVER['PHP_SELF']);
	}

	public function select()
	{
		
		try {
						$query = $this->db->query("SELECT * FROM posts WHERE id = ".$this->data." ");
						while ($row  = $query->fetch(PDO::FETCH_OBJ)) 
						{
							$this->post_data = $row;
						}
					} catch (Exception $e) {
					echo "Error ". $e->getMessage();
				}
	}



	public function futured_post()
	{
		
		try {
						$query = $this->db->prepare("SELECT * FROM posts WHERE status = 'futured' AND category = ?");
						$query->execute([$this->data]);
						while ($row  = $query->fetch(PDO::FETCH_OBJ)) 
						{
							$this->post_data = $row;
							?>
    				<div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="<?=$row->tumbnail ?>" alt="..." width="850" height="350"></a>
                        <div class="card-body">
                            <div class="small text-muted"><?=$row->create_date ?></div>
                            <h2 class="card-title"><?=$row->title ?></h2>
                            <p class="card-text"><?=$row->description ?></p>
                            <a class="btn btn-dark" href="post.php?id=<?=$row->id ?>&category=<?=$row->category ?>">Read more →</a>
                        </div>
     				</div>
							<?
						}
					} catch (Exception $e) {
					echo "Error ". $e->getMessage();
				}
	}


	public function category_list()
	{
		
		try {
						$category_list_query = $this->db->prepare("SELECT title, id FROM posts WHERE category = ?  LIMIT 20");
						$category_list_query->execute([$this->data]);
						while ($row  = $category_list_query->fetch(PDO::FETCH_OBJ)) 
						{
							?><li> <a href="post.php?id=<?=$row->id ?>&category=<?=$this->data ?>" class="text-dark"><?=$row->title; ?></a> </li><?
						}
					} catch (Exception $e) {
					echo "Error ". $e->getMessage();
				}

	}

	private function config(){
		require $_SERVER['DOCUMENT_ROOT'] . ("/classes/dbConn.php");
		$this->db = $db;
	}
}
?>