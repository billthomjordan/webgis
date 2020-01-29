<?php
// koneksi ke database
include "koneksi.php";

$id = $_GET['id'];
// Memanggil perintah yang mau dijalankan
$perintah1 = "select * from dataspbu where id='$id'";

// Eksekusi perintah tersebut
$eksekusi1 = mysqli_query($conn, $perintah1);
$hasil1    = mysqli_fetch_array($eksekusi1);

?>
<!DOCTYPE html>
<html lang="en">
<head><title>DETAIL SPBU</title>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="style.css">

    <script>
    var pinInfobox;
    function GetMap() {
        var pushpinInfos = [];
            pushpinInfos[0] = { 'lat': 3.607682, 'lng': 98.522942, 'title': 'SPBU 14.207.1163 (dekat KM 18)', 'description': '<img src="img/spbu1.jpg" width="200px" height="100px"> Jl. Soekarno-Hatta', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png' };
            pushpinInfos[1] = { 'lat': 3.599295, 'lng': 98.562247, 'title': 'SPBU 14 203 1117 Semayang', 'description': '<img src="img/spbu2.jpg" width="200px" height="100px"> Jl. Medan-Binjai', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png' };
            pushpinInfos[2] = { 'lat': 3.599413, 'lng': 98.562784, 'title': 'SPBU 14 2031117', 'description': '<img src="img/spbu3.jpg" width="200px" height="100px"> jalan binjai km 13,5', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png' };
            pushpinInfos[3] = { 'lat': 3.599984, 'lng': 98.57414, 'title': 'SPBU Pertamina 14.203.158', 'description': '<img src="img/spbu4.jpg" width="200px" height="100px"> Jl. Medan - Binjai', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png' };
            pushpinInfos[4] = { 'lat': 3.600076, 'lng': 98.580934, 'title': 'SPBU Pertamina 14.203.1116', 'description': '<img src="img/spbu5.jpg" width="200px" height="100px"> Jl. Medan - Binjai No.Km. 12', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png' };
            pushpinInfos[5] = { 'lat': 3.5986981, 'lng': 98.5917007, 'title': 'Pertamina', 'description': '<img src="img/spbu6.jpg" width="200px" height="100px"> Jl. Medan - Binjai No.90', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png' };
            pushpinInfos[6] = { 'lat': 3.590675, 'lng': 98.609985, 'title': 'SPBU Pinang Baris', 'description': '<img src="img/spbu7.jpg" width="200px" height="100px"> Jl. Tahi Bonar Simatupang', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png' };
            pushpinInfos[7] = { 'lat': 3.573318, 'lng': 98.703155, 'title': 'SPBU Pertamina 14.202.140', 'description': '<img src="img/spbu8.jpg" width="200px" height="100px"> Jl. Arief Rahman Hakim', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png' };
            pushpinInfos[8] = { 'lat': 3.568451, 'lng': 98.723543, 'title': 'SPBU 14 202 141', 'description': '<img src="img/spbu9.jpg" width="200px" height="100px"> Jl. Menteng Raya No.7', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png' };
            pushpinInfos[9] = { 'lat': 	3.578911, 'lng': 98.626882, 'title': 'SPBU Sunggal Ringroad', 'description': '<img src="img/spbu10.jpg" width="200px" height="100px"> Jl. Sunggal', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png'};
        var infoboxLayer = new Microsoft.Maps.EntityCollection();
        var pinLayer = new Microsoft.Maps.EntityCollection();
        var apiKey = "AsKnAvIhp2slw9ffXWky-oL4_Iz8FtiQjdX_dJlgmNbbTkC23mVrYrH6E7V1_43j";
        var map = new Microsoft.Maps.Map(document.getElementById("map"), { credentials: apiKey });
        // Create the info box for the pushpin
        pinInfobox = new Microsoft.Maps.Infobox(new Microsoft.Maps.Location(3.591391, 98.677369), { visible: false });
        infoboxLayer.push(pinInfobox);
        var locs = [];
        for (var i = 0 ; i < pushpinInfos.length; i++) {
            locs[i] = new Microsoft.Maps.Location(pushpinInfos[i].lat, pushpinInfos[i].lng);
            var pin = new Microsoft.Maps.Pushpin(locs[i], {icon: pushpinInfos[i].icon, width:'20px', height:'20px'});
            pin.Title = pushpinInfos[i].title;
            pin.Description = pushpinInfos[i].description;
            pinLayer.push(pin); 
            Microsoft.Maps.Events.addHandler(pin, 'click', displayInfobox);
        }
        map.entities.push(pinLayer);
        map.entities.push(infoboxLayer);
        var bestview = Microsoft.Maps.LocationRect.fromLocations(locs);
        map.setView({ center: bestview.center, zoom: 10 });
    }
    function displayInfobox(e) {
        pinInfobox.setOptions({ title: e.target.Title, description: e.target.Description, visible: true, offset: new Microsoft.Maps.Point(0, 20) });
        pinInfobox.setLocation(e.target.getLocation());
    }
    function hideInfobox(e) {
        pinInfobox.setOptions({ visible: false });
    }
</script>
<script src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0" type="text/javascript" charset="UTF-8"></script>
</script>

<style type ="text/css";>
.panel-heading{
	margin-top: 50px;
	text-align: center;
}
.map{
	margin-left: 15px;
}
</style>
</head>
<body class="bg-dark text-white" id="page-top" onLoad="GetMap();">
	<div class="row">
	<div class="col-md-5">
		<div class="panel panel-info panel-dashboard">
			<div class="panel-heading centered">
				<h2 class="panel-title"><strong> - MAP - </strong></h2>
			</div>
			<div class="panel-body">
				<div class="map" id="map" style="position: relative; width: 100%; height: 515px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-7">
		<div class="panel panel-info panel-dashboard">
			<div class="panel-heading centered">
				<h2 class="panel-title"><strong> - DETAIL - </strong></h2>
			</div>
			<div class="panel-body">
				<table class="table text-white border-white" border='3' >
					<tr>
					<th><h2>LIST</h2></th>
					<th><h2>DETAIL</h2></th>
					</tr>
					<tr>
					<td>ID SPBU</td>
					<td><?php echo $hasil1['id']; ?></td>
					</tr>
					<tr>
					<td>NAMA SPBU</td>
					<td><?php echo $hasil1['nama']; ?></td>
					</tr>
					<tr>
					<td>ALAMAT</td>
					<td><?php echo $hasil1['alamat']; ?></td>
					</tr>
					<tr>
					<td>WAKTU BUKA</td>
					<td><?php echo $hasil1['waktu_buka']; ?></td>
					</tr>
					<tr>
					<td>HP</td>
					<td><?php echo $hasil1['hp']; ?></td>
					</tr>
					<tr>
					<td>WEBSITE</td>
					<td><?php echo $hasil1['website']; ?></td>
					</tr>
					<tr>
					<td>LATITUDE</td>
					<td><?php echo $hasil1['latitude']; ?></td>
					</tr>
					<tr>
					<td>LONGITUDE</td>
					<td><?php echo $hasil1['longitude']; ?></td>
					</tr>
					</table>
				</div>
			</div>
		</div>
	</div>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top">
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
