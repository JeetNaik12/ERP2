   <!-- reapter -->
<script src="assets/libs/jquery.repeater/jquery.repeater.min.js"></script>
<script src="assets/extra-libs/jquery.repeater/repeater-init.js"></script>
<script src="assets/extra-libs/jquery.repeater/dff.js"></script>

<script>
    // javascript to disable button while submitting form 
    $(document).ready(function() {
        $('#myForm').on('submit', function(e) {
            e.preventDefault();
            $("#loading").show();
            $("#submit").hide();
            $(':input[type="submit"]').prop('disabled', true);
            this.submit();
        });
    });
    //javascript disable button while submitting form ends
</script>


   <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="dist/js/app.min.js"></script>
    <!-- <script>
    $(function() {
        "use strict";
        $("#main-wrapper").AdminSettings({
            Theme: <?= $theme; ?>,
            Layout: 'vertical',
            LogoBg: '<?= $logo_bg_color; ?>',
            NavbarBg: '<?= $navbar_bg_color; ?>',
            SidebarType: '<?= $sidebar_collapse; ?>',
            SidebarColor: '<?= $sidebar_bg_color; ?>',
            SidebarPosition: <?= $sidebar_fixed; ?>,
            HeaderPosition: <?= $header_fixed; ?>,
            BoxedLayout: <?= $boxed_layout; ?>,
        });
    });
   </script> -->

   <!-- for horizontal menu -->
    <script src="dist/js/app.init.horizontal.js"></script>
    <script src="dist/js/app-style-switcher.horizontal.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- chartist chart -->
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="assets/libs/d3/dist/d3.min.js"></script>
    <script src="assets/libs/c3/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="dist/js/pages/dashboards/dashboard1.js"></script>

    <!-- Datatable  -->
    <script src="assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="dist/js/pages/datatable/custom-datatable.js"></script>
    <script src="dist/js/pages/datatable/datatable-basic.init.js"></script>

    <!-- select -->
    <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="dist/js/pages/forms/select2/select2.init.js"></script>
    <script>
        var $select = $(".js-programmatic").select2();
        $(".js-programmatic-set-val").on("click", function() {
            $select.val("0").trigger("change");
        });
    </script>
    <script src="dist/js/erp_custom.js"></script>