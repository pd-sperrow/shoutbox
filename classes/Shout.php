<?php
include_once '.\lib\database.php';


class Shout
{
	private $db;
	public function __construct(){
		$this->db = new Database();
	}
	public function getAllData(){
		$query = "SELECT * FROM tbl_box ORDER BY id DESC";
		$select = $this ->db->select($query);
		return $select;
	}

	public function insertData($data){
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
		$body = mysqli_real_escape_string($this->db->link, $data['body']);
		date_default_timezone_get('Asia/Dhaka');
		$time = date('h:i:s', time());

		$query = "INSERT INTO tbl_box(name, body, time) VALUES('$name', '$body', '$time')";
		$this->db->insert($query);
		header("Location:index.php");
	}

}
?>