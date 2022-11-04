<?php

include("includes/header.php");
?>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 col-12 align-self-center">
        <h3 class="text-themecolor mb-0">Dashboard</h3>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
    <div class="col-md-7 col-12 align-self-center d-none d-md-block">
        <div class="d-flex mt-2 justify-content-end">
            <div class="d-flex mr-3 ml-2">
                <div class="chart-text mr-2">
                    <h6 class="mb-0"><small>THIS MONTH</small></h6>
                    <h4 class="mt-0 text-info">$58,356</h4>
                </div>
                <div class="spark-chart">
                    <div id="monthchart"></div>
                </div>
            </div>
            <div class="d-flex ml-2">
                <div class="chart-text mr-2">
                    <h6 class="mb-0"><small>LAST MONTH</small></h6>
                    <h4 class="mt-0 text-primary">$48,356</h4>
                </div>
                <div class="spark-chart">
                    <div id="lastmonthchart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="card bg-inverse text-white">
                <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                        <a href=""><i class="display-6 cc ETH text-white" title="ETH"></i></a>
                        <div class="ml-3 mt-2">
                            <a href="">
                                <h4 class="font-weight-medium mb-0 text-white">Project</h4>
                                <!-- <h5 class="text-white">$3589.00k</h5> -->
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card bg-cyan text-white">
                <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                        <a href=""><i class="display-6 cc DASH-alt text-white" title="LTC"></i></a>
                        <div class="ml-3 mt-2">
                            <a href="">
                                <h4 class="font-weight-medium mb-0 text-white">Accounts</h4>
                                <!-- <h5 class="text-white">$900.00k</h5> -->
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card bg-orange text-white">
                <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                        <a href="../presales/home.php"><i class="display-6 cc BTC-alt text-white" title="BTC"></i></a>
                        <div class="ml-3 mt-2">
                            <a href="../presales/home.php">
                                <h4 class="font-weight-medium mb-0 text-white">PreSales</h4>
                                <!-- <h5 class="text-white">$284.50k</h5> -->
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                        <a href="../postsales/home.php"><i class="display-6 cc AMP-alt text-white" title="AMP"></i></a>
                        <div class="ml-3 mt-2">
                            <a href="../postsales/home.php">
                                <h4 class="font-weight-medium mb-0 text-white">PostSales</h4>
                                <!-- <h5 class="text-white">$650.80k</h5> -->
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Column -->
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex flex-wrap">
                                <div>
                                    <h3 class="card-title">Sales Overview</h3>
                                    <h6 class="card-subtitle">Ample Admin Vs Pixel Admin</h6>
                                </div>
                                <div class="ml-auto">
                                    <ul class="list-inline">
                                        <li class="list-inline-item px-2">
                                            <h6 class="text-success"><i class="fa fa-circle font-10 mr-2 "></i>Ample</h6>
                                        </li>
                                        <li class="list-inline-item px-2">
                                            <h6 class="text-info"><i class="fa fa-circle font-10 mr-2"></i>Pixel</h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="amp-pxl" style="height: 360px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Our Visitors </h3>
                    <h6 class="card-subtitle">Different Devices Used to Visit</h6>
                    <div id="visitor" style="height:290px; width:100%;"></div>
                </div>
                <div class="card-body text-center border-top">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item px-2">
                            <h6 class="text-info"><i class="fa fa-circle font-10 mr-2 "></i>Mobile</h6>
                        </li>
                        <li class="list-inline-item px-2">
                            <h6 class=" text-primary"><i class="fa fa-circle font-10 mr-2"></i>Desktop</h6>
                        </li>
                        <li class="list-inline-item px-2">
                            <h6 class=" text-success"><i class="fa fa-circle font-10 mr-2"></i>Tablet</h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<?php include("includes/footer.php"); ?>