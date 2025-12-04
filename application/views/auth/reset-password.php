<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Reset Password</h4>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url('user/changepassword'); ?>" method="post">
                        <div class="form-group">
                            <label for="password1">New Password</label>
                            <input type="password" class="form-control" id="password1" name="password1" required>
                        </div>
                        <div class="form-group">
                            <label for="password2">Confirm New Password</label>
                            <input type="password" class="form-control" id="password2" name="password2" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>