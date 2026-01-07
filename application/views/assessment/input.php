<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            
            <div class="card-pro shadow-lg-pro mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Input Grade for: <?= $student['name']; ?> (<?= $student['class_name']; ?>)</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('assessment/input/') . $student['id_user']; ?>" method="post">
                        
                        <div class="form-group">
                            <label for="period">Academic Period</label>
                            <input type="text" class="form-control" id="period" name="period" value="Semester 1 2025/2026" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="aspect">Assessment Aspect</label>
                            <select class="form-control" id="aspect" name="aspect" required>
                                <option value="">Select Aspect</option>
                                <option value="Agama & Budi Pekerti">Agama & Budi Pekerti</option>
                                <option value="Jati Diri">Jati Diri</option>
                                <option value="Literasi & STEAM">Literasi & STEAM</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                             <label for="predicate">Predicate</label>
                             <select class="form-control" id="predicate" name="predicate" required>
                                 <option value="">Select Predicate</option>
                                 <option value="BB">BB (Belum Berkembang)</option>
                                 <option value="MB">MB (Mulai Berkembang)</option>
                                 <option value="BSH">BSH (Berkembang Sesuai Harapan)</option>
                                 <option value="BSB">BSB (Berkembang Sangat Baik)</option>
                             </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Save Assessment</button>
                        <a href="<?= base_url('assessment'); ?>" class="btn btn-secondary">Back</a>
                        
                    </form>
                </div>
            </div>
            
        </div>
    </div>

</div>
