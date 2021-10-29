<div>
   <script>
       function initMap() {

        // get branch details
        const address= [];
        const locations = <?php echo json_encode($branches); ?>;
        
        // fetch branch address
        locations.forEach(element => {
            const storeAddress = element.address1 +', '+element.city+', '+element.country+' '+ element.postal_code
            address.push({'address':storeAddress,'companyName':element.company_name});
        });

        const geocoder = new google.maps.Geocoder();

        // set user location at the center of the map
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 12,
            center: { lat: 45.463605, lng: -73.745268 },
        });
        const marker = new google.maps.Marker({
            position: { lat: 45.463605, lng: -73.745268 },
            map: map,
            icon: "/images/icons/png/you_are_here.png",
        });

        // add icon to map (name of the icon must be same as company name comes from database table=branches)
        const icons = {
            ups: {
            icon: "/images/icons/png/UpsLogo.png",
            },
            // dhl: {
            // icon: iconBase + "library_maps.png",
            // },
            
        };
        // add all branchs to map
        address.forEach(element => {
            geocoder.geocode({ address: element.address })
            .then(({ results }) => {
            new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                icon: icons[element.companyName].icon,
            });
            })
            .catch((e) =>
            alert("Geocode was not successful for the following reason: " + e)
            );
        });
        }
   </script>
   
    <form wire:submit.prevent="saveTo">
        <div class="accordion-body px-0 row">
            <div class="col-md-4 mb-3">
                <label for="company" class="form-label required fs-5 mb-4">{{__('UPS Locations')}}</label>
                @foreach ($branches as $branch)
                    <div class="card border-light mb-3" style="max-width: 18rem;">
                        <div class="col-md-2">
                            <input  wire:click="select_store({{ $branch->id }} , '{{ $branch->name }}', '{{ $branch->address1 }}', '{{ $branch->city }}', '{{ $branch->province }}', '{{ $branch->country }}', '{{ $branch->postal_code }}', '{{ $branch->phone }}')" name="branch_address" class="form-check-input align-middle" type="radio">
                        </div>
                        <div class="col-md-10">
                            <div class="card-body">
                                <h5 class="card-title fs-6">{{  $branch->name  }}</h5>
                                <p class="card-text fs-7 fw-lighter gray-light">{{ $branch->address1}}</p>
                                <p class="card-text fs-7 fw-lighter gray-light">{{ $branch->city.', '.$branch->province.', '.$branch->country.', '.$branch->postal_code}}</p>
                                <p class="card-text fs-7 fw-lighter gray-light">{{ $branch->phone}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-8 mb-3" id="map"></div>
        <div class="row">
            <div class="col-md-6 mb-3 mb-0">
                <a class="btn btn-outline-pink w-100 col-md-6" wire:click="back">{{ __('Back') }}</a>
            </div>
            <div class="col-md-6">
                <button class="btn btn-pink w-100 col-md-6">{{__('Next')}}</button>
            </div>
        </div>
    </form>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlOOvicmI4ZpufnU_SvdTrv0dm2QXXNm4&callback=initMap&libraries=&v=weekly" async ></script>
</div>
                
