$(function () {
    "use strict";

    $(document).ready(function () {

        var room = 1;

        $(document).on('click', '.incerement-item-fields', function () {
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
            html += '<td><select data-row-id="' + room + '" class="form-control items" id="item" name="item[]">';
            html += '<option>Select Item</option>';
            jQuery.each(JSON.parse(erp.config.item_data), function (i, val) {
                html += '<option value="' + val.id + '">' + val.item_name + '</option>';
            });
            html += '</select></td><td><input type="text" id="unit" name="unit[]" readonly="readonly" class="form-control units"></td><td><input type="quantity" name="quantity[]" class="form-control quantity-input"></td><td> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i> </button></td></tr></table>'
            divtest.innerHTML = html;
            objTo.appendChild(divtest)

            var objTo = document.getElementById('show_qnt_fields')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "table table-bordered removeclass" + room);
            var rdiv = 'removeclass' + room;
            divtest.innerHTML = '<table class="table table-bordered"><tr><td><input type="text" id="show_unit_' + room + '" readonly="readonly" name="units2[]" class="form-control"></td><td><input type="text" id="show_qnt_' + room + '" readonly="readonly" name="qty2[]"  class="form-control"></td></tr></table>'
            objTo.appendChild(divtest)
        }

        function remove_education_fields(rid) {
            $('.removeclass' + rid).remove();
        }
    });
    //material request form
    $(document).on('change', '.items', async function (e) {
        e.preventDefault();
        let item = $(this);
        let item_id = item.val();
        // let qnt = ('#quantity').value();
        // let qnty = quantity.val();

        await jQuery.ajax({
            url: erp.config.base_url + 'ajax/get_item_details.php',
            method: 'POST',
            data: {
                item_id: item_id
            },
            dataType: "json",
            success: function (data) {
                let item_row = $(item).closest('.item-row-wrapper');
                let row_id = $(item).data('row-id');
                item_row.find('.units').val(data.unit_name)
                item_row.find('.rate').val(data.rate)
                //quantity * rate basic ammount
                item_row.find('.rate').val(data.rate)
                let basicamt = data.rate * 2;
                item_row.find('.basic_amt').val(data.rate * 2)
                // let qnty = $('#quantity').val();
                // $('#unit').val(data.unit_name);
                $('#show_unit_' + row_id).val(data.unit_name);
                $('#show_qnt_' + row_id).val(data.qnt);
            }
        });

        calculate_total_rate();
    });

    function calculate_total_rate() {
        let total_rate = 0;
        let basic_amount = 0;

        $(".rate").each(function () {
            let value = $(this).val();
            total_rate = total_rate + parseFloat(value, 2);
        });

        $(".basic_amt").each(function () {
            let value = $(this).val();
            basic_amount = basic_amount + parseFloat(value, 2);
        });
        $('.total_rate').val(total_rate);
        $('.basic-amt-total').val(basic_amount);
    }


    function calculate_gst_amount() {
        let total_gst_amount = 0;
        $(".gst_amt").each(function () {
            let value = $(this).val();
            total_gst_amount = total_gst_amount + parseFloat(value, 2);
        });
        $('.total_gst_amount').val(total_gst_amount);
    }

    function total_amount() {
        let total_amount = 0;
        $(".total").each(function () {
            let value = $(this).val();
            total_amount = total_amount + parseFloat(value, 2);
        });
        $('.total_amount').val(total_amount);
    }

    $(document).on('keyup', '.quantity-input', function () {
        let qty = 0;
        let basic_amount = 0;

        let item_row = $(this).parents('.item-row-wrapper');
        let rate = item_row.find('.rate').val();

        if (rate != '' && $(this).val() != '') {
            item_row.find('.basic_amt').val(parseFloat(rate, 2) * parseFloat($(this).val(), 2)); // set basic amount
        } else {
            item_row.find('.basic_amt').val('');
        }
        $(".quantity-input").each(function () {
            let value = $(this).val();
            qty = qty + parseFloat(value, 2);
        });

        $('#total_qty').val(qty);
        item_row.find('.gst').trigger('keyup');
        calculate_total_rate();
    });

    $(document).on('keyup', '.gst', function () {
        let value = parseFloat($(this).val(), 2);
        let percentage_amount = 0;
        let item_row = $(this).parents('.item-row-wrapper');
        let basic_amount = parseFloat(item_row.find('.basic_amt').val(), 2);
        percentage_amount = calculate_percentage(value, basic_amount);
        item_row.find('.gst_amt').val(percentage_amount);
        item_row.find('.total').val(basic_amount - percentage_amount);
        total_amount();
        calculate_gst_amount();
    });

    function calculate_percentage(partialValue, totalValue) {
        // return (100 * partialValue) / totalValue;
        return (totalValue / 100) * partialValue;
    }
    //

    $(document).on('submit', '#material-request-form', function (e) {
        e.preventDefault();
        let form = $('#material-request-form');
        var formData = new FormData(form[0]);
        formData.append('company', $('#company').val());
        formData.append('total_qty', $('#total_qty').val());
        jQuery.ajax({
            url: erp.config.base_url + 'ajax/save_material_request.php',
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
    });
    //add_request_quotation code
    $(document).on('submit', '#request-quotation-form', function (e) {
        e.preventDefault();
        let form = $('#request-quotation-form');
        var formData = new FormData(form[0]);
        formData.append('company', $('#company').val());
        jQuery.ajax({
            url: erp.config.base_url + 'ajax/save_request_quotation.php',
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
    });

    $(document).on('click', '.incerement-order-item-fields', function () {
        request_quotation_item_fields();

    });

    function request_quotation_item_fields() {
        room++;
        // var item_res = document.getElementById('itm');
        var objTo = document.getElementById('req_item_fields');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "table table-bordered removeclass" + room);
        var rdiv = 'removeclass' + room;
        let html = '';
        html += '<table class="table table-bordered"><tr class="item-row-wrapper">';
        html += '<td><select data-row-id="' + room + '" class="form-control items" id="item" name="item[]">';
        html += '<option>Select Item</option>';
        jQuery.each(JSON.parse(erp.config.item_data), function (i, val) {
            html += '<option value="' + val.id + '">' + val.item_name + '</option>';
        });
        html += '</select></td><td><input type="text" id="unit" name="unit[]" readonly="readonly" class="form-control units"></td><td><input type="quantity" name="quantity[]" class="form-control quantity-input"></td><td> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i> </button></td></tr></table>'
        divtest.innerHTML = html;
        objTo.appendChild(divtest)

        var objTo = document.getElementById('show_qnt_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "table table-bordered removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML = '<table class="table table-bordered"><tr><td><input type="text" id="show_unit_' + room + '" readonly="readonly" name="units2[]" class="form-control"></td><td><input type="text" id="show_qnt_' + room + '" readonly="readonly" name="qty2[]"  class="form-control"></td></tr></table>'
        objTo.appendChild(divtest)
    }

    //add_purhase_order code
    $(document).on('click', '.incerement-order-item-fields-list', function () {
        purchase_order_item_fields();
    });

    function purchase_order_item_fields() {
        room++;
        // var item_res = document.getElementById('itm');
        var objTo = document.getElementById('purchase_order_item_fields');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "table table-bordered removeclass" + room);
        var rdiv = 'removeclass' + room;
        let html = '';
        html += '<table class="table table-bordered"><tr class="item-row-wrapper">';
        html += '<td><select data-row-id="' + room + '" class="form-control items" id="item" name="item[]">';
        html += '<option>Select Item</option>';
        jQuery.each(JSON.parse(erp.config.item_data), function (i, val) {
            html += '<option value="' + val.id + '">' + val.item_name + '</option>';
        });
        html += '</select></td><td><input type="text" id="unit" name="unit[]" readonly="readonly" class="form-control units"></td><td><input type="quantity" name="quantity[]" class="form-control quantity-input"></td><td><input type="text" name="rate[]" class="form-control rate"></td><td><input type="text" name="per[]" class="form-control per"></td><td><input type="text" name="basic_amt[]" class="form-control basic_amt"></td><td><input type="text" name="gst[]" class="form-control gst"></td><td><input type="text" name="gst_amt[]" class="form-control gst_amt"></td><td><input type="text" name="total[]" class="form-control total"></td><td> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i> </button></td></tr></table>'
        divtest.innerHTML = html;
        objTo.appendChild(divtest)
    };

    $(document).on('submit', '#incerement-order-item-fields', function (e) {
        e.preventDefault();
        let form = $('#incerement-order-item-fields');
        var formData = new FormData(form[0]);
        formData.append('company', $('#company').val());
        jQuery.ajax({
            url: erp.config.base_url + 'ajax/save_purchase_order.php',
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
    });
    //material receive code
    $(document).on('click', '.incerement-material-item-fields', function () {
        receive_material_item_fields();
    });

    function receive_material_item_fields() {
        room++;
        // var item_res = document.getElementById('itm');
        var objTo = document.getElementById('receive-item_fields');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "table table-bordered removeclass" + room);
        var rdiv = 'removeclass' + room;
        let html = '';
        html += '<table class="table table-bordered"><tr class="item-row-wrapper">';
        html += '<td><select data-row-id="' + room + '" class="form-control items" id="item" name="item[]">';
        html += '<option>Select Item</option>';
        jQuery.each(JSON.parse(erp.config.item_data), function (i, val) {
            html += '<option value="' + val.id + '">' + val.item_name + '</option>';
        });
        html += '</select></td><td><input type="text" id="unit" name="unit[]" readonly="readonly" class="form-control units"></td><td><input type="quantity" name="quantity[]" class="form-control quantity-input"></td><td><input type="text" id="unit" name="unit[]" readonly="readonly" class="form-control units"></td><td><input type="quantity" name="quantity[]" class="form-control quantity-input"></td><td> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i> </button></td></tr></table>'
        divtest.innerHTML = html;
        objTo.appendChild(divtest)
    }
    $(document).on('submit', '#receive-material-request-form', function (e) {
        e.preventDefault();
        let form = $('#receive-material-request-form');
        var formData = new FormData(form[0]);
        formData.append('company', $('#company').val());
        jQuery.ajax({
            url: erp.config.base_url + 'ajax/save_material_receive.php',
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
    });

    //purchase bill entry code
    $(document).on('click', '.purchase-item-fields-list', function () {
        purchase_bill_item_fields();
    });

    function purchase_bill_item_fields() {
        room++;
        // var item_res = document.getElementById('itm');
        var objTo = document.getElementById('purchase_bill_item_fields');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "table table-bordered removeclass" + room);
        var rdiv = 'removeclass' + room;
        let html = '';
        html += '<table class="table table-bordered"><tr class="item-row-wrapper">';
        html += '<td><select data-row-id="' + room + '" class="form-control items" id="item" name="item[]">';
        html += '<option>Select Item</option>';
        jQuery.each(JSON.parse(erp.config.item_data), function (i, val) {
            html += '<option value="' + val.id + '">' + val.item_name + '</option>';
        });
        html += '</select></td><td><input type="text" id="unit" name="unit[]" readonly="readonly" class="form-control units"></td><td><input type="quantity" name="quantity[]" class="form-control quantity-input"></td><td><input type="text" name="rate[]" class="form-control rate"></td><td><input type="text" name="per[]" class="form-control per"></td><td><input type="text" name="basic_amt[]" class="form-control basic_amt"></td><td><input type="text" name="gst[]" class="form-control gst"></td><td><input type="text" name="gst_amt[]" class="form-control gst_amt"></td><td><input type="text" name="total[]" class="form-control total"></td><td> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i> </button></td></tr></table>'
        divtest.innerHTML = html;
        objTo.appendChild(divtest)
    };


    $(document).on('submit', '#purchase-bill-entry', function (e) {
        e.preventDefault();
        let form = $('#purchase-bill-entry');
        var formData = new FormData(form[0]);
        formData.append('company', $('#company').val());
        jQuery.ajax({
            url: erp.config.base_url + 'ajax/save_purchase_bill_entry.php',
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
    });


});