
$(document).ready(function(){
  
    var lokasi = {lat: 3.6488659, lng: 98.5055764};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 11,
      center: lokasi
    });
    
    $.getJSON('api/Potensi', function(data){
      $.each(data, function(i, j) {

        $.each(j,function(x,y){
          var lat = parseFloat(y.latx);
          //console.log(y.latx)
         //var lat =  3.581479;
          var lng = parseFloat(y.laty);

          var nama = y.nama;
          console.log(nama);
        var contentString = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<p><b>'+nama+'</b>'+
        '<div id="bodyContent">'+
        '<p>'+y.alamat+
          y.jum_tk_aktif+
          y.foto+
        '</p>'+
        '</div>'+
        '</div>';
        // var lng = 98.680971;
          //console.log(point);      
          //$("div").append(field + " ");

        var icon = 'http://maps.google.com/mapfiles/ms/icons/green.png';

          var infowindow = new google.maps.InfoWindow({
            content: contentString
          });
          var point = ({lat :lat, lng: lng});
          var marker = new google.maps.Marker({
            position: point,
            map: map,
            icon = new google.maps.MarkerImage(icon),
            title: j.nama
          });
          
          marker.addListener('click', function() {
            infowindow.open(map, marker);
          });
        })
       
        
       });
     
    });
    
    
    
        // +="id :" + result[i].id + "<br>Nama :" + result[i].nama + "<br>Alamat :" + result[i].alamat + "<br><br>";
      
   
   

    // var contentString = '<div id="content">'+
    //     '<div id="siteNotice">'+
    //     '</div>'+
    //     '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
    //     '<div id="bodyContent">'+
    //     '<p><b>Test</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
    //     'sandstone rock formation in the southern part of the '+
    //     'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
    //     'south west of the nearest large town, Alice Springs; 450&#160;km '+
    //     '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
    //     'features of the Uluru - Kata Tjuta National Park. Uluru is '+
    //     'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
    //     'Aboriginal people of the area. It has many springs, waterholes, '+
    //     'rock caves and ancient paintings. Uluru is listed as a World '+
    //     'Heritage Site.</p>'+
    //     '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
    //     'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
    //     '(last visited June 22, 2009).</p>'+
    //     '</div>'+
    //     '</div>';
  
    // var infowindow = new google.maps.InfoWindow({
    //   content: contentString
    // });
  
    // var marker = new google.maps.Marker({
    //   position: point,
    //   map: map,
    //   title: 'Uluru (Ayers Rock)'
    // });
    // marker.addListener('click', function() {
    //   infowindow.open(map, marker);
    // });
  });

  