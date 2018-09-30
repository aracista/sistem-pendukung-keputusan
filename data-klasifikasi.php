<?php
include_once 'header.php';
include_once 'includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll();
include_once 'includes/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt2 = $pro2->readAll();
include_once 'includes/rangking.inc.php';
$pro = new Rangking($db);
$stmt = $pro->readKhusus2();
?>

<div class="row">
				<div class="col-md-6 text-left">
					<h4>Data klasifikasi warga</h4>
				</div>
				<div class="col-md-6 text-right">
					<button onclick="location.href='data-klasifikasi-baru.php'" class="btn btn-primary">Tambah Data</button>
				</div>
			</div>
			<br/>
			<table width="100%" class="table table-striped table-bordered" id="tabeldata">
		        <thead>
		            <tr>
		                <th width="30px">No</th>
		                <th>Nama</th>
		                <th>Kriteria</th>
		                <th>Nilai</th>
		                <th>Keterangan</th>
		                <th width="120px">Aksi</th>
		            </tr>
		        </thead>
		
		        <tfoot>
		            <tr>
		                <th>No</th>
		                <th>Nama</th>
		                <th>Kriteria</th>
		                <th>Nilai</th>
		                <th>Keterangan</th>
		                <th>Aksi</th>
		            </tr>
		        </tfoot>
		
		        <tbody>
		<?php
		$no=1;
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		?>
		            <tr>
		                <td><?php echo $no++ ?></td>
		                <td><?php echo $row['nama'] ?></td>
		                <td><?php echo $row['nama_kriteria'] ?></td>
		                <td><?php echo $row['nilai_rangking'] ?></td>
		                <td><?php echo $row['ket_nilai'] ?></td>
		                <td class="text-center">
							<a href="data-klasifikasi-ubah.php?ia=<?php echo $row['id_alternatif'] ?>&ik=<?php echo $row['id_kriteria'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							<a href="data-klasifikasi-hapus.php?ia=<?php echo $row['id_alternatif'] ?>&ik=<?php echo $row['id_kriteria'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
					    </td>
		            </tr>
		<?php
		}
		?>
		        </tbody>
		
		    </table>
		    		
	    
	    <?php
include_once 'footer.php';
?>