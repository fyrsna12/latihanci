</div>
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Pennegransan Framework FSN 2025</span>
                </div>
            </div>
        </footer>

    </div>

</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script>

        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });




        $('.form-check-input').on('click', function() {
            const Idmenu = $(this).data('menu');
            const Idrole = $(this).data('role');

            $.ajax({
                url: "<?= base_url('admin/changeaccess'); ?>",
                type: 'post',
                data: {
                    Idmenu: Idmenu, 
                    Idrole: Idrole
                },
                success: function() {
                    document.location.href = "<?= base_url('admin/role_access'); ?>" + Idrole;
                }
            });
        });

</script>

</body>

</html>