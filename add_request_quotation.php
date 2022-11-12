    <?php
    include("includes/header.php");
    require("DB/db.php");
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
                                    <select class="form-control" id="educationDate" name="educationDate">
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
                                              <form>
                                              <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <div class="form-group">
                                                            <label for="name">Project name</label>
                                                            <select class="form-control" id="educationDate" name="educationDate">
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
                                                        <input type="date" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <div class="form-group">
                                                        <label for="email">R No</label>
                                                        <input type="email" class="form-control" disable placeholder="R No">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="email">create From</label>
                                                        <input type="email" class="form-control" placeholder="create From">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                    <div class="form-group">
                                                            <label for="name">Supplier</label>
                                                            <select class="form-control" id="educationDate" name="educationDate">
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
                                                                    <tr>
                                                                        <td>
                                                                            <select class="form-control items" id="item" name="item[]" >
                                                                                <option>Select Item</option>
                                                                                <?php          
                                                                                $qry="Select * from tbl_item";
                                                                                $res=mysqli_query($con,$qry);	
                                                                                while($row=mysqli_fetch_array($res)){
                                                                                ?> 
                                                                                <option value=<?php echo $row['id'];?>><?php echo $row['item_name'];?></option>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </td>
                                                                        <td><input type="unit" data-identifier="" id="unit" name="unit[]" disabled=true class="form-control"></td>
                                                                        <td><input type="quantity"  data-identifier="" name="quantity[]" class="form-control"></td>
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
                                                                <td><input type="email" class="form-control"></td>
                                                                <td><input type="email" class="form-control"></td>
                                                                <td><input type="email" class="form-control"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                                
                                                
                                                <div class="form-row">
                                                <div class="form-group col-md-8">
                                                <label for="msg">Remark</label>
                                                <textarea class="form-control" rows="3" placeholder="Message"></textarea>
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
                                        <button data-repeater-create="" style="float:right" class="btn btn-info waves-effect waves-light">Save
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