
$(document).ready(function(){
  
    
  
  var lokasi = {lat: 3.6488659, lng: 98.5055764};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 11,
      center: lokasi
    });
    
    $.getJSON('api/Perusahaanbinaan', function(data){
      $.each(data, function(i, j) {
        
        $.each(j,function(x,y){

          $.each(y, function(e,f)
          {
            var customLabel = {
              peserta : "http://maps.google.com/mapfiles/ms/icons/green.png",
              potensi : "http://maps.google.com/mapfiles/ms/icons/red.png",
              centralisasi : "http://maps.google.com/mapfiles/ms/icons/blue.png",
              bpu : "http://maps.google.com/mapfiles/ms/icons/yellow.png",
              nonbpu : "http://maps.google.com/mapfiles/ms/icons/orange.png",
              nonaktif : "http://maps.google.com/mapfiles/ms/icons/grey.png"
              };
            
          var lat = parseFloat(f.latx);
          var lng = parseFloat(f.laty);
          var nama = f.nama;
          var npp = f.npp;
          var type = f.status;
          var alamat = f.alamat;
          var jum_tk = f.jum_tk;
          var foto = '<img src="admin/img_perusahaan/'+f.foto+'" width="50" height="50">';

          // var infowincontent = document.createElement('div');
          // var strong = document.createElement('strong');
          //     strong.textContent = nama
          //     infowincontent.appendChild(strong);
          //     infowincontent.appendChild(document.createElement('br'));

          // var text = document.createElement('text');
          //     text.textContent = alamat;
          //     text.textContent = jum_tk;
          //     text.textContent = foto;
          //     infowincontent.appendChild(text)
              

          // if (npp === undefined) {
           //     $this.npp;
          // }
          // console.log(type);
        var contentString = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<p><b>Nama Perusahaan : '+nama+'</b>'+
        '<p><b>NPP : '+npp+'</b>'+
        '<div id="bodyContent">'+
        '<h5><p>Alamat : '+alamat+
        '<p>Jumlah TK : '+jum_tk+
        '</h5><p><a href="admin/img_perusahaan/'+foto+'">'+
        '<img src="admin/img_perusahaan/'+foto+'" width="50" height="50"></a>'
        '</p>'+
        '</div>'+
        '</div>';
        // var lng = 98.680971;
          //console.log(point);      
          //$("div").append(field + " ");
          var ikon = customLabel[type] || {}
          var infowindow = new google.maps.InfoWindow({
            content: contentString
          });
          var point = ({lat :lat, lng: lng});
          var marker = new google.maps.Marker({
            position: point,
            icon: new google.maps.MarkerImage(ikon),
            map: map,
            title: nama
          });
          
          marker.addListener('click', function() {
            // infowindow.setContent(infowincontent);
            infowindow.open(map, marker);
          });

          })
          
          
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

  