<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        
                        <form class="user row g-3 needs-validation" novalidate 
                              method="post" action="<?= base_url('user/registration')?>">
                            
                            <div class="col-12 mb-3">
                                <label for="name" class="form-label">Your name</label>
                                <input type="text" class="form-control form-control-user" id="name" name="name" required>
                                <div class="invalid-feedback">
                                    Please enter your name.
                                </div>
                            </div>
                            
                            <div class="col-12 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control form-control-user" id="email" name="email" required>
                                <div class="invalid-feedback">
                                    Please provide a valid email.
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="password1_input" class="form-label">Password</label>
                                <input type="password" class="form-control form-control-user" id="password1_input" name="password1" required>
                                <div class="invalid-feedback">
                                    Please enter a password.
                                </div>
                            </div>
                            
                            <div class="col-12 mb-3">
                                <label for="password2_input" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control form-control-user" id="password2_input" name="password2" required>
                                <div class="invalid-feedback">
                                    Please confirm your password.
                                </div>
                            </div>
                            
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Create Account
                                </button>
                            </div>
                        </form>
                        
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url(); ?>user">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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