function iniciarMap() {
    var coord = { lat: 13.488245, lng: -88.186551 };
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: coord
    });
    var marker = new google.maps.Marker({
        position: coord,
        map: map
    });
}