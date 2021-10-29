<div>
    <div class="row">
        <div class="col-md-4">
            @foreach ($branches as $branch)
                <div class="card border-light mb-3">
                    <div class="card-body">
                        <input  wire:click="getBranchAddress({{ $branch->id }} , '{{ $branch->name }}', '{{ $branch->address1 }}', '{{ $branch->city }}', '{{ $branch->province }}', '{{ $branch->country }}', '{{ $branch->postal_code }}')" name="branch_address" class="form-check-input align-middle" type="radio">
                        <h5 class="card-title fs-6">{{  $branch->name  }}</h5>
                        <p class="card-text fs-7 fw-lighter gray-light"><span class="mdi mdi-map-marker"></span> {{ $branch->address1}}</p>
                        <p class="card-text fs-7 fw-lighter gray-light">{{ $branch->city.', '.$branch->province.', '.$branch->country.', '.$branch->postal_code}}</p>
                        <p class="card-text fs-7 fw-lighter gray-light"><span class="mdi mdi-phone"></span> {{ $branch->phone}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-8" id="map"></div>
    </div>
</div>




<script>
    // function initMap() {
       
    //     // get branch details
    //     const address= [];
    //      const locations = <?php echo json_encode($branches); ?>;
        
    //     // fetch branch address
    //     locations.forEach(element => {
    //         const storeAddress = element.address1 +', '+element.city+', '+element.country+' '+ element.postal_code
    //         address.push({'address':storeAddress,'companyName':element.company_name});
    //     });

    //     const geocoder = new google.maps.Geocoder();

    //     // set user location at the center of the map
    //     const map = new google.maps.Map(document.getElementById("map"), {
    //         zoom: 12,
    //         center: { lat: 45.463605, lng: -73.745268 },
    //     });
    //     const marker = new google.maps.Marker({
    //         position: { lat: 45.463605, lng: -73.745268 },
    //         map: map,
    //         icon: "/images/icons/png/you_are_here.png",
    //     });

    //     // add icon to map (name of the icon must be same as company name comes from database table=branches)
    //     const icons = {
    //         ups: {
    //         icon: "/images/icons/png/UpsLogo.png",
    //         },
    //         // dhl: {
    //         // icon: iconBase + "library_maps.png",
    //         // },
            
    //     };
    //     // add all branchs to map
    //     // address.forEach(element => {
    //     //     geocoder.geocode({ address: element.address })
    //     //     .then(({ results }) => {
    //     //     new google.maps.Marker({
    //     //         map: map,
    //     //         position: results[0].geometry.location,
    //     //         icon: icons[element.companyName].icon,
    //     //     });
    //     //     })
    //     //     .catch((e) =>
    //     //     alert("Geocode was not successful for the following reason: " + e)
    //     //     );
    //     // });
    //  }




    function initMap() {
  // The location of Uluru
  const uluru = { lat: -25.344, lng: 131.036 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 4,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlOOvicmI4ZpufnU_SvdTrv0dm2QXXNm4&callback=initMap&libraries=&v=weekly" async ></script>
