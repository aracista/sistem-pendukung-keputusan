<?php
class Rangking{
	
	private $conn;
	private $table_name = "rangking";
	
	public $ia;
	public $ik;
	public $nr;
	public $kn;
	public $nn;
	public $bn;
	public $mnr1;
	public $mnr2;
	public $has;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	function insert(){
		
		$query = "insert into ".$this->table_name." values('',?,?,?,'','')";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->ia);
		$stmt->bindParam(2, $this->ik);
		$stmt->bindParam(3, $this->nr);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	function readAll(){

		$query = "SELECT * FROM ".$this->table_name;
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	function readKhusus(){

		$query = "SELECT * FROM alternatif a, kriteria b, rangking c where a.id_alternatif=c.id_alternatif and b.id_kriteria=c.id_kriteria order by a.id_alternatif asc";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	function readKhusus2(){

		$query = "SELECT * FROM alternatif a, kriteria b, rangking c, nilai d where a.id_alternatif=c.id_alternatif and b.id_kriteria=c.id_kriteria and c.id_kriteria=d.id_kriteria and c.nilai_rangking=d.jum_nilai order by a.id_alternatif asc";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	function readKhusus1(){

		$query = "SELECT * FROM alternatif a, kriteria b, rangking c, nilai d where a.id_alternatif=c.id_alternatif and b.id_kriteria=c.id_kriteria and c.id_kriteria=d.id_kriteria and c.nilai_rangking=d.jum_nilai and c.id_alternatif=? and c.id_kriteria=? "; 
		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->ia);
		$stmt->bindParam(2, $this->ik);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->ia = $row['id_alternatif'];
		$this->ik = $row['id_kriteria'];
		$this->nr = $row['nilai_rangking'];
		$this->kn = $row['ket_nilai'];

	}
	
	function readR($a){

		$query = "SELECT * FROM alternatif a, kriteria b, rangking c where a.id_alternatif=c.id_alternatif and b.id_kriteria=c.id_kriteria and c.id_alternatif='$a'";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	function readMax($b){
		
		$query = "SELECT max(nilai_rangking) as mnr1 FROM " . $this->table_name . " WHERE id_kriteria='$b'";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
	
	function readMin($b){
		
		$query = "SELECT min(nilai_rangking) as mnr2 FROM " . $this->table_name . " WHERE id_kriteria='$b'";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
	
	
	function readHasil($a){
		
		$query = "SELECT sum(bobot_normalisasi) as bbn FROM " . $this->table_name . " WHERE id_alternatif='$a' LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
	
	// used when filling up the update product form
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE id_alternatif=? and id_kriteria=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->ia);
		$stmt->bindParam(2, $this->ik);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->ia = $row['id_alternatif'];
		$this->ik = $row['id_kriteria'];
		$this->nr = $row['nilai_rangking'];
	}
	
	// update the product
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					nilai_rangking = :nr
				WHERE
					id_alternatif = :ia 
				AND
					id_kriteria = :ik";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nr', $this->nr);
		$stmt->bindParam(':ia', $this->ia);
		$stmt->bindParam(':ik', $this->ik);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	function normalisasi(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					nilai_normalisasi = :nn,
					bobot_normalisasi = :bn
				WHERE
					id_alternatif = :ia 
				AND
					id_kriteria = :ik";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nn', $this->nn);
		$stmt->bindParam(':bn', $this->bn);
		$stmt->bindParam(':ia', $this->ia);
		$stmt->bindParam(':ik', $this->ik);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	function hasil(){

		$query = "UPDATE 
					alternatif
				SET 
					hasil_alternatif = :has
				WHERE
					id_alternatif = :ia";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':has', $this->has);
		$stmt->bindParam(':ia', $this->ia);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete the product
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE id_alternatif = ? and id_kriteria = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->ia);
		$stmt->bindParam(2, $this->ik);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>