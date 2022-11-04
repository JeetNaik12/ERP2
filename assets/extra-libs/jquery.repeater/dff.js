var room = 1;

function education_fields() {

    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = '<div class="row"><div class="col-sm-2"><div class="form-group"><input type="text" class="form-control" id="partner_name" name="partner_name" placeholder="Partners Name"></div></div><div class="col-sm-2"><div class="form-group"><input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile"></div></div><div class="col-sm-2"><div class="form-group"><input type="text" class="form-control" id="email" name="email" placeholder="Email"></div></div><div class="col-sm-2"><div class="form-group"><input type="text" class="form-control" id="sher" name="sher[]" onchange="share_validate()" placeholder="Share"></div></div><div class="col-sm-2"><div class="form-group"><input type="text" class="form-control" id="pan" name="pan" placeholder="Pan No"></div><div class="form-group"><input type="file" class="form-control" id="pan_image" name="pan_image"></div></div><div class="col-sm-2"><div class="form-group"><input type="text" class="form-control" id="aadhar" name="aadhar" placeholder="Aadhar No"></div><div class="form-group"><input type="file" class="form-control" id="aadhar_image" name="aadhar_image"></div></div><div class="col-sm-2"><div class="form-group"> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i> </button> </div></div></div>';

    objTo.appendChild(divtest)
}

function remove_education_fields(rid) {
    $('.removeclass' + rid).remove();
}