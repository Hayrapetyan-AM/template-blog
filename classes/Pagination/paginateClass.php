<?php
/**
		 * 
		 */
		class Pagination
		{
			private $db;
			private $limit;
			private $offset;
			private $total;
			private $pageno;
			private $pages;
			private $table;
			function __construct($dbConn, $alimit, $atable)
			{
				$this->db = $dbConn;
				$this->limit = $alimit;
				$this->table = $atable;
				self::config();
				self::Paginate();
				self::addButtons();
			}



public function Paginate() 
		{ 
				try {
						$query = $this->db->query("SELECT * FROM ".$this->table." LIMIT ".$this->limit." OFFSET ".$this->offset." ");
					} catch (Exception $e) {
					echo "Error ". $e->getMessage();
				}

			
				while ($row = $query->fetch(PDO::FETCH_OBJ)) 
					{
						?>	
							
   							<div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2021</div>
                                    <h2 class="card-title h4">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                    <a class="btn btn-success" href="#!">Read more →</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2021</div>
                                    <h2 class="card-title h4">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                    <a class="btn btn-success" href="#!">Read more →</a>
                                </div>
                            </div>
                        </div>
						<?
					}
			
		}




//---------------------------------------------------------------------------------------------------------------------------------------------------------------//



			private function addButtons()
			{
			
				?>

		<div class="">
			<nav  aria-label="Пример навигации по страницам">
				  <ul class="pagination justify-content-center ">  

<? if ($this->pageno > 1) { ?> <li class="page-item"><a class="page-link text-dark" href="index.php?pageno=1">First</a></li> <? } ?>  <!-- First page. This page is showing only if pageno is higher than 1 -->

<? while($this->pageno < $this->pages){ ?>
<li class="page-item"><a class="page-link text-dark" href="index.php?pageno=<?=$this->pageno;?>"><?=$this->pageno; if($this->pageno < $this->pages)$this->pageno++; ?></a></li> <? } ?>   <!-- Other pages by nubmers. In while cicle show pagination pages, if pageno is lower than pages(for values look config() function). After showing current page number between a tag, pageno variable increments, and the href attribute goes to incremented pageno --> 
					   
<? if($this->limit < $this->total){?> <li class="page-item"><a class="page-link text-dark" href="index.php?pageno=<?=ceil($this->total / $this->limit);?>">Last</a></li> <?}?> <!-- Last page. this item is showing only if the limit of items per page is lower than total number of items, cs there is no need to show last page, if you are already in the last page. -->

				  </ul>
			</nav>
		</div>
				<? 
			}


//---------------------------------------------------------------------------------------------------------------------------------------------------------------//		


		private function config()
		{
					try {
				$total_query = $this->db->query("SELECT COUNT(*) FROM ".$this->table."");
				$total_query = $total_query->fetch(PDO::FETCH_ASSOC);
			} catch (Exception $e) {
				echo "Error ". $e->getMessage();
			}	
				if (!isset($_GET['pageno']) || $_GET['pageno'] == 0) {$_GET['pageno'] = 1;}
				$this->total  = $total_query['COUNT(*)'];
				$this->pageno = $_GET['pageno'];
				$this->offset = ($this->pageno -1) * $this->limit;
				$this->pages  = ceil($this->total / $this->limit);
		}

//---------------------------------------------------------------------------------------------------------------------------------------------------------------//		

	}
 ?>