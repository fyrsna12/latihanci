<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <?= $this->session->flashdata('message'); ?>
            
            <div class="card-pro shadow-lg-pro mb-4 overflow-hidden">
                <!-- Profile Cover -->
                <div class="profile-cover"></div>
                
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="profile-avatar-container">
                                <img src="<?= base_url('assets/img/profile/') . $admin['image']; ?>" class="profile-avatar" alt="<?= $admin['name']; ?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3 px-4 pb-5">
                        <div class="col-md-12">
                            <h1 class="h2 font-weight-bold text-gray-900"><?= $admin['name']; ?></h1>
                            <p class="text-primary-pro font-weight-500 mb-4"><?= $admin['email']; ?></p>
                            
                            <hr>
                            
                            <div class="row mt-4">
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="stat-icon-bg bg-light text-primary-pro rounded-circle mr-3">
                                            <i class="fas fa-calendar-check"></i>
                                        </div>
                                        <div>
                                            <small class="text-uppercase text-gray-500 font-weight-bold">Member Since</small>
                                            <h5 class="font-weight-bold text-gray-800 mb-0"><?= date('d F Y', $admin['date_created']); ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="stat-icon-bg bg-light text-success rounded-circle mr-3">
                                            <i class="fas fa-user-shield"></i>
                                        </div>
                                        <div>
                                            <small class="text-uppercase text-gray-500 font-weight-bold">Status Account</small>
                                            <h5 class="font-weight-bold text-gray-800 mb-0">Active</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <a href="<?= base_url('admin/edit'); ?>" class="btn btn-primary-pro px-4">
                                    <i class="fas fa-user-edit mr-2"></i> Edit Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>