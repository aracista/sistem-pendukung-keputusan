<?php
class Alternatif{
	
	private $conn;
	private $table_name = "alternatif";
	
	public $id;
	public $nik;
	public $na;
	public $rt;
	public $rw;
	public $kl;
	public $jm;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	function insert(){
		
		$query = "insert into ".$this->table_name." values('',?,?,?,?,?,'')";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nik);
		$stmt->bindParam(2, $this->na);
		$stmt->bindParam(3, $this->rt);
		$stmt->bindParam(4, $this->rw);
		$stmt->bindParam(5, $this->kl);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	function readAll(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY id_alternatif ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}

	function readHasil(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY hasil_alternatif DESC LIMIT 1,1000";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	// used when filling up the update product form
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE id_alternatif=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->id = $row['id_alternatif'];
		$this->nik = $row['nik'];
		$this->na = $row['nama'];
		$this->rt = $row['rt'];
		$this->rw = $row['rw'];
		$this->kl = $row['kelurahan'];
	}
	
	// update the product
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					nik = :nik,
					nama = :na,
					rt = :rt,
					rw = :rw,
					kelurahan = :kl
				WHERE
					id_alternatif = :id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nik', $this->nik);
		$stmt->bindParam(':na', $this->na);
		$stmt->bindParam(':rt', $this->rt);
		$stmt->bindParam(':rw', $this->rw);
		$stmt->bindParam(':kl', $this->kl);
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
	
		$query = "DELETE FROM " . $this->table_name . " WHERE id_alternatif = ?";
		
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