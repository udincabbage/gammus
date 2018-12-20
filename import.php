<?php
ini_set('max_execution_time', 3000);
if (!$_POST) { ?>
<?php include_once 'header.php'; ?>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-8">
    <div class="page-header">
      <h5>Import Santri</h5>
    </div>
        <form action="" method="post" enctype="multipart/form-data">
            Choose your file:
            <input name="csv" type="file" id="csv" />
            <br>
            <!--<input type="submit" name="Submit" value="Submit" />-->
            <button type="submit" class="btn btn-primary" name="Submit">Simpan</button>
            <button type="button" onclick="location.href='santri.php'" class="btn btn-success">Kembali</button>
        </form>
  </div>
    <div class="col-xs-12 col-sm-12 col-md-4">
        <?php include_once 'sidebar.php'; ?>
    </div>
</div>
<?php include_once 'footer.php'; ?>
<?php
} else {
$connect = mysqli_connect("localhost", "root", "", "nkit_sms_santri");
if ($_FILES['csv']['size'] > 0) {
    //get the csv file
    $file = $_FILES['csv']['tmp_name'];
    $handle = fopen($file, "r");
    $i = 0;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if ($i > 0) {
$import = "INSERT into t_santri(
 id,created_at,updated_at,status,nis,nama_santri,tahun_akademik,status_santri)
values(
'$data[0]',
'$data[1]',
'$data[2]',
'$data[3]',
'$data[4]',
'$data[5]',
'$data[6]',
'$data[7]'
)";
            $connect->query($import);
        }
        $i++;
    }
    fclose($handle);

    ?>
    <?php include_once 'header.php'; ?>
    <?php
    print "
    <div class='alert alert-success alert-dismissible' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href='santri.php'>lihat semua data</a>.
    </div> ";
    ?>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-8">
        <div class="page-header">
          <h5>Import Santri</h5>
        </div>
            <form action="" method="post" enctype="multipart/form-data">
                Choose your file:
                <input name="csv" type="file" id="csv" />
                <br>
                <!--<input type="submit" name="Submit" value="Submit" />-->
                <button type="submit" class="btn btn-primary" name="Submit">Simpan</button>
      				  <button type="button" onclick="location.href='santri.php'" class="btn btn-success">Kembali</button>
            </form>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <?php include_once 'sidebar.php'; ?>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>
<?php
}
else
{
?>
<?php include_once 'header.php'; ?>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-8">
    <div class="page-header">
      <h5>Import Santri</h5>
    </div>
        <form action="" method="post" enctype="multipart/form-data">
            Choose your file:
            <input name="csv" type="file" id="csv" />
            <br>
            <!--<input type="submit" name="Submit" value="Submit" />-->
            <button type="submit" class="btn btn-primary" name="Submit">Simpan</button>
            <button type="button" onclick="location.href='santri.php'" class="btn btn-success">Kembali</button>
        </form>
  </div>
    <div class="col-xs-12 col-sm-12 col-md-4">
        <?php include_once 'sidebar.php'; ?>
    </div>
</div>
<?php include_once 'footer.php'; ?>
<?php
}
}
?>
