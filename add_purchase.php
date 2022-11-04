<?php 
include "includes/header.php";

$po_number = "PO".date('Y').date('d').rand(10,100);
//sprintd();
?>

<div class="container-fluid">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card card-body">
                    <div class="d-flex flex-row justify-content-between mb-4 " style="padding:5px;     background: aliceblue;">
                        <h3 class="mb-0">Add Project</h3>
                        <div class="form-group">
                                <select class="select2 form-control custom-select" style="width: 100%; height:96px;" id="company_id" name="company_id">
                                    <option value="">--Select Company-- </option>
                                    <?php
                                    $qry1 = mysqli_query($mysqli, "SELECT * FROM tbl_company order by id DESC");
                                    while ($row1 = mysqli_fetch_array($qry1)) {
                                    ?>
                                        <option value="<?php echo $row1['id']; ?>" <?php if ($row1['id'] == $res['company_id']) { ?>selected<?php } ?>><?php echo $row1['company_name']; ?></option>
                                    <?php
                                    } ?>
                                </select>
                            </div>
                    </div>
                    <div class="row">

                        <div class="col-md-3 col-xs-12">
                                    <div class="form-group">
                                        <label for="project_id">Project</label><br>
                                        <select class="select2 form-control custom-select" id="project_id" name="project_id" onchange="tabPhase(this.value);" required>
                                            <option value="">--Select Project-- </option>
                                            <?php
                                            $qry1 = mysqli_query($mysqli, "SELECT * FROM tbl_project order by id DESC");
                                            while ($row1 = mysqli_fetch_array($qry1)) {
                                            ?>
                                                <option value="<?php echo $row1['id']; ?>" <?php if ($row1['id'] == $row_ac[2]) { ?>selected<?php } ?>><?php echo $row1['project_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                        </div>

                        <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date"  class="form-control" name="date" id="date">        
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="po_number">P.O. Number</label>
                                <input type="text"  class="form-control" name="po_number" id="po_number" value="<?= $po_number; ?>"  disabled>        
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="create_form">Create Form</label>
                                <select class="form-control" name="create_form" id="create_form">
                                    <option>--Select --</option>
                                    <option value="New Order">New Order</option>
                                    <option value="Agents Quotation" >Agents Quotation</option>
                                </select>        
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="supplier">Supplier</label>
                                <input type="text"  class="form-control" name="supplier" id="supplier" >        
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input type="text"  class="form-control" name="company" id="company" >        
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="sales_man">Sales Man</label>
                                <input type="text"  class="form-control" name="sales_man" id="sales_man" >        
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="terms">Terms</label>
                                <select class="form-control" name="terms" id="terms">
                                    <option>--Select Terms--</option>
                                    <option value="Advance Cheque">Advance Cheque</option>
                                    <option value="Payment On Delivery" >Payment On Delivery</option>
                                    <option value=">Pay On Days">Pay On Days</option>
                                    <option value="Advance Payment" >Advance Payment</option>
                                </select>        
                            </div>
                        </div>

                    </div>
                </div>
            </div>
                
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="mainTable"
                                        class="table editable-table table-bordered table-striped m-b-0">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Qnt & Unit</th>
                                                <th>Alt Qnt & Unit</th>
                                                <th>Rate</th>
                                                <th>Per</th>
                                                <th>Basic Amt</th>
                                                <th>GST%</th>
                                                <th>GST Amt</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th ><strong>TOTAL</strong></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                <div class="card card-body">
                    <div class="row">

                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="note">Note</label>
                                <textarea class="textarea form-control" name="note" id="note" ></textarea>       
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="note_for_company">Note(company ref)</label>
                                <textarea class="textarea form-control" name="note_for_company" id="note_for_company" ></textarea>       
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="revicer_name">Reciver's Name</label>
                                <input type="text"  class="form-control" name="revicer_name" id="revicer_name" >        
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="contact">Contact No</label>
                                <input type="number"  class="form-control" name="contact" id="contact" >        
                            </div>
                        </div>

                    </div>
                </div>
            </div>
           
        </div>
        <div class="col-md-12 col-xs-12">
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success waves-effect waves-light mr-2">Submit</button>
                <?php if (!isset($_GET['edit_id'])) { ?><button type="submit" name="save&next" class="btn btn-success waves-effect waves-light mr-2">Save & Next</button><?php } ?>
            </div>
        </div>
        
    </form>
</div>

<?php include "includes/footer.php"; ?>