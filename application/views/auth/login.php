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

<body class="bg-white">

    <div class="container-fluid p-0">
        <!-- Outer Row -->
        <div class="row no-gutters h-100vh">
            
            <div class="col-lg-9 d-none d-lg-block bg-login-image" 
                 style="background: url('<?= base_url('assets/img/spmb_bg.jpg'); ?>') center / contain no-repeat, linear-gradient(180deg, #a2cfff 0%, #ffffff 50%, #d4a5ff 100%); min-height: 100vh;">
            </div>

            <!-- Right Side - Login Form -->
            <div class="col-lg-3 d-flex align-items-center min-vh-100" style="background: linear-gradient(180deg, #a2cfff 0%, #ffffff 50%, #d4a5ff 100%);">
                <div class="login-form-container w-100 mx-auto px-4">
                    
                    <div class="text-center mb-5">
                       <div class="sidebar-brand-icon rotate-n-15 text-primary-pro mb-3" style="font-size: 3rem;">
                            <i class="fas fa-laugh-wink"></i>
                        </div>
                        <h1 class="h3 text-gray-900 mb-2 font-weight-bold">Hi, Welcome to My School!</h1>
                        <p class="text-gray-500 mb-4">Enter your details to log in your account</p>
                    </div>
                    
                    <div class="mb-4">
                        <?= $this->session->flashdata('message'); ?>
                    </div>

                    <form class="user" method="post" action="<?= base_url('auth'); ?>">
                        <div class="form-group mb-4">
                            <label class="small text-gray-600 pl-2">Email Address</label>
                            <input type="email" class="form-control form-control-user-pro"
                                id="email" name="email" 
                                placeholder="name@example.com"
                                value="<?= set_value('email'); ?>"
                                style="border-radius: 10px; height: 50px;">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group mb-4">
                            <label class="small text-gray-600 pl-2">Password</label>
                            <input type="password" class="form-control form-control-user-pro"
                                id="password" name="password" placeholder="Min. 5 characters"
                                style="border-radius: 10px; height: 50px;">
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label text-gray-600" for="customCheck">Remember Me</label>
                                </div>
                                <a class="small font-weight-bold text-primary-pro" href="<?= base_url('user/forgotpassword'); ?>">Forgot Password?</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary-pro btn-block mt-4 mb-3" style="border-radius: 10px; height: 50px; font-weight: bold; font-size: 1rem;">
                            Log in
                        </button>
                    </form>
                    
                    <div class="text-center mt-4">
                         <span class="small text-gray-600">Or login using your account</span>
                        <div class="mt-3">
                             <a class="small text-primary-pro font-weight-bold" href="<?= base_url('auth/register'); ?>">Create an Account!</a>
                        </div>
                    </div>

                    <div class="text-center mt-5 text-gray-500 small">
                        <p class="mb-1">Some courses may allow guest access</p>
                        <a href="#" class="btn btn-outline-secondary btn-sm px-4" style="border-radius: 20px;">Access as a guest</a>
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