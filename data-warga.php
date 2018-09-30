<?php
include_once 'header.php';
include_once 'includes/alternatif.inc.php';
$pro = new Alternatif($db);
$stmt = $pro->readHasil();
?>
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Data Warga</h4>
		</div>
		<div class="col-md-6 text-right">
			<button onclick="location.href='data-warga-baru.php'" class="btn btn-primary">Tambah Data</button>
		</div>
	</div>
	<br/>

	<table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th width="30px">No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>RT</th>
                <th>RW</th>
                <th>Kelurahan</th>
                <th width="100px">Aksi</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>RT</th>
                <th>RW</th>
                <th>Kelurahan</th>
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
                <td><?php echo $row['nik'] ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['rt'] ?></td>
                <td><?php echo $row['rw'] ?></td>
                <td><?php echo $row['kelurahan'] ?></td>
               
                <td class="text-center">
					<a href="data-warga-ubah.php?id=<?php echo $row['id_alternatif'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a href="data-warga-hapus.php?id=<?php echo $row['id_alternatif'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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