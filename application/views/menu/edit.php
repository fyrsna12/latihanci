<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <form action="<?= base_url('menu/edit/' . $menu['id_menu']); ?>" method="post">
                
                <input type="hidden" name="id_menu" value="<?= $menu['id_menu']; ?>">

                <div class="form-group">
                    <label for="menu">Nama Menu</label>
                    
                    <input type="text" 
                           class="form-control" 
                           id="menu" 
                           name="menu" 
                           placeholder="Nama Menu"
                           value="<?= $menu['menu']; ?>"> 
                </div>
                
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="<?= base_url('menu'); ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>

        </div>
    </div>
</div>