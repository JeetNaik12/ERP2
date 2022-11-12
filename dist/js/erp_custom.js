$(function () {
    "use strict";

    $(document).ready(function(){

        var room = 1;

        $(document).on('click','.incerement-item-fields',function(){
            item_fields();
        });

        function item_fields() {
            room++;
            // var item_res = document.getElementById('itm');
            var objTo = document.getElementById('item_fields');
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "table table-bordered removeclass" + room);
            var rdiv = 'removeclass' + room;
            
            divtest.innerHTML = '<table class="table table-bordered"><tr><td><select class="form-control" id="item" name="name="item[]""><option>Select Item</option><option value="2015">2015</option></select></td><td><input type="unit" disabled = true class="form-control"></td><td><input type="quantity" class="form-control"></td><td> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i> </button></td></tr></table>'
            objTo.appendChild(divtest)
    
            var objTo = document.getElementById('show_qnt_fields')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "table table-bordered removeclass" + room);
            var rdiv = 'removeclass' + room;
            divtest.innerHTML = '<table class="table table-bordered"><tr><td><input type="text" name="unit" class="form-control"></td><td><input type="text" name="quantity" class="form-control"></td></tr></table>'
            objTo.appendChild(divtest)
        }
    
        function remove_education_fields(rid) {
            console.log("rid", rid)
            $('.removeclass' + rid).remove();
        }
    });
    $(document).on('click','.incerement-order-item-fields',function(){
        // alert("helll");
        //order_item_fields();
    });

    //material request form
    $(document).on('change','.items',function(e){
        e.preventDefault();
        let item_id = $(this).val();
        jQuery.ajax({
            url: erp.config.base_url+'ajax/get_item_details.php',
            method: 'POST',
            data: {item_id:item_id},
            dataType: "json",
            success: function (data) {
                $('#unit').val(data.unit_name)
                $('#show_unit').val(data.unit_name)
                $('#show_qnt').val(data.qnt)
                
                // btn.attr('disabled', false);
                // btn.text('Update');
                if (data.success == false) {
                    // iziToast.error({
                    //     title: 'ERROR',
                    //     message: data.message,
                    //     position: 'topRight'
                    // });
                    alert("error")
                } else if (data.success == true) {
                    console.log("data====", data)
                    $('.cust-select2').val(null).trigger('change');
                    // iziToast.success({
                    //     title: 'SUCCESS',
                    //     message: data.message,
                    //     position: 'topRight'
                    // });
                    alert("success")
                }
            }
        });
      });
      
    $(document).on('submit','#material-request-form',function(e){
        e.preventDefault();
        // iziToast.success({
        //     title: 'Success',
        //     message: 'testing library',
        //     position: 'topRight'
        // });
        let form = $('#material-request-form');
        console.log("form",form)
        var formData = new FormData(form[0]);
        console.log("formData",formData)
        let btn = $('#btn-material-request');


        var company = $("#company").val();
        var project_name = $("#project_name").val();
        var date = $("#date").val();
        var request_type = $("#request_type").val();
        var request_code = $("#request_code").val();
        var department = $("#department").val();
        var request_name = $("#request_name").val();
       
        const request_data = {
            company:company,
            project_name:project_name,
            date:date,
            request_type:request_type,
            request_code:request_code,
            department:department,
            request_name:request_name
        }
        console.log('request_data',request_data)


        console.log("company", company)
        btn.attr('disabled', true);
        btn.text('Updating...');
        jQuery.ajax({
            // url: erp.config.base_url+'ajax/save_material_request.php',
            url: 'http://localhost/ERP2-main/ajax/save_material_request.php',
            type: 'POST',
            data: request_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                btn.attr('disabled', false);
                btn.text('Update');
                if (data.success == false) {
                    // iziToast.error({
                    //     title: 'ERROR',
                    //     message: data.message,
                    //     position: 'topRight'
                    // });
                    alert("error")
                } else if (data.success == true) {
                    $('.cust-select2').val(null).trigger('change');
                    // iziToast.success({
                    //     title: 'SUCCESS',
                    //     message: data.message,
                    //     position: 'topRight'
                    // });
                    alert("success")
                }
            }
        });
        console.log("data",data)
    });
});