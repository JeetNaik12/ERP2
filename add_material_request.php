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
                                <h4 class="card-title">Material Request</h4>
                            </div>

                            <div class="col-sm-3" style="float:right;">
                                <select class="form-control" id="company" name="company">
                                    <option>Select Company</option>
                                    <option value="2015" >2015</option>
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
                                                            <option>Select Project Name</option>
                                                            <option value="2015">2015</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="name">Date</label>
                                                    <input type="date" class="form-control" name="date" placeholder="Name">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Request Type</label>
                                                        <select class="form-control" id="request_type" name="request_type">
                                                            <option>Select Request Type</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2018">2018</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="email">Request Code</label>
                                                    <input type="email" class="form-control" name="request_code" placeholder="Request Code">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="pwd">Department</label>
                                                    <input type="text" class="form-control" name="department" id="pwd" placeholder="Department">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="msg">Request Name</label>
                                                    <input type="text" class="form-control"  name="name" id="pwd" placeholder="Request Name">
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
                                                                    <tr>
                                                                        <td>
                                                                            <select class="form-control" id="item" name="item[]" name="educationDate">
                                                                                <option>Select Item</option>
                                                                                <option value="2015">2015</option>
                                                                            </select>
                                                                        </td>
                                                                        <td><input type="unit" name="unit[]" disabled=true class="form-control"></td>
                                                                        <td><input type="quantity" name="quantity[]" class="form-control"></td>
                                                                        <td><button class="btn btn-success incerement-item-fields" type="button" onclick="item_fields();"><i class="fa fa-plus"></i></button></td>
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
                                                                    <tr>
                                                                        <td><input type="email" class="form-control"></td>
                                                                        <td><input type="email" class="form-control"></td>
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