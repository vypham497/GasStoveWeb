<?php 

function insert_blog($data){

	return db_insert("tbl_blog", $data);
}

function getAll() {

	return db_fetch_array("SELECT * FROM `tbl_blog`");
}
function delete_blog_by_id($id){

	return db_delete("tbl_blog", "`id` = '$id'");
}

function get_blog_by_id($id){

	return db_fetch_array("SELECT * FROM `tbl_blog` WHERE `id` = '$id'");
}
function update_blog_by_id($id,$data){

	return db_update("tbl_blog", $data, "`id`='$id'");
}
 ?>