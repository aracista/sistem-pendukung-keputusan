<?php
include('dbconfig.php');
if($_POST['id'])
{
 $id=$_POST['id'];
  
 $stmt = $DB_con->prepare("SELECT * FROM nilai WHERE id_kriteria=:id");
 $stmt->execute(array(':id' => $id));
 ?><?php
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
  ?>
        <option value="<?php echo $row['jum_nilai']; ?>"><?php echo $row['ket_nilai']; ?></option>
        <?php
 }
}
?>