<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ingin Keluar?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Pilih <span class="text-danger"><strong>Keluar</strong></span> untuk menghapus sesi</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="<?php echo site_url() ?>login/logout" class="btn btn-danger">Keluar</a>
            </div>
        </div>
    </div>
</div>

</div>
<!-- [ Main Content ] end -->
</div>
</div>

<footer class="sticky-footer bg-white py-3">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; <a href="<?php echo site_url('/') ?>">Computer Cyber Study Club</a> 2019</span>
        </div>
    </div>
</footer>

<script>
    $(document).ready(function() {
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    });
</script>

<!-- <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery-1.10.2.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/assets/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.metisMenu.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>

    <script src="<?php echo base_url() ?>assets/admin/assets/js/custom.js"></script>
    
   
</body>
</html> -->

<!-- 
<script src="<?php echo base_url() ?>assets/admin/assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url() ?>assets/admin/assets/js/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/admin/assets/js/dataTables/dataTables.bootstrap.js"></script> -->




<!-- Page level plugins -->
<!-- 
<script src="<?php echo base_url('assets'); ?>/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/datatables/dataTables.bootstrap4.min.js"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="<?php echo base_url('assets'); ?>/datatables/datatables-demo.js"></script> -->


<!-- General JS Scripts -->
<script src="<?php echo base_url('assets'); ?>/admin_v2/assets/js/popper.min.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->


<!-- SweetALert -->
<script src="<?php echo base_url(); ?>assets/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url(); ?>assets/sweetalert/myscript.js"></script>

<!-- Required Js -->
<script src="<?php echo base_url('assets'); ?>/admin_v2/assets/js/vendor-all.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/admin_v2/assets/js/plugins/bootstrap.min.js"></script>
<script src="<?php echo base_url() . 'assets/jquery-ui/jquery-ui.min.js'; ?>"></script>
<script src="<?php echo base_url('assets'); ?>/admin_v2/assets/js/pcoded.min.js"></script>
<!-- <script src="<?php echo base_url('assets'); ?>/admin_v2/assets/js/plugins/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/admin_v2/assets/js/plugins/bootstrap-maxlength.js"></script> -->
<!-- <script src="<?php echo base_url('assets'); ?>/admin_v2/assets/js/plugins/form-advance-custom.js"></script> -->

<!-- Apex Chart -->
<!-- <script src="<?php echo base_url('assets'); ?>/admin_v2/assets/js/plugins/apexcharts.min.js"></script> -->


<!-- custom-chart js -->
<!-- <script src="<?php echo base_url('assets'); ?>/admin_v2/assets/js/pages/dashboard-main.js"></script> -->

<!-- datatables -->
<script src="<?php echo base_url('assets'); ?>/admin_v2/assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/admin_v2/assets/js/plugins/dataTables.bootstrap4.min.js"></script>

<!-- select2 -->
<script src="<?php echo base_url('assets'); ?>/admin_v2/assets/js/plugins/select2.full.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/admin_v2/assets/js/pages/form-select-custom.js"></script>



</body>

</html>