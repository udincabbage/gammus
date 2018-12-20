<?php
include_once 'header.php';
?>
<h2>Import Santri</h2>
<?php
ini_set('max_execution_time', 3000);
if (!$_POST) { ?>
<html>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
            Choose your file:
            <input name="csv" type="file" id="csv" />
            <br>
            <input type="submit" name="Submit" value="Submit" />
        </form>
    </body>
</html>
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
    print "
    <div class='alert alert-success alert-dismissible' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href='santri.php'>lihat semua data</a>.
    </div>
    ";
    ?>
<html>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
            Choose your file:
            <input name="csv" type="file" id="csv" />
            <br>
            <input type="submit" name="Submit" value="Submit" />
        </form>
    </body>
</html>
<?php
}
else
{
?>
<html>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
            Choose your file:
            <input name="csv" type="file" id="csv" />
            <br>
            <input type="submit" name="Submit" value="Submit" />
        </form>
    </body>
</html>
<?php
}
}
?>
