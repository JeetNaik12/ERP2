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
    $r_no = uniqid();
?> 
    <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-9">
                                    <h4 class="card-title">Request Quotation</h4>
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
                                              <form class="needs-validation request-quotation-form" id="request-quotation-form" novalidate>
                                              <div class="form-row">
                                                    <div class="form-group col-md-4">
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
                                                    <div class="form-group col-md-4">
                                                        <label for="name">Date</label>
                                                        <input type="date" id="date" class="form-control" name="date" placeholder="Name">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <div class="form-group">
                                                        <label for="email">R No</label>
                                                        <input type="email" class="form-control" readonly="readonly" id="r_no" name="r_no" disable placeholder="R No" value=<?php echo $r_no;?>>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="create_form">create From</label>
                                                        <input type="text" id="create_form" name="create_form" class="form-control" placeholder="create From">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                    <div class="form-group">
                                                            <label for="name">Supplier</label>
                                                            <select class="form-control" id="supplier_name" name="supplier_name">
                                                                <option>Select Supplier Name</option>
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
                                                </div>
                                                <div class="form-row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Description</h4>
                                                        </div>
                                                        <div class="table-responsive" id="req_item_fields">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">ITEM</th>
                                                                        <th scope="col">UNIT</th>
                                                                        <th scope="col">QUANTITY</th>
                                                                        <th scope="col">ACTION</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="item-row-wrapper">
                                                                        <td>
                                                                            <select class="form-control items" id="items" name="item[]" >
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
                                                                        <td><input type="text"  data-identifier="" name="quantity[]" class="form-control quantity-input"></td>
                                                                        <!-- <td><button class="btn btn-success incerement-item-fields" type="button" onclick="item_fields();"><i class="fa fa-plus"></i></button></td> -->
                                                                        <td><button class="btn btn-success incerement-req-item-fields" data1="xyz" type="button"><i class="fa fa-plus"></i></button></td>
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
                                                                <td><input type="email" class="form-control"></td>
                                                                <td><input type="text" id="total_qty" name="total_quentity" class="form-control"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                                
                                                
                                                <div class="form-row">
                                                <div class="form-group col-md-8">
                                                <label for="remark">Remark</label>
                                                <textarea class="form-control" rows="3" placeholder="Message" id="remark" name="remark"></textarea>
                                                </div>
                                                <div class="form-group col-md-4" >
                                                <button data-repeater-create="" class="btn btn-info waves-effect waves-light" style="margin:40px">Save & Send
                                                </button>
                                                </div>
                                                </div>
                                                <hr>                    
                                              </form>
                                            </div>
                                        </div>
                                        <button type="submit" data-repeater-create="" form="request-quotation-form" id="btn-request-quotation-form" style="float:right" class="btn btn-info waves-effect waves-light">
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