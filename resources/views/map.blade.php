@extends('layouts.app')
@section('content')
    <div class="main-area">
        <div class="top-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="hello">
                            <h6>All Leases!</h6>
                        </div>
                    </div>
                    @include('includes.sub_header')
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Property Map</h3>
            </div>
            <div class="card-header">
                <div id="map" style="height: 500px; width: 100%;"></div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="propertyModal" tabindex="-1" role="dialog" aria-labelledby="propertyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="propertyModalLabel">Property Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="propertyDetails"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script>
    <script>
        async function initMap() {
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: {
                    lat: 38.8977263,
                    lng: -77.0363089
                }
            });

            const address = "{{ $property->address }}";
            const geocodeUrl =
                `https://maps.googleapis.com/maps/api/geocode/json?address=${encodeURIComponent(address)}&key={{ env('GOOGLE_MAPS_API_KEY') }}`;

            const response = await fetch(geocodeUrl);
            const data = await response.json();

            if (data.status === 'OK') {
                const location = data.results[0].geometry.location;
                // console.log(location);
                const marker = new google.maps.Marker({
                    position: {
                        lat: location.lat,
                        lng: location.lng
                    },
                    map: map,
                    title: '{{ $property->name }}'
                });

                marker.addListener('click', function() {
                    $.ajax({
                        url: '/map/property/' + {{ $property->id }},
                        method: 'GET',
                        success: function(response) {
                            console.log(response.address);
                            $('#propertyModalLabel').text(response.property_name);
                            $('#propertyDetails').html('<p>' + response.address + '</p>');
                            $('#propertyModal').modal('show');
                        }
                    });
                });
            }
        }

        $(document).ready(function() {
            initMap();
        });
    </script>
@endpush
