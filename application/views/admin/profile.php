<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
      <div class="col-lg-8">
        <?= $this->session->flashdata('message'); ?>
      </div>
    </div>

    <div class="card mb-3 col-lg-8">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $admin['image']; ?>" class="img-fluid rounded-start" alt="Profile Image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $admin['name']; ?></h5>
                    <p class="card-text"><?= $admin['email']; ?></p>
                    <p class="card-text"><small class="text-body-secondary">Member Since <?= date('d F Y', $admin['date_created']); ?></small></p>

                </div>
            </div>
        </div>
    </div>

</div>