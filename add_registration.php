<?php include "includes/header.php"; ?>
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex no-block align-items-center">
                    <div>
                        <h4 class="card-title">REGISTRATION</h4>
                    </div>
                </div>
                <form class="form">
                    <div class="form-group mt-4 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Registration Type</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="carpet"
                                id="carpet">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-search-input" class="col-md-2 col-form-label">Area</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="570"
                                id="area">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-2 col-form-label">GR RATE IN PER SQ.FT</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="5800"
                                id="gr_rate">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-url-input" class="col-md-2 col-form-label">GR Total Value</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="3306000"
                                id="gr_total">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-tel-input" class="col-md-2 col-form-label">AGGREMENT VALUE</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="3306000"
                                id="aggrement_value">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stamp_duty"
                            class="col-md-2 col-form-label">STAMP DUTY %</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="231420"
                                id="stamp_duty">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="registration_p" class="col-md-2 col-form-label">REGISTRATION %</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="33060"
                                id="registration_p">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="legal_charges" class="col-md-2 col-form-label">LEGAL CHARGES</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text"
                                value="25000" id="legal_charges">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gst" class="col-md-2 col-form-label"><input type="checkbox" name="gst" checked> GST APPLICABLE %</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value=""
                                id="gst">
                        </div>
                    </div>
                </form>
                <div align="center">
                        <input type="button" class="btn btn-primary" name="quotation" value="Quotation"> 
                        <a href="charges.php"><input type="button" class="btn btn-primary" name="charges" value="Charges"></a> 
                    </div>  
            </div>
        </div>
    </div>
</div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
<?php include "includes/footer.php"; ?> 