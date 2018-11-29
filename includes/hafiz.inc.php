<?php
class Hafiz{

	private $conn;
	private $table_name = "t_hafiz";

	public $id;
	public $id_s;
	public $th;
	public $bln;
	public $cap;
	public $nam;

	public function __construct($db){
		$this->conn = $db;
	}

	function insert(){

		$query = "insert into ".$this->table_name." (status,id_santri,tahun,bulan,pencapaian_hafalan,penambahan_hafalan)values('1',?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_s); ;
		$stmt->bindParam(2, $this->th); ;
		$stmt->bindParam(3, $this->bln); ;
		$stmt->bindParam(4, $this->cap); ;
		$stmt->bindParam(5, $this->nam); ; 

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}

	}

	function readAll(){

		$query = "SELECT ".$this->table_name.".*,nama_santri FROM ".$this->table_name."  
		LEFT JOIN t_santri ON t_santri.id=".$this->table_name.".id_santri 
		ORDER BY updated_at ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
	// //test
	// function readSpe(){

		// $query = "SELECT SUM(harga) AS total FROM ".$this->table_name." ";
		// $stmt = $this->conn->prepare( $query );
		// $stmt->execute();

		// return $stmt;
	// }

	// used when filling up the update product form
	function readOne(){

		$query = "SELECT * FROM " . $this->table_name . " WHERE id=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->id = $row['id'];
		$this->id_s = $row['id_santri'];
		$this->th = $row['tahun'];
		$this->bln = $row['bulan'];
		$this->cap = $row['pencapaian_hafalan'];
		$this->nam = $row['penambahan_hafalan'];
	}

	// update the product
	function update(){

		$query = "UPDATE
					" . $this->table_name . "
				SET
					id_santri = :id_s
					tahun = :th
					bulan = :bln
					pencapaian_hafalan = :cap
					penambahan_hafalan = :nam
				WHERE
					id = :id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':id_s', $this->id_s);
		$stmt->bindParam(':th', $this->th);
		$stmt->bindParam(':bln', $this->bln);
		$stmt->bindParam(':cap', $this->cap);
		$stmt->bindParam(':nam', $this->nam);
		$stmt->bindParam(':id', $this->id);

		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	// delete the product
	function delete(){

		$query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>
