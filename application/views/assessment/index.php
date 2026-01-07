<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    
    <div class="card-pro shadow-lg-pro mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of Students</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Age</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($students as $s) : ?>
                        <?php
                            $age_string = '-';
                            if ($s['date_of_birth']) {
                                try {
                                    $dob = new DateTime($s['date_of_birth']);
                                    $now = new DateTime();
                                    $diff = $now->diff($dob);
                                    $age_string = $diff->y . " Years " . $diff->m . " Months";
                                } catch (Exception $e) {
                                    $age_string = '-';
                                }
                            }
                        ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td>
                                <img src="<?= base_url('assets/img/profile/') . $s['image']; ?>" class="rounded-circle mr-2" width="30">
                                <?= $s['name']; ?>
                            </td>
                            <td><?= $s['class_name'] ? $s['class_name'] : '-'; ?></td>
                            <td><?= $s['date_of_birth'] ? $age_string : '-'; ?></td>
                            <td>
                                <a href="<?= base_url('assessment/input/') . $s['id_user']; ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Input Nilai
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
