<?php
	function getSqlString($search,$media,$subject,$author,$min_year,$max_year){
   $select_command = "SELECT id, title, GROUP_CONCAT(DISTINCT author SEPARATOR ', ') AS author , " . 
        "GROUP_CONCAT(DISTINCT subject SEPARATOR ', ') AS subject, publish_date, media ";
   $from_command = "FROM search_resources ";
   $where_command = "WHERE title LIKE '%$search%' ";
   $group_command = "GROUP BY id ";
   
   if ($media != ''){
      $where_command .= "AND media='$media' ";
   }
   if ($subject != ''){
      $where_command .= "AND subject='$subject' ";
   }
   if ($author != ''){
   		$where_command .= "AND author='$author' ";
   }
   if ($min_year != ''){
   		$min_year .='-01-01';
   		$where_command .="AND publish_date > '$min_year' ";
   }
   if ($max_year != ''){
   		$max_year .='01-01';
   		$where_command .="AND publish_date < '$max_year' ";
   }
   
   $sql = $select_command . $from_command . $where_command . $group_command;
   return $sql;
}
?>