<?php
    include("includes/header.php");
    require("DB/db.php");
    //include("function/function.php");
    // $conn = new mysqli('localhost', 'root', '', 'erp');
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
    $request_code = uniqid('req');
    ?>    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="card-title">Material Request</h4>
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
                        <br />
                        <div class="repeater-default m-t-30">
                            <form class="needs-validation material-request-form" id="material-request-form" novalidate>
                                <div data-repeater-list="">
                                    <div data-repeater-item="">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
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
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="name">Date</label>
                                                    <input type="date" id="date" class="form-control" name="date" placeholder="Name">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Request Type</label>
                                                        <select class="form-control" id="request_type" name="request_type">
                                                            <option>Select Request Type</option>
                                                            <option value="Argent">Argent</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="request_code">Request Code</label>
                                                    <input type="text" class="form-control" readonly="readonly" id="request_code" name="request_code" value=<?php echo $request_code;?> placeholder="Request Code">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="department">Department</label>
                                                    <input type="text" class="form-control" name="department" id="department" placeholder="Department">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="request_name">Request Name</label>
                                                    <input type="text" class="form-control"  name="request_name" id="request_name" placeholder="Request Name">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-8">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Description</h4>
                                                        </div>
                                                        <div class="table-responsive" id="item_fields">
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
                                                                        <td><input type="unit" data-identifier="" id="unit" name="unit[]"  readonly="readonly" class="form-control units"></td>
                                                                        <td><input type="quantity"  data-identifier="" name="quantity[]" class="form-control quantity-input"></td>
                                                                        <!-- <td><button class="btn btn-success incerement-item-fields" type="button" onclick="item_fields();"><i class="fa fa-plus"></i></button></td> -->
                                                                        <td><button class="btn btn-success incerement-item-fields" data1="xyz" type="button"><i class="fa fa-plus"></i></button></td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td>TOTAL</td>
                                                                <td><input type="text" id="total_qty" name="total_quentity" class="form-control"></td>
                                                                <td><input type="email" class="form-control"></td>
                                                                <td><input type="email" class="form-control"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Show Available Quantity</h4>
                                                            <!-- <h6 class="card-subtitle">Add <code>.table-bordered</code> for borders on all sides of the table and cells.</h6> -->
                                                        </div>
                                                        <div class="table-responsive" id="show_qnt_fields">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">UNIT</th>
                                                                        <th scope="col">QUANTITY</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="item-row-wrapper">
                                                                        <td><input type="text" id="show_unit_0" readonly="readonly" name="units2[]" class="form-control show_units"></td>
                                                                        <td><input type="text" id="show_qnt_0" readonly="readonly" name="qty2[]" class="form-control show_qnts"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </form>
                                    </div>
                                </div>
                                <button type="submit" data-repeater-create="" form="material-request-form" id="btn-material-request" style="float:right" type="button" class="btn btn-info waves-effect waves-light">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                                                                
    <?php
    include("includes/footer.php");
    ?>