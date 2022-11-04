$(function() {
    "use strict";

    function loadData(type, category_id) {
        $.ajax({
            url: "../../helper/ajax_country_state_city.php",
            type: "POST",
            data: { type: type, id: category_id },
            success: function(data) {
                if (type == "stateData") {
                    $("#state").html(data);
                } else if (type == "cityData") {
                    $("#city").html(data);
                } else if (type == "areaData") {
                    $("#area").html(data);
                } else {
                    $("#country").append(data);
                }
            }
        });
    }

    loadData();

    //on change function in country dropdown
    $("#country").on("change", function() {

        var country = $("#country").val();
        if (country != "") {
            loadData("stateData", country);
        } else {
            $("#state").html("<option>--Select State--</option>");
        }
    });

    //on change function in state dropdown
    $("#state").on("change", function() {
        var state = $("#state").val();
        if (state != "") {
            loadData("cityData", state);
        } else {
            $("#city").html("<option>--Select City--</option>");
        }
    });

    //on change function in city dropdown
    // $("#city").on("change",function(){
    //     var city = $("#city").val();
    //    if(city != ""){
    //     loadData("areaData", city);
    //    }
    // });


});