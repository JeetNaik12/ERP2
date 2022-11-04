<?php
    include("includes/header.php");
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
                                    <select class="form-control" id="educationDate" name="educationDate">
                                                                <option>Select Company</option>
                                                                <option value="2015">2015</option>
                                                            </select>
                                    </div>
                                </div>
                                <br/>
                                    <div class="repeater-default m-t-30">
                                      <div data-repeater-list="">
                                            <div data-repeater-item="">
                                              <form>
                                              <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <div class="form-group">
                                                            <label for="name">Project name</label>
                                                            <select class="form-control" id="educationDate" name="educationDate">
                                                                <option>Select Project Name</option>
                                                                <option value="2015">2015</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="name">Date</label>
                                                        <input type="date" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <div class="form-group">
                                                        <label for="email">M R No</label>
                                                        <input type="email" class="form-control" disable placeholder="R No">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="email">create From</label>
                                                        <input type="email" class="form-control" placeholder="create From">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <div class="form-group">
                                                            <label for="name">Supllier</label>
                                                            <select class="form-control" id="educationDate" name="educationDate">
                                                                <option>Select Supllier</option>
                                                                <option value="2015">2015</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="name">Company</label>
                                                        <select class="form-control" id="educationDate" name="educationDate">
                                                                <option>Select Company</option>
                                                                <option value="2015">2015</option>
                                                            </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <div class="form-group">
                                                        <label for="email">Sales Man</label>
                                                        <input type="email" class="form-control" disable placeholder="Sales Man">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                    <label class="custom-control custom-checkbox" style="margin-top: 30px;padding: 0 50px 0 50px;">
                                                            <input type="checkbox" class="custom-control-input">
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
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th rowspan="2" scope="col" style="text-align: center;vertical-align:middle">ITEM</th>
                                                                        <th colspan="2" scope="col" style="text-align: center;">ORDER</th>
                                                                        <th colspan="2" scope="col" style="text-align: center;">RECEIVED</th>
                                                                    </tr>
                                                                    <tr>
                                                                       <th scope="col">QNT & UNIT</th>
                                                                        <th scope="col">ALR ANT & QUANTITY</th>
                                                                        <th scope="col">QNT & UNIT</th>
                                                                        <th scope="col">ALR ANT & QUANTITY</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                    <td> 
                                                                        <select class="form-control" id="educationDate" name="educationDate">
                                                                        <option>Select Item</option>
                                                                        <option value="2015">2015</option>
                                                                        </select>
                                                                    </td>
                                                                        <td><input type="email" class="form-control"></td>
                                                                        <td><input type="email" class="form-control"></td>
                                                                        <td><input type="email" class="form-control"></td>
                                                                        <td><input type="email" class="form-control"></td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td> 
                                                                        <select class="form-control" id="educationDate" name="educationDate">
                                                                        <option>Item</option>
                                                                        <option value="2015">2015</option>
                                                                        </select>
                                                                    </td>
                                                                        <td><input type="email" class="form-control"></td>
                                                                        <td><input type="email" class="form-control"></td>
                                                                        <td><input type="email" class="form-control"></td>
                                                                        <td><input type="email" class="form-control"></td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td scope="col">TOTAL</td>
                                                                    <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>

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
                                                            <select class="form-control" id="educationDate" name="educationDate">
                                                                <option>Select transport Name</option>
                                                                <option value="2015">2015</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="name">G R No</label>
                                                        <input type="text" class="form-control" placeholder="G R No">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <div class="form-group">
                                                        <label for="email">Mator No</label>
                                                        <input type="email" class="form-control" disable placeholder="Mator No">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="email">Station</label>
                                                        <input type="email" class="form-control" placeholder="Station">
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