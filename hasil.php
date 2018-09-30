<?php
include_once 'header.php';
include_once 'includes/alternatif.inc.php';
$pro = new Alternatif($db);
$stmt = $pro->readHasil();
?>
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Hasil Akhir</h4>
		</div>
		<div class="col-md-6 text-right">
			
		</div>
	</div>
	<br/>

	<table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                
                <th>NIK</th>
                <th>Nama</th>
                <th>RT</th>
                <th>RW</th>
                <th>Kelurahan</th>
                <th>Hasil</th>
                <th width="100px">Rekomendasi</th>
                <th>status</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                
                <th>NIK</th>
                <th>Nama</th>
                <th>RT</th>
                <th>RW</th>
                <th>Kelurahan</th>
                <th>Hasil</th>
                <th>Rekomendasi</th>
                <th>Status</th>
            </tr>
        </tfoot>

        <tbody>
<?php
$no=1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
            <tr>
                
                <td><?php echo $row['nik'] ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td align="center"><?php echo $row['rt'] ?></td>
                <td align="center"><?php echo $row['rw'] ?></td>
                <td><?php echo $row['kelurahan'] ?></td>
                <td align="center"><?php echo round($row['hasil_alternatif'],3) ?></td>
                <?php 
                $status = $row['hasil_alternatif'];
                if ($status < 0.5000){
                        $status = 'mampu';
                    } else if ($status < 0.7500) {
                        $status = 'kurang mampu';
                    } else {
                        $status = 'tidak mampu';
                    } ?>
                <td align="center"><?php echo $no++ ?></td>
                <td align="center"><?php echo $status ?></td>
                
            </tr>
<?php
}
?>
        </tbody>

    </table>		
<?php
include_once 'footer.php';
?>