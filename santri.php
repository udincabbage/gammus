<?php
include_once 'header.php';
include_once 'includes/santri.inc.php';
$pro = new Santri($db);
$stmt = $pro->readAll();
?>
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Data Santriwan Santriwati</h4>
		</div>
		<div class="col-md-6 text-right">
			<button onclick="location.href='santri-baru.php'" class="btn btn-primary">Tambah Data</button>
			<button onclick="location.href='import.php'" class="btn btn-warning">Import Data</button>
			<button onclick="location.href='./tmp/santri.csv'" class="btn btn-success">Download Template CSV</button>
		</div>
	</div>
	<br/>

	<table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th width="30px">No</th>
                <th>NIS </th>
                <th>Nama Santri </th>
                <th>Tahun Akademik </th>
                <th>Status </th>
                <th width="100px">Aksi</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>No</th>
                <th>NIS </th>
                <th>Nama Santri </th>
                <th>Tahun Akademik </th>
                <th>Status </th>
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
                <td><?php echo $row['nis'] ?></td>
                <td><?php echo $row['nama_santri'] ?></td>
                <td><?php echo $row['tahun_akademik'] ?></td>
                <td><?php echo $row['status_santri'] ?></td>
                <td class="text-center">
					<a href="santri-ubah.php?id=<?php echo $row['id'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a href="santri-hapus.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
