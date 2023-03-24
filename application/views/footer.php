  </div><!-- /.container-fluid -->
  </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
          <h5>Title</h5>
          <p>Sidebar content</p>
      </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
          Admin Panel
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014- <?= date('Y') ?> <a href="https://itdealbd.com">itdealbd.com</a>.</strong> All rights reserved.
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->


  <script>
      // init datatable
      $('#dataTable').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
          "responsive": true,
      });

      //  date picker
      $('#reservationdate').datetimepicker({
          format: 'L'
      });

      $('.select2').select2();

      $('#summernote').summernote();

      $("input[data-bootstrap-switch]").each(function() {
          $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })
  </script>

  </body>

  </html>