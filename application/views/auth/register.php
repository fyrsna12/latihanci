<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register - <?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/');?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background: linear-gradient(180deg, #4e73df 0%, #224abe 100%); min-height: 100vh;">

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        
                        <?= $this->session->flashdata('message'); ?>
                        
                        <form class="user row g-3 needs-validation" novalidate 
                              method="post" action="<?= base_url('user/registration')?>">
                            
                            <div class="col-12 mb-3">
                                <label for="name" class="form-label">Your name</label>
                                <input type="text" class="form-control form-control-user" id="name" name="name" 
                                       value="<?= set_value('name'); ?>" required>
                                <div class="invalid-feedback">
                                    Please enter your name.
                                </div>
                                <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            
                            <div class="col-12 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control form-control-user" id="email" name="email" 
                                       value="<?= set_value('email'); ?>" required>
                                <div class="invalid-feedback">
                                    Please provide a valid email.
                                </div>
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="password1_input" class="form-label">Password</label>
                                <input type="password" class="form-control form-control-user" id="password1_input" name="password1" required>
                                <div class="invalid-feedback">
                                    Please enter a password.
                                </div>
                                <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            
                            <div class="col-12 mb-3">
                                <label for="password2_input" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control form-control-user" id="password2_input" name="password2" required>
                                <div class="invalid-feedback">
                                    Please confirm your password.
                                </div>
                                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Create Account
                                </button>
                            </div>
                        </form>
                        
                        <div class="text-center">
                            <a class="small" href="<?= base_url('user/forgotpassword'); ?>">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('user'); ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/');?>js/sb-admin-2.min.js"></script>

<script>
(() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
    })
})()
</script>

</body>
</html>