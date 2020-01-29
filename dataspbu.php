<!doctype html>
<html lang="en">
  <head>
    <script  src="https://kit.fontawesome.com/82983a7696.js" crossorigin="anonymous"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="style.css">

<style type ="text/css";>
table{
  margin-top: 60px;
}
.cari{
  margin-top: 60px;
}
.cari .btn{
  border-radius: 8px;
}
.cari .text{
  border-radius: 8px;
}
</style>


    <title>WEB GIS</title>
  </head>
  <body class="bg-dark" id="page-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
      <div class="container">
  <a class="navbar-brand font-weight-bold text-white">JORDAN MAP GIS</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link js-scroll-trigger text-white" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link js-scroll-trigger text-white" href="map.php">Map</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle js-scroll-trigger text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Data
        </a>
        <div class="dropdown-menu text-white" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="dataspbu.php">SPBU</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="datahotel.php">Hotel</a>
          <a class="dropdown-item" href="datarestoran.php">Restoran</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <li class="nav-item">
        <div class="row">
          <div class="col">
            <button type="button" class="btn btn-transparent text-white" data-toggle="modal" data-target="#contact">Contact</a></button>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <div class="row">
          <div class="col">
            <button type="button" class="btn btn-transparent text-white" data-toggle="modal" data-target="#Modal">AboutUs</button>
          </div>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</div>
</nav>

<form class="cari" method="post" name="frmcari" id="frmcari" action="dataspbu.php">
<select name="cari">
      <option  value="">Cari Berdasarkan</option>
      <option value="id">ID SPBU</option>
      <option value="nama">NAMA SPBU</option>
      <option value="alamat">ALAMAT</option>
</select>
<input class="text" type="text" name="yangdicari" value="">
<input class="btn btn-info" type="submit" name="submit" value="Search">

<div class="jumbotron">
    <div class="container">

<?php
// koneksi ke database
include "koneksi.php";


// Memanggil perintah yang mau dijalankan
$perintah1 = "SELECT * from dataspbu";

if($_POST){
      // Memanggil pernitah yang maudijalankan
      if($_POST['cari']!="" && $_POST['yangdicari'] !=""){
            $cari = $_POST['cari'];
            $yangdicari = $_POST['yangdicari'];
            $perintah1 = "select * from dataspbu where $cari like '%$yangdicari%'";
      }
}

// Eksekusi perintah tersebut
$eksekusi1 = mysqli_query($conn, $perintah1);
?>


<table class="table table-dark" border='1' width='1280'>
<tr>
<th>ID</th>
<th>NAMA SPBU</th>
<th>ALAMAT SPBU</th>
<th>WAKTU BUKA</th>
<th>HP</th>
<th>LOKASI</th>
</tr>

<?php
$no   = 1;
while($output1 = mysqli_fetch_array($eksekusi1)){
$id = $output1['id'];
$nama  = $output1['nama'];
$alamat = $output1['alamat'];
$waktu_buka = $output1['waktu_buka'];
$hp = $output1['hp'];

echo "<tr>
      <td>$id</td>
      <td>$nama</td>
      <td>$alamat</td>
      <td>$waktu_buka</td>
      <td>$hp</td>
      <td><a href='detail.php?id=$id'>Detail</a><td>
      <tr>
      ";
?>

<?php
$no = $no +1;
}
echo "</table>";
?>
</form>
</div>
</div>

<div class="modal" id="contact">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title font-weight-bold">CONTACT US</h2>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <div class="modal-body">
      <ul>
        <li><i class="fab fa-youtube text-danger">MICKEY GT</i></li>
        <li><i class="fab fa-facebook text-primary">Billthom Jordan</i></li>
        <li><i class="fab fa-instagram text-warning">billthomjordan</i></li>
        <li><i class="fab fa-whatsapp text-success">0895613137056</i></li>
      </ul>
      <h4 class="font-weight-bold text-center">THANK YOU</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

<div class="modal" id="Modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">WELCOME TO JORDAN MAP</h2>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <div class="modal-body">
        <p>Terimakasih Sudah mengunjungi Website Kami</p>
        <p><h6 class="white">Copyright &copy; Billthom Jordan (BillthomJordan) 2020</h6><p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
