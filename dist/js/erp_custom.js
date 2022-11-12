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
            let html = '';
            html += '<table class="table table-bordered"><tr class="item-row-wrapper">';
            html += '<td><select data-row-id="'+room+'" class="form-control items" id="item" name="item[]">';
            html += '<option>Select Item</option>';
            jQuery.each(JSON.parse(erp.config.item_data), function(i, val) {
                html += '<option value="'+val.id+'">'+val.item_name+'</option>';
            });
            html += '</select></td><td><input type="text" id="unit" name="unit[]" readonly="readonly" class="form-control units"></td><td><input type="quantity" name="quantity[]" class="form-control"></td><td> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i> </button></td></tr></table>'
            divtest.innerHTML = html;
             objTo.appendChild(divtest)
    
            var objTo = document.getElementById('show_qnt_fields')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "table table-bordered removeclass" + room);
            var rdiv = 'removeclass' + room;
            divtest.innerHTML = '<table class="table table-bordered"><tr><td><input type="text" id="show_unit_'+room+'" readonly="readonly" name="units2[]" class="form-control"></td><td><input type="text" id="show_qnt_'+room+'" readonly="readonly" name="qty2[]"  class="form-control"></td></tr></table>'
            objTo.appendChild(divtest)
        }
    
        function remove_education_fields(rid) {
            console.log("rid", rid)
            $('.removeclass' + rid).remove();
        }

    });

    //material request form
    $(document).on('change','.items',function(e){
        e.preventDefault();
        let item = $(this);
        let item_id = item.val();
        jQuery.ajax({
            url: erp.config.base_url+'ajax/get_item_details.php',
            method: 'POST',
            data: {item_id:item_id},
            dataType: "json",
            success: function (data) {
                let item_row = $(item).closest('.item-row-wrapper');
                let row_id = $(item).data('row-id');


                console.log(item_row);
                console.log(row_id);
                item_row.find('.units').val(data.unit_name)
          

                // $('#unit').val(data.unit_name);
                $('#show_unit_' + row_id).val(data.unit_name);
                $('#show_qnt_' + row_id).val(data.qnt);
            }
        });
      });
      
    $(document).on('submit','#material-request-form',function(e){
        e.preventDefault();
        let form = $('#material-request-form');
        console.log("form",form)
        var formData = new FormData(form[0]);
        formData.append('company',$('#company').val());
        jQuery.ajax({
            url: erp.config.base_url+'ajax/save_material_request.php',
            // url: 'http://localhost/ERP2-main/ajax/save_material_request.php',
            type: 'POST',
            data: formData,
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
                } else if (data.success == true) {
                    $('.cust-select2').val(null).trigger('change');
                    // iziToast.success({
                    //     title: 'SUCCESS',
                    //     message: data.message,
                    //     position: 'topRight'
                    // });
                }
            }
        });
        console.log("data",data)
    });
});