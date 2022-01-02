<?php
				  try{
					  $db = new PDO('mysql:host=localhost;dbname=to-do', 'root', '');
					  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					}catch (PDOException $e) {
					  print "Error!: " . $e->getMessage();
					  die();
					}
?>