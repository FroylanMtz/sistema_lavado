
function initMap(){

    const ubicacion = new Localizacion(()=>{

        const options ={
            center:{
                lat: 23.735119,
                lng: -99.1423752
            },

            zoom: 18
        }

        var map = document.getElementById('map');

        const mapa = new google.maps.Map(map, options);
    });

}