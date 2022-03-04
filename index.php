<?php
require('model/db_connect.php');
require('model/category_db.php');
require('model/item_db.php');

$itemnum = filter_input(INPUT_POST, 'ItemNum', FILTER_VALIDATE_INT);
$title = filter_input(INPUT_POST, 'Title', FILTER_UNSAFE_RAW);
$description = filter_input(INPUT_POST, 'Description', FILTER_UNSAFE_RAW);
$category_name = filter_input(INPUT_POST, 'category_name', FILTER_VALIDATE_INT);

$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
if(!$category_id) {
	$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
}

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if(!$action) {
	$action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
	if(!$action) {
		$action = 'list_todoitems';
	}
}

switch($action) {
	case "list_categories":
		$categories = get_categories();
		include('view/category_list.php');
		break;
	case "add_category":
		add_category($category_name);
		header("Location: .?action=list_categories");
		break;
	case "add_item":
		if($category_id && $description) {
			add_item($category_id, $description);
			header("Location: .?category_id=$category_id");
		} else {
			$error = "Invalid item data. Check all fields and try again.";
			include('view/error.php');
			exit();
		}
		break;
	case "delete_category":
		if($category_id) {
			try {
				delete_category($category_id);
			} catch (PDOException $e) {
				$error = "You cannont delete a category if items exits for it.";
				include('view/error.php');
				exit();
			}
			header("Location: .?action=list_categories");
		}
		break;
	case "delete_item":
		if($itemnum) {
			delete_item($itemnum);
			header("Location: .?category_id=$category_id");
		} else {
			$error = "Missing or incorrect ItemNum.";
			include('view/error.php');
		}
		break;
	default:
		$category_name = get_category_name($category_id);
		$categories = get_categories();
		$items = get_items_by_category($category_id);
		include('view/item_list.php');
}