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
                                    <h4 class="card-title">Material Received</h4>
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
                                              <form class="needs-validation receive-material-request-form" id="receive-material-request-form" novalidate>
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
                                                        <input type="date" id="date" class="form-control" name="date" placeholder="Name">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <div class="form-group">
                                                        <label for="email">M R No</label>
                                                        <input type="email" class="form-control" id="m_r_no" name="m_r_no" readonly="readonly" disable placeholder="R No">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="email">create From</label>
                                                        <input type="email" class="form-control" id="create-form" name="create-form" placeholder="create From">
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
                                                        <input type="email" class="form-control" placeholder="Sales Man" id="salesman" name="salesman">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                    <label class="custom-control custom-checkbox" style="margin-top: 30px;padding: 0 50px 0 50px;">
                                                            <input type="checkbox" class="custom-control-input" id="with-bill" name="with-bill">
                                                                <span class="custom-control-label">With Bill</span>
                                                        </label>
                                                        <!-- <label for="email">Terms</label>
                                                        <input type="checkbox" class="form-control" placeholder="Advance Payment"> -->
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Description</h4>
                                                        </div>
                                                        <div class="table-responsive" id="receive-item_fields">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th rowspan="2" scope="col" style="text-align: center;vertical-align:middle">ITEM</th>
                                                                        <th colspan="2" scope="col" style="text-align: center;">ORDER</th>
                                                                        <th colspan="2" scope="col" style="text-align: center;">RECEIVED</th>
                                                                        <th rowspan="2" scope="col" style="text-align: center;vertical-align:middle">ACTION</th>
                                                                    </tr>
                                                                    <tr>
                                                                       <th scope="col">UNIT</th>
                                                                        <th scope="col">QUANTITY</th>
                                                                        <th scope="col">UNIT</th>
                                                                        <th scope="col">QUANTITY</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                    <td> 
                                                                        <select class="form-control" id="item" data-row-id="0" name="item[]">
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
                                                                        <td><input type="text" data-identifier="" id="unit" name="unit[]"  readonly="readonly" class="form-control units"></td>
                                                                        <td><input type="text"  data-identifier="" name="quantity[]" class="form-control quantity-input"></td>
                                                                        <td><button class="btn btn-success incerement-material-item-fields" type="button"><i class="fa fa-plus"></i></button></td>
                                                                    </tr>
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
                                                <div class="form-group col-md-3">
                                                        <div class="form-group">
                                                            <label for="name">Transport name</label>
                                                            <select class="form-control" id="transport-name" name="transport-name">
                                                                <option>Select transport Name</option>
                                                                <option value="2015">2015</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="g-r-no">G R No</label>
                                                        <input type="text" class="form-control" placeholder="G R No" id="g-r-no" name="g-r-no">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <div class="form-group">
                                                        <label for="mator-no">Mator No</label>
                                                        <input type="text" class="form-control" disable placeholder="Mator No" id="mator-no" name="mator-no">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="station">Station</label>
                                                        <input type="text" class="form-control" placeholder="Station" id="station" name="station">
                                                    </div>                                             
                                               </div>  
                                               
                                               
                                               <div class="form-row">
                                                <div class="form-group col-md-8">
                                                <label for="msg">Remark</label>
                                                <textarea class="form-control" rows="3" placeholder="Message"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                <button data-repeater-create="" class="btn btn-info waves-effect waves-light" style="margin:40px">Upload Challan
                                                </button>
                                                </div>
                                                </div>
                                                <hr>
                                                <hr>    
                                              </form>
                                            </div>
                                        </div>
                                        <button type="submit" data-repeater-create="" form="receive-material-request-form" id="btn-receive-material-request-form" style="float:right" type="button" class="btn btn-info waves-effect waves-light">
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