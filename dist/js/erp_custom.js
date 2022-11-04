$(function () {
    "use strict";

    $(document).ready(function(){

        var room = 1;

        $(document).on('click','.incerement-item-fields',function(){
            item_fields();
        });

        function item_fields() {
            room++;
            var objTo = document.getElementById('item_fields')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "table table-bordered removeclass" + room);
            var rdiv = 'removeclass' + room;
            divtest.innerHTML = '<table class="table table-bordered"><tr><td><select class="form-control" id="item" name="name="item[]""><option>Select Item</option><option value="2015">2015</option></select></td><td><input type="unit" disabled = true class="form-control"></td><td><input type="quantity" class="form-control"></td><td> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i> </button></td></tr></table>'
            objTo.appendChild(divtest)
    
            var objTo = document.getElementById('show_qnt_fields')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "table table-bordered removeclass" + room);
            var rdiv = 'removeclass' + room;
            divtest.innerHTML = '<table class="table table-bordered"><tr><td><input type="email" class="form-control"></td><td><input type="email" class="form-control"></td></tr></table>'
            objTo.appendChild(divtest)
        }
    
        function remove_education_fields(rid) {
            console.log("rid", rid)
            $('.removeclass' + rid).remove();
        }

    });

    //material request form
    $(document).on('submit','#material-request-form',function(e){
        e.preventDefault();
        iziToast.success({
            title: 'Success',
            message: 'testing library',
            position: 'topRight'
        });
        let form = $('#material-request-form');
        var formData = new FormData(form[0]);
        let btn = $('#btn-material-request');
        btn.attr('disabled', true);
        btn.text('Updating...');
        jQuery.ajax({
            url: erp.config.base_url+'ajax/save_material_request.php',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                btn.attr('disabled', false);
                btn.text('Update');
                if (data.success == false) {
                    iziToast.error({
                        title: 'ERROR',
                        message: data.message,
                        position: 'topRight'
                    });
                } else if (data.success == true) {
                    $('.cust-select2').val(null).trigger('change');
                    iziToast.success({
                        title: 'SUCCESS',
                        message: data.message,
                        position: 'topRight'
                    });
                }
            }
        });
    });
});