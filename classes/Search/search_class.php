<?php
 /**
 * 
 */
class Search
{	
	private $db;
	private $data;
	private $checkpoint = false;
	function __construct($argument)
	{
		self::validate($argument);
		self::config();
		self::search();
	}

	private function search()
	{
		try {
			$query = $this->db->prepare("SELECT `id`, `title`, `description`, `category` FROM `posts` WHERE `title` OR `text` OR `description` LIKE ?");
			$query->execute(array("%$this->data%"));
		} catch (Exception $e) {
			echo "Error" . $e->getMessage();
		}
				while ($row = $query->fetch(PDO::FETCH_OBJ)) 
			{	
				$this->checkpoint = true;
				var_dump($row);
				?>
					<div class="alert alert-info">
						<p><a href="post.php?id=<?=$row->id; ?>&category=<?=$row->category; ?>" class="text-dark"><?=$row->title;  ?></a></p>
						<small class="text-muted"><em><?=$row->description; ?></em></small>
					</div>
				<?
			}
			if ($this->checkpoint == false)
			{
				?>
					<div class="alert alert-danger">No results :(</div>
				<?
			}
		//header("Location:" . $_SERVER['PHP_SELF']);
	}

	private function config(){
		require $_SERVER['DOCUMENT_ROOT'] . ("/classes/dbConn.php");
		$this->db = $db;
	}

	private function validate($argument)
	{	
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$argument = trim(stripslashes(htmlspecialchars($argument)));
		    $this->data = $argument;
		}

		
	}
	//----------------------------------------------------------------------------------------------------//
} ?>