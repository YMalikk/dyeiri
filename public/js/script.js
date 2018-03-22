$(".choose").click(function()
{
        $(".btn_select").text($(this).text());
})

$(document).on("click",".btn_localise",function()
{
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    var myLat=0;
    var myLng=0;
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
    }
    function successFunction(position) {
        var geolocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        };
        var circle = new google.maps.Circle({
            center: geolocation,
            radius: position.coords.accuracy
        });
        document.getElementById('lat').value = parseFloat(position.coords.latitude);
        document.getElementById('lng').value = parseFloat(position.coords.longitude);
        myLat = parseFloat(position.coords.latitude);
        myLng = parseFloat(position.coords.longitude);

        var myLatLng = {lat: myLat, lng: myLng};
        var geocoder = new google.maps.Geocoder();
        var geocoderRequest = {location: myLatLng};
        geocoder.geocode(geocoderRequest, function (results, status) {
            console.log(results)
            if (status === google.maps.GeocoderStatus.OK) {

                for (var i = 0; i < results[0].address_components.length; i++) {
                    for (var b = 0; b < results[0].address_components[i].types.length; b++) {
                        //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                        if (results[0].address_components[i].types[b] === "locality") {
                            //this is the object you are looking for
                            city = results[0].address_components[i];
                        }
                        if (results[0].address_components[i].types[b] === "administrative_area_level_1") {
                            //this is the object you are looking for
                            gouv = results[0].address_components[i];
                        }
                        if (results[0].address_components[i].types[b] === "country") {
                            //this is the object you are looking for
                            country = results[0].address_components[i];
                        }

                    }
                }

                $(".btn_localise").addClass("btn_close_auto_location");
                $(".btn_localise").addClass("transit_width");
                $(".btn_localise").removeClass("btn_localise");
                $(".btn_close_auto_location").attr("title","Annuler");

                $("#lat").val(myLat);
                $("#lng").val(myLng);
                $("#country").val(country);
                $("#city").val(city);
                $(".fa-location-arrow").attr('class', 'fa fa-times close_auto_localise');

                setTimeout(function(){
                    $("#arround_me_value").text("Autour de moi");
                    $("#address").attr("disabled","disabled");
                    $("#address").removeAttr("placeholder");

                }, 400);

                setTimeout(function()
                {
                    $("#address").val(city.long_name+", "+gouv.long_name+", "+country.long_name);
                },1100);

            } else {

            }
        });
        autocomplete.setBounds(circle.getBounds());
    }

    function errorFunction() {
    }
})
$(document).on("click",".close_auto_localise",function()
{
    $(".btn_close_auto_location").addClass("btn_localise");
    $(".btn_localise").removeClass("btn_close_auto_location");
    $(".btn_localise").removeClass("transit_width");
    $(".close_auto_localise").attr("class","fa fa-location-arrow");
    $(".close_auto_localise").removeClass("close_auto_localise");
    $(".btn_localise").attr("style","");
    $("#address").removeAttr("disabled");
    $("#arround_me_value").empty();
    $("#address").val("");
    $("#lat").val("");
    $("#lng").val("");
    $("#address").attr("placeholder","Où voulez-vous cherchez vos plats?");

})



var autocomplete,lat,lng;

function initAutocomplete() {
    var input =(document.getElementById('address'));
    autocomplete =new google.maps.places.Autocomplete(input);
    autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {

    var place = autocomplete.getPlace();

    lat = place.geometry.location.lat();
    lng = place.geometry.location.lng();
    console.log(place.address_components);

    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        console.log(addressType);
        var val = place.address_components[i].long_name;
        console.log(val);
        if (addressType==="country") {

            if(isNaN(val)){
                country=val;
            }
        }
        if(addressType==="administrative_area_level_1")
        {
            if(val!==null){
                city=val;
            }
            else
            {
                city="";
            }
        }
    }


    document.getElementById('lat').value = parseFloat(lat);
    document.getElementById('lng').value = parseFloat(lng);
    document.getElementById('city').value = city;
    document.getElementById('country').value = country;

}