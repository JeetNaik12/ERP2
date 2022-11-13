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
?>
   <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-9">
                                    <h4 class="card-title">Purchase Order</h4>
                                    </div>
                               
                                    <div class="col-sm-3" style="float:right;">
                                    <select class="form-control" id="company" name="company">
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
                                </div>
                                <br/>
                                    <div class="repeater-default m-t-30">
                                    <form class="needs-validation incerement-order-item-fields" id="incerement-order-item-fields" novalidate>
                                      <div data-repeater-list="">
                                            <div data-repeater-item="">
                                              <form>
                                              <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <div class="form-group">
                                                            <label for="name">Project name</label>
                                                            <select class="form-control" id="project_name" name="project_name">
                                                            <option>Select project</option>    
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
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="name">Date</label>
                                                        <input type="date" id="date" class="form-control" name="date" placeholder="Name">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <div class="form-group">
                                                        <label for="email">R No</label>
                                                        <input type="email" id="r_no" class="form-control" name="r_no" disable placeholder="R No">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="create-form">create From</label>
                                                        <input type="text" class="form-control" id="create-form" name="create-form" placeholder="create From">
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
                            ?>                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="name">Company</label>
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
                                                    <div class="form-group col-md-3">
                                                        <div class="form-group">
                                                        <label for="email">Sales Man</label>
                                                        <input type="email" class="form-control" id="sales-man" name="sales-man" disable placeholder="Sales Man">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="email">Terms</label>
                                                        <input type="email" class="form-control" id="terms" name="terms" placeholder="Advance Payment">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Description</h4>
                                                        </div>
                                                        <div class="table-responsive" id="purchase_order_item_fields">
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
                                                                            <select class="form-control items" id="item" data-row-id="0" name="item[]" >
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
                                                                        <td><button class="btn btn-success incerement-order-item-fields-list" type="button"><i class="fa fa-plus"></i></button></td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td>TOTAL</td>
                                                                <td><input type="email" class="form-control"></td>
                                                                <td><input type="text" id="total_qty" name="total_quentity" class="form-control"></td>
                                                                <td><input type="email" class="form-control"></td>
                                                                <td><input type="text" id="basic-amt-total" name="basic-amt-total   " class="form-control"></td>
                                                                <td><input type="email" class="form-control"></td>
                                                                <td><input type="email" class="form-control"></td>
                                                                <td><input type="email" class="form-control"></td>
                                                                <td><input type="email" class="form-control"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    </div>

                                                </div>                    
                                                
                                                <hr>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                <label for="msg">NOTE</label>
                                                <textarea class="form-control" rows="3" id="note" name="note" placeholder="Message"></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label for="msg">NOTE(COMPANY REF)</label>
                                                <textarea class="form-control" rows="3" id="note_company" name="note_company" placeholder="Message"></textarea>
                                                </div>
                                                </div>
                                                <hr>
                                                <hr>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                <label for="receiver_name">Receiver Name</label>
                                                <input type="text" class="form-control" id="receiver_name" name="receiver_name" rows="3" placeholder="Receiver Name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label for="contact_no">Contact No</label>
                                                <input type="text" class="form-control" rows="3" id="contact_no" name="contact_no" placeholder="Contact No">
                                                </div>
                                                </div>           
                                              </form>
                                            </div>
                                        </div>
                                        <button type="submit" data-repeater-create="" form="incerement-order-item-fields" id="btn-incerement-order-item-fields" style="float:right" type="button" class="btn btn-info waves-effect waves-light">
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