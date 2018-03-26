$(document).ready(function () {
    var checkForm=false,currentForm=1;
    $.get("http://ipinfo.io", function(response) {
        $("#tel_int").intlTelInput({
            initialCountry: response.country.toLowerCase(),
            utilsScript:'plugins/intlTelInput/js/utils.js',
            separateDialCode: false
    });
    }, "jsonp");

    $(".stepOne").click(function()
    {
        alert("1");
        currentForm=1;

    });

    $(".stepTwo").click(function()
    {
        alert("2");
        currentForm=2;
    });

    $(".stepThree").click(function()
    {
        alert("3");
        currentForm=3;
    });


    function valideTel() {

        var result = true;
        if (!$("#tel_int").intlTelInput("isValidNumber"))
        {
            $("#tel_int").focus();
            $("#tel_int").css('border-color','red');
            result = false;
        }
        else
        {
            $("#tel_int").css('border-color','#dddddd');
            var countryData = $("#tel_int").intlTelInput("getSelectedCountryData");
            $("#code_tel_int").val(countryData.dialCode);
            $("#my_mobile").val($("#tel_int").intlTelInput("getNumber"));
            $("#my_pays").val(countryData.name);
        }
        return result;
    }
    $("#valid_setp_1").click(function()
    {
        if(!valideTel())
        {
            console.log("Erreur mobile");
            return false;
        }
    })

    function verifyForm(x)
    {
        var result=true;
        if(x==1)
        {
            result=valideTel()&&(($("#lat").val().length!=0)&&($("#lng").val().length!=0));
        }
        return result;
    }

    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();

    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        if(verifyForm(currentForm))
        {
            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        }
        else
        {
            return false;
        }
    });

    $(".next-step").click(function (e) {
        if(verifyForm(currentForm))
        {
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
            if(currentForm==4)
            {
                var kitchenImages = $(".kitchen_images_result").html();
                $(".results_images").empty();
                $(".tel_result").empty();
                $(".address_result").empty();
                $(".address_result").append($("#address").clone().attr("disabled","disabled"));
                $(".tel_result").append($("#tel_int").clone().attr("disabled","disabled"));
                $(".results_images").append(kitchenImages);
            }
            console.log("Current form : "+currentForm);
        }
        else
        {
            console.log("Error in : "+currentForm+" form ");
        }

    });

    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);
        currentForm--;
        console.log("Current form : "+currentForm);

    });
});

function addImage(input) {
    var files = input.files;
    var wrongImage = false,currentImageNumber = parseInt($("#images_count").text()),
        keep = true;

    if(currentImageNumber<6)
    {
        if (files.length > 6) {
            swal("Erreur", "Vous ne pouvez pas charger plus que 6 photos", "error");
        }
        else if(currentImageNumber+files.length>6)
        {
            swal("Erreur", "Vous avez déja "+currentImageNumber+" photo, vous ne pouvez pas ajouter "+files.length+" photos", "error");
        }
        else {
            for (var i = 0, f; f = files[i]; i++) {
                if (keep) {
                    var ValidImageTypes = ["image/jpeg", "image/png", "image/jpg"];
                    var fileType = f["type"];
                    if ($.inArray(fileType, ValidImageTypes) >= 0) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $(".kitchen_images").append('  <div class="col-md-4"><img class="image_kitchen_list img-responsive image_kitchen" src="' + e.target.result + '"/></div>')
                            currentImageNumber++;
                            $("#images_count").text(currentImageNumber.toString());
                            if (currentImageNumber>= 6) {
                                keep = false;
                            }
                        };
                        reader.readAsDataURL(f);
                    }
                    else {
                        wrongImage=true;
                    }
                }
            }
        }
    }
    else
    {
        swal("Erreur", "Vous avez atteint le nombre maximum des photos", "error");
    }
    if(wrongImage)
    {
        swal("Image erronée", "Veuillez vérifier vos images !", "warning");
    }
}
$("#kitchen_image").change(function(){
    addImage(this);

});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}