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
                                    <h4 class="card-title">Purchase Bill Entry (credit)</h4>
                                    </div>
                               
                                    <div class="col-sm-3" style="float:right;">
                                    <select class="form-control" id="educationDate" name="educationDate">
                                                                <option>Select</option>
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
                                                        <label for="email">R No</label>
                                                        <input type="email" class="form-control" disable placeholder="R No">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="email">Create From</label>
                                                        <input type="email" class="form-control" placeholder="Create From">
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
                                                        <label for="email">Terms</label>
                                                        <input type="email" class="form-control" placeholder="Advance Payment">
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
                                                                        <th scope="col">ITEM</th>
                                                                        <th scope="col">QNT & UNIT</th>
                                                                        <th scope="col">ALR ANT & QUANTITY</th>
                                                                        <th scope="col">RATE</th>
                                                                        <th scope="col">PER</th>
                                                                        <th scope="col">BASIC AMT</th>
                                                                        <th scope="col">GST %</th>
                                                                        <th scope="col">GST AMT</th>
                                                                        <th scope="col">TOTAL</th>   
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
                                                <div class="form-group col-md-2">
                                                <label for="msg">Other charges</label>
                                                <input type="text" class="form-control" rows="3" placeholder="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="msg">Remark</label>
                                                <input type="text" class="form-control" rows="3" placeholder="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="msg">On Value</label>
                                                <input type="text" class="form-control" rows="3" placeholder="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="msg">@</label>
                                                <input type="text" class="form-control" rows="3" placeholder="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="msg">(+)(-)</label>
                                                <input type="text" class="form-control" rows="3" placeholder="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="msg">Amount</label>
                                                <input type="text" class="form-control" rows="3" placeholder="">
                                                </div>
                                                </div>
                                                
                                        
                                                <div class="form-row">
                                                <div class="form-group col-md-2">
                                                <button data-repeater-create="" class="btn btn-info waves-effect waves-light" style="height:80px;margin:20px">Upload Bill</button>
                                                </div>
                                                <div class="form-group col-md-8">
                                                <label for="msg">Remark</label>
                                                <textarea type="text" class="form-control" rows="3" placeholder=""></textarea>
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="msg">Other charges total</label>
                                                <input type="text" class="form-control" rows="2" placeholder="">
                                                </div>
                                                </div>


                                                <div class="form-row">
                                                <div class="form-group col-md-10">
                                                <!-- <label for="msg">Remark</label> -->
                                                <!-- <textarea type="text" class="form-control" rows="3" placeholder=""></textarea> -->
                                                </div>
                                                <!-- <div class="form-group col-md-2"> <label for="msg">Total Bill Amount</label></div> -->
                                                <div class="form-group col-md-2">
                                                <label for="msg">Total Bill Amount</label>
                                                <input type="text" class="form-control" rows="3" placeholder="">
                                                </div>
                                                </div>

                                              </form>
                                            </div>
                                        </div>
                                        <hr>
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