<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>WEB GIS</title>
    <script  src="https://kit.fontawesome.com/82983a7696.js" crossorigin="anonymous"></script>
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
        //SPBU
            pushpinInfos[0] = { 'lat': 3.607682, 'lng': 98.522942, 'title': 'SPBU 14.207.1163 (dekat KM 18)', 'description': '<img src="img/spbu1.jpg" width="200px" height="100px"> Jl. Soekarno-Hatta <a href="dataspbu.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png' };
            pushpinInfos[1] = { 'lat': 3.599295, 'lng': 98.562247, 'title': 'SPBU 14 203 1117 Semayang', 'description': '<img src="img/spbu2.jpg" width="200px" height="100px"> Jl. Medan-Binjai <a href="dataspbu.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png' };
            pushpinInfos[2] = { 'lat': 3.599413, 'lng': 98.562784, 'title': 'SPBU 14 2031117', 'description': '<img src="img/spbu3.jpg" width="200px" height="100px"> jalan binjai km 13,5 <a href="dataspbu.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png' };
            pushpinInfos[3] = { 'lat': 3.599984, 'lng': 98.57414, 'title': 'SPBU Pertamina 14.203.158', 'description': '<img src="img/spbu4.jpg" width="200px" height="100px"> Jl. Medan - Binjai <a href="dataspbu.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png' };
            pushpinInfos[4] = { 'lat': 3.600076, 'lng': 98.580934, 'title': 'SPBU Pertamina 14.203.1116', 'description': '<img src="img/spbu5.jpg" width="200px" height="100px"> Jl. Medan - Binjai No.Km. 12 <a href="dataspbu.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png' };
            pushpinInfos[5] = { 'lat': 3.5986981, 'lng': 98.5917007, 'title': 'Pertamina', 'description': '<img src="img/spbu6.jpg" width="200px" height="100px"> Jl. Medan - Binjai No.90 <a href="dataspbu.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png' };
            pushpinInfos[6] = { 'lat': 3.590675, 'lng': 98.609985, 'title': 'SPBU Pinang Baris', 'description': '<img src="img/spbu7.jpg" width="200px" height="100px"> Jl. Tahi Bonar Simatupang <a href="dataspbu.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png' };
            pushpinInfos[7] = { 'lat': 3.573318, 'lng': 98.703155, 'title': 'SPBU Pertamina 14.202.140', 'description': '<img src="img/spbu8.jpg" width="200px" height="100px"> Jl. Arief Rahman Hakim <a href="dataspbu.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png' };
            pushpinInfos[8] = { 'lat': 3.568451, 'lng': 98.723543, 'title': 'SPBU 14 202 141', 'description': '<img src="img/spbu9.jpg" width="200px" height="100px"> Jl. Menteng Raya No.7 <a href="dataspbu.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png' };
            pushpinInfos[9] = { 'lat': 	3.578911, 'lng': 98.626882, 'title': 'SPBU Sunggal Ringroad', 'description': '<img src="img/spbu10.jpg" width="200px" height="100px"> Jl. Sunggal <a href="dataspbu.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png'};

            //Hotel
            pushpinInfos[10] = { 'lat': 3.589761, 'lng': 98.651287, 'title': 'Four Point by Sheraton Medan', 'description': '<img src="img/Hotelfourpoint.jpg" width="200px" height="100px"> Jl. Gatot Subroto <a href="datahotel.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png'};
            pushpinInfos[11] = { 'lat': 3.590792, 'lng': 98.640575, 'title': 'Bumi Malaya Hotel', 'description': '<img src="img/Hotelbumimalaya.jpg" width="200px" height="100px"> Jl. Gatot Subroto <a href="datahotel.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png'};
            pushpinInfos[12] = { 'lat': 3.589378, 'lng': 98.653042, 'title': 'Grand Kanaya Hotel', 'description': '<img src="img/Hotelgrandkanaya.jpg" width="200px" height="100px"> Jl. Darussalam No.12 <a href="datahotel.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png'};
            pushpinInfos[13] = { 'lat': 3.589807, 'lng': 98.661196, 'title': 'Hotel 61 Medan', 'description': '<img src="img/Hotel61.jpg" width="200px" height="100px"> Jl. Iskandar Muda <a href="datahotel.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png'};
            pushpinInfos[14] = { 'lat': 3.594028, 'lng': 98.668638, 'title': 'Radisson Medan', 'description': '<img src="img/Hotelradisonmedan.jpg" width="200px" height="100px"> Jl. H.Adam Malik No.5 <a href="datahotel.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png'};
            pushpinInfos[15] = { 'lat': 3.594235, 'lng': 98.861342, 'title': 'Thong s Inn', 'description': '<img src="img/HotelthongsInn.jpg" width="200px" height="100px"> Jl. Pasar V Kebun Kelapa <a href="datahotel.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png'};
            pushpinInfos[16] = { 'lat': 3.600278, 'lng': 98.833341, 'title': 'Prime Plaza Hotel Kualanamu Medan', 'description': '<img src="img/Hotelprimeplaza.jpg" width="200px" height="100px"> Jl. Tumpatan Nibung <a href="datahotel.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png'};
            pushpinInfos[17] = { 'lat': 3.587952, 'lng': 98.804659, 'title': 'THE KNO HOTEL', 'description': '<img src="img/HoteltheKNO.jpg" width="200px" height="100px"> Jl. Batang Kuis No.19 <a href="datahotel.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png'};
            pushpinInfos[18] = { 'lat': 3.635258, 'lng': 98.708701, 'title': 'Miyana Hotel', 'description': '<img src="img/Hotelmiyana.jpg" width="200px" height="100px"> Jl. H.Anif No.28  <a href="datahotel.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png'};
            pushpinInfos[19] = { 'lat': 3.568754, 'lng': 98.643022, 'title': 'Hotel GranDhika Setiabudi Medan', 'description': '<img src="img/Hotelgrandhika.jpg" width="200px" height="100px"> Jl. Dr.Mansyur No.169  <a href="datahotel.php">Detail</a>', 'icon' :'http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png'};

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

 </head>

<style type ="text/css";>

.map{
      margin-top: 50px;
}
</style>
</head>

<body class="bg-dark" id="page-top" onLoad="GetMap();">
    <div class="map" id="map" style="position: relative; width: 1340px; height: 600px;"></div>

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
