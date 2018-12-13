<h2>Upload absensi</h2>
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
$connect = mysqli_connect("localhost", "root", "", "absensi");
if ($_FILES['csv']['size'] > 0) {
    //get the csv file
    $file = $_FILES['csv']['tmp_name'];
    $handle = fopen($file, "r");
    $i = 0;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if ($i > 0) {
$import = "INSERT into absensi(
 nip,id_absensi,hari,tanggal,jam_masuk,jam_keluar,terlambat,tanpa_keterangan,lama_kerja)
values(
'$data[0]',
'$data[1]',
'$data[2]',
'$data[3]',
'$data[4]',
'$data[5]',
'$data[6]',
'$data[7]',
'$data[8]'
)";
            $connect->query($import);
        }
        $i++;
    }
    fclose($handle);
    print "Import done";
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
