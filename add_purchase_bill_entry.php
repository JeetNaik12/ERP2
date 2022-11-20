    <?php
    include("includes/header.php");
    require("DB/db.php");
    $item_array = array();
    $qry="Select * from tbl_item";
    $res=mysqli_query($con,$qry);
    while($row=mysqli_fetch_array($res)){
        $tmp_arr = array(
            'id' => $row['id'],
            'item_name' => $row['item_name']
        );
        array_push( $item_array,  $tmp_arr);
    }
    $m_r_no = uniqid('req');
?> 
   <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-9">
                                    <h4 class="card-title">Purchase Bill Entry (credit)</h4>
                                    </div>
                               
                                    <div class="col-sm-3" style="float:right;">
                                    <select class="form-control" id="company" name="company">
                                       <option>Select Company</option>
                                       <?php           
                            $qry="Select * from tbl_company";
                            $res=mysqli_query($con,$qry);	
                            while($row=mysqli_fetch_array($res)){
                            ?>                     
                             <option value=<?php echo $row['id'];?>><?php echo $row['company_name'];?></option>
                            <?php
                            }
                            ?>
                                    </select>
                             
                                    </div>
                                </div>
                                <br/>
                                    <div class="repeater-default m-t-30">
                                      <div data-repeater-list="">
                                            <div data-repeater-item="">
                                            <form class="needs-validation purchase-bill-entry" id="purchase-bill-entry" novalidate>

                                              <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <div class="form-group">
                                                            <label for="name">Project name</label>
                                                            <select class="form-control" id="project_name" name="project_name">
                                                                <option>Select Project Name</option>
                                                                <?php          
                                                        $qry="Select * from tbl_project";
                                                        $res=mysqli_query($con,$qry);	
                                                        while($row=mysqli_fetch_array($res)){
                                                        ?>                     
                                                        <option value=<?php echo $row['id'];?>><?php echo $row['project_name'];?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="name">Date</label>
                                                        <input type="date" placeholder="Name" id="date" class="form-control" name="date">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <div class="form-group">
                                                        <label for="r_no">R No</label>
                                                        <input type="text" class="form-control" disable placeholder="R No" id="r_no" name="r_no">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="email">Create From</label>
                                                        <input type="email" class="form-control" placeholder="Create From" id="create-form" name="create_form">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <div class="form-group">
                                                            <label for="name">Supllier</label>
                                                            <select class="form-control" id="supplier" name="supplier">
                                                                <option>Select Supllier</option>
                                                                <?php           
                                                                    $qry="Select * from tbl_supplier";
                                                                    $res=mysqli_query($con,$qry);	
                                                                    while($row=mysqli_fetch_array($res)){
                                                                    ?>                     
                                                                    <option value=<?php echo $row['id'];?>><?php echo $row['supplier_name'];?></option>
                                                                    <?php
                                                            }
                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="name">Company</label>
                                                        <select class="form-control" id="educationDate" name="educationDate">
                                                        <option>Select company</option>
                                                        <?php           
                            $qry="Select * from tbl_company";
                            $res=mysqli_query($con,$qry);	
                            while($row=mysqli_fetch_array($res)){
                            ?>                     
                             <option value=<?php echo $row['id'];?>><?php echo $row['company_name'];?></option>
                            <?php
                            }
                            ?>
                                                            </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <div class="form-group">
                                                        <label for="email">Sales Man</label>
                                                        <input type="email" class="form-control" disable placeholder="Sales Man" id="salesman" name="salesman">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="email">Terms</label>
                                                        <input type="email" class="form-control" placeholder="Advance Payment" id="terms" name="terms">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Description</h4>
                                                        </div>
                                                        <div class="table-responsive" id="purchase_bill_item_fields">
                                                        <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                    <th scope="col">ITEM</th>
                                                                        <th scope="col">UNIT</th>
                                                                        <th scope="col">QUANTITY</th>
                                                                        <th scope="col">RATE</th>
                                                                        <th scope="col">PER</th>
                                                                        <th scope="col">BASIC AMT</th>
                                                                        <th scope="col">GST %</th>
                                                                        <th scope="col">GST AMT</th>
                                                                        <th scope="col">TOTAL</th>
                                                                        <th scope="col">ACTION</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="item-row-wrapper">
                                                                    <td> 
                                                                        <select class="form-control items" id="item" data-row-id="0" name="item[]">
                                                                        <option>Select Item</option>
                                                                        <?php
                                                                                foreach($item_array as  $item){
                                                                                ?> 
                                                                                    <option value=<?php echo $item['id'];?>><?php echo $item['item_name'];?></option>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                        </select>
                                                                    </td>
                                                                    <td><input type="text" data-identifier="" id="unit" name="unit[]"  readonly="readonly" class="form-control units"></td>
                                                                        <td><input type="text"  data-identifier="" id="quantity" name="quantity[]" class="form-control quantity-input"></td>
                                                                        <td><input type="text" data-identifier="" id="rate" name="rate[]"  class="form-control rate"></td>
                                                                        <td><input type="text" data-identifier="" id="per" name="per[]"  class="form-control per"></td>
                                                                        <td><input type="text" data-identifier="" id="basic_amt" name="basic_amt[]"  class="form-control basic_amt"></td>
                                                                        <td><input type="text" data-identifier="" id="gst" name="gst[]"  class="form-control gst"></td>
                                                                        <td><input type="text" data-identifier="" id="gst_amt" name="gst_amt[]"  class="form-control gst_amt"></td>
                                                                        <td><input type="text" data-identifier="" id="total" name="total[]"   class="form-control total"></td>
                                                                        <!-- <td><button class="btn btn-success incerement-item-fields" type="button" onclick="item_fields();"><i class="fa fa-plus"></i></button></td> -->
                                                                        <td><button class="btn btn-success purchase-item-fields-list" type="button"><i class="fa fa-plus"></i></button></td>                                                                    </tr>
                                                                 <!-- <tr>
                                                                    <td scope="col">TOTAL</td>
                                                                    <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr> -->

                                                                </tbody>
                                                            </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>                    
                                                
                                                <hr>
                                                <div class="form-row">
                                                <div class="form-group col-md-2">
                                                <label for="other-charges">Other charges</label>
                                                <input type="text" class="form-control" rows="3" placeholder="" id="other-charges" name="other_charges">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="remark">Remark</label>
                                                <input type="text" class="form-control" rows="3" placeholder="" id="remark" name="other_charges_remark">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="on-value">On Value</label>
                                                <input type="text" class="form-control" rows="3" placeholder="" id="on-value" name="on-value">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="@-value">@</label>
                                                <input type="text" class="form-control" rows="3" placeholder="" id="@-value" name="@-value">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="increment-decrement-value">(+)(-)</label>
                                                <input type="text" class="form-control" rows="3" placeholder="" id="increment-decrement-value" name="increment-decrement-value">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="amount">Amount</label>
                                                <input type="text" class="form-control total_amount" rows="3" placeholder="" id="amount" name="amount">
                                                </div>
                                                </div>
                                                
                                        
                                                <div class="form-row">
                                                <div class="form-group col-md-2">
                                                <!-- <button data-repeater-create="" class="btn btn-info waves-effect waves-light" style="height:80px;margin:20px">Upload Bill</button> -->
                                                    <input type="file" class="form-control form-control-file"  name="bill_image" accept="image/png, image/gif, image/jpeg" />
                                                </div>
                                                <div class="form-group col-md-8">
                                                <label for="remark">Remark</label>
                                                <textarea type="text" class="form-control" rows="3" placeholder="" id="remark" name="remark"></textarea>
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="other-charge-2">Other charges total</label>
                                                <input type="text" class="form-control" rows="2" placeholder="" id="other-charge-2" name="other_charge_total">
                                                </div>
                                                </div>


                                                <div class="form-row">
                                                <div class="form-group col-md-10">
                                                <!-- <label for="msg">Remark</label> -->
                                                <!-- <textarea type="text" class="form-control" rows="3" placeholder=""></textarea> -->
                                                </div>
                                                <!-- <div class="form-group col-md-2"> <label for="msg">Total Bill Amount</label></div> -->
                                                <div class="form-group col-md-2">
                                                <label for="tot-bill-amt">Total Bill Amount</label>
                                                <input type="text" class="form-control" rows="3" placeholder="" id="tot-bill-amt" name="grand_total">
                                                </div>
                                                </div>

                                              </form>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" data-repeater-create="" form="purchase-bill-entry" id="btn-purchase-bill-entry" style="float:right" type="button" class="btn btn-info waves-effect waves-light">
                                    Save
                                </button>  
                                    </div>
                            </div>
                        </div>
                 </div>
            </div>
    </div>

    <?php
        include("includes/footer.php");
    ?>