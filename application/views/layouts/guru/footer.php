</div>

<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Hak Cipta &copy; Kelompok 6 TA 2</span>
        </div>
    </div>
</footer>

</div>

</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keluar Aplikasi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin keluar dari aplikasi ini?
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                <a class="btn btn-danger" href="<?= base_url('auth/logout') ?>">Yakin</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>assetsAdmin/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assetsAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Datatables -->
<script src="<?= base_url() ?>assetsAdmin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assetsAdmin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assetsAdmin/js/demo/datatables-demo.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>assetsAdmin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>assetsAdmin/js/sb-admin-2.min.js"></script>
<script src="<?= base_url() ?>assetsAdmin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url() ?>assetsAdmin/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>assetsAdmin/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url() ?>assetsAdmin/js/demo/chart-pie-demo.js"></script>
</body>
<script>
    setTimeout(() => {
        $('.alert').fadeOut(1000);
    }, 3000);
</script>

</html>