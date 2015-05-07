<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCtz0ZRitKmiVNR1ErQcgqEO5sHP6ovVss
">//dien key cua api
</script>


// Hiển thị bản đồ

<script>
	function initialize()
	{

	var mapOptions = {
	zoom: 13,
	center: new google.maps.LatLng(16.065253614780254, 108.18838119506836),
	mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById('googlemap'), mapOptions);

	// Tạo marker icon
	markerIcon = new google.maps.MarkerImage(
	"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAkAAAAJCAYAAADgkQYQAAAAiklEQVR42mNgQIAoIF4NxGegdCCSHAMzEC+NUlH5v9rF5f+ZoCAwHaig8B8oPhOmKC1NU/P//7Q0DByrqgpSGAtSdOCAry9WRXt9fECK9oIUPXwYFYVV0e2ICJCi20SbFAuyG5uiECUlkKIQmOPng3y30d0d7Lt1bm4w301jQAOgcNoIDad1yOEEAFm9fSv/VqtJAAAAAElFTkSuQmCC",
	new google.maps.Size(9, 9),
	new google.maps.Point(0, 0),
	new google.maps.Point(4, 5)
	);
</script>

// II. Cách nối những điểm marker

// Ở bên trên ta đã tạo 1 object cho các marker trên bản đồ, bây giờ ta sẽ nối chúng lại
// Khai báo các mảng để sử dụng

var map, markerIcon, selectedArea;
var pointArray = new Array();// mảng những điểm đã chọn
var markerArray = new Array(); // mảng marker
var countMarker = 0;
//No need markers anymore
var selectHandler = false;

// Hàm dùng để add các marker lên bản đồ

function addMarker(location){
// tạo marker
	var marker = new google.maps.Marker({
	position: location,
	map: map,
	title: 'marker ' + (countMarker + 1),
	icon: markerIcon
	});
	markerArray.push(marker);arker
	pointArray.push(new google.maps.LatLng(location.lat(), location.lng()));
	countMarker++;
}

 
// Hàm xóa marker

function removeMarker(iMarker){
	if (markerArray.length != 0){
	markerArray[iMarker - 1].setMap(null);
	markerArray[iMarker - 1] = null;
	updatePointArray(); // xóa điểm khỏi mảng point
	$('.marker-' + iMarker).remove();
	}
}
// Cập nhật lại mảng Point

function updatePointArray() {
	pointArray.length = 0;
	for (i in markerArray){
	if (markerArray[i] != null){
	pointArray.push(new google.maps.LatLng(markerArray[i].getPosition().lat(), markerArray[i].getPosition().lng()));
	}
	}
	drawArea(); // vẽ lại n
}
// Hàm nối điểm

function drawArea() {
	if (!selectedArea){
	// khoanh vùng những điểm đã nối lại thành đa giác
		selectedArea = new google.maps.Polygon({
		paths: pointArray,
		strokeColor: ‘#FF0000′,
		strokeOpacity: 0.8,
		strokeWeight: 3,
		fillColor: ‘#FF0000′,
		fillOpacity: 0.35,
		map: map
		});
	} else{
	selectedArea.setPaths(pointArray);
	}
}
// Hiển thị các điểm đã nối lên bản đồ

function displayArea() {
// hiển thị những điểm đã nối lên bản đồ
	var bounds = new google.maps.LatLngBounds();
	$(‘.point-list ol li’).each(function(){
	var lat = $(this).find(‘input’).first().val();
	var lng = $(this).find(‘input’).last().val();
	pointArray.push(new google.maps.LatLng(lat, lng));
	bounds.extend(new google.maps.LatLng(lat, lng));
	});
	drawArea();
	map.fitBounds(bounds);
}