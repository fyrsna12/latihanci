<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - <?= $title; ?></title> <!-- Dynamic title -->

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
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-9">
            
                <!-- Flash Message -->
                <div class="my-4">
                    <?= $this->session->flashdata('message'); ?>
                </div>
                
                <div class="card-pro login-card animated--grow-in">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <div class="sidebar-brand-icon rotate-n-15 text-primary-pro mb-3" style="font-size: 3rem;">
                                <i class="fas fa-laugh-wink"></i>
                            </div>
                            <h1 class="h3 text-gray-900 mb-2">Welcome Back!</h1>
                            <p class="text-gray-600 mb-4">Please login to your account</p>
                        </div>
                        
                        <form class="user" method="post" action="<?= base_url('auth/login'); ?>">
                            <div class="form-group mb-4">
                                <label class="small text-gray-600 pl-3">Email Address</label>
                                <input type="email" class="form-control form-control-user-pro"
                                    id="email" name="email" 
                                    placeholder="name@example.com"
                                    value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-4">
                                <label class="small text-gray-600 pl-3">Password</label>
                                <input type="password" class="form-control form-control-user-pro"
                                    id="password" name="password" placeholder="Min. 5 characters">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small pl-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label text-gray-600" for="customCheck">Remember Me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary-pro btn-user btn-block mt-4 mb-3">
                                Login
                            </button>
                        </form>
                        
                        <div class="text-center mt-4">
                            <a class="small text-gray-500" href="<?= base_url('user/forgotpassword'); ?>">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small text-primary-pro font-weight-bold" href="<?= base_url('user/register'); ?>">Create an Account!</a>
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

</body>
</html>