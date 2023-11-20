  <!-- /.content-wrapper -->

  <footer class="main-footer">

    <strong>Copyright &copy; 2022-2023 <a href="https://devspares.tech/uttopic/home/">Positiivplus</a>.</strong>

    All rights reserved.


  </footer>

  <!-- Control Sidebar -->

  <aside class="control-sidebar control-sidebar-dark">

    <!-- Control sidebar content goes here -->

  </aside>

  <!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->

<!-- jQuery -->

 <script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/jquery/jquery.min.js"></script> 

<!-- jQuery UI 1.11.4 -->

<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

 <script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Select2 JS --> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>

<script>
 //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  $.widget.bridge('uibutton', $.ui.button)

</script>

<!-- Bootstrap 4 -->

<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- ChartJS -->

<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/chart.js/Chart.min.js"></script>

<!-- Sparkline -->

<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/sparklines/sparkline.js"></script>

<!-- JQVMap -->

<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/jqvmap/jquery.vmap.min.js"></script>

<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<!-- jQuery Knob Chart -->

<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- daterangepicker -->

<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/moment/moment.min.js"></script>

<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->

<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Summernote -->

<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/summernote/summernote-bs4.min.js"></script>

<!-- overlayScrollbars -->

<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->

<script src="<?php echo base_url('public/admin/assets/'); ?>/dist/js/adminlte.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="<?php echo base_url('public/admin/assets/'); ?>/dist/js/demo.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="<?php echo base_url('public/admin/assets/'); ?>/dist/js/pages/dashboard.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<!--
<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>

<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>

<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
-->
<script>
$(document).ready( function () {
    $('#datatables').DataTable( {
"lengthMenu": [[100 , 50, 25], [ 100, 50, 25]]
});
} );
  $(function () {
    $("#datatables1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>

