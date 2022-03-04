<?php 
function get_items_by_category($category_id) {
	global $db;
	if($category_id) {
		$query = 'SELECT A.ItemNum, A.Title, A.Description, C.categoryName FROM todoitems A LEFT JOIN categories C ON A.categoryID = C.categoryID WHERE A.categoryID = :category_id ORDER BY ItemNum';
	} else {
		$query = 'SELECT A.ItemNum, A.Title, A.Description, C.categoryName FROM todoitems A LEFT JOIN categories C ON A.categoryID = C.categoryID ORDER BY C.categoryID';
	}
	$statement = $db->prepare($query);
	if($category_id) {
		$statement->bindValue(':category_id', $category_id);
	}
	$statement->execute();
	$items = $statement->fetchAll();
	$statement->closeCursor();
	return $items;
}

function delete_item($itemnum) {
	global $db;
	$query = 'DELETE FROM `todoitems` WHERE ItemNum = :itemnum';
	$statement = $db->prepare($query);
	$statement->bindValue(':itemnum', $itemnum);
	$statement->execute();
	$statement->closeCursor();
}

function add_item($category_id, $description) {
	global $db;
	$query = 'INSERT INTO todoitems(categoryID, Description) 
			  VALUES (:categoryID, :description)';
	$statement = $db->prepare($query);
	$statement->bindValue(':description', $description);
	$statement->bindValue(':categoryID', $category_id);
	$statement->closeCursor();
}