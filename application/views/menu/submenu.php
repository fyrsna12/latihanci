<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <div class="row">
       <div class="col-lg">
       <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

       <?= $this->session->flashdata('message'); ?>

        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">
        Add New Submenu
        </a>

        

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Url</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
<tbody>
    <?php $i = 1; ?>
    <?php foreach ($subMenu as $sm) : ?>
    <tr>
        <th scope="row"><?= $i; ?></th>
        <td><?= $sm['title']; ?></td>
        <td>
            <?php 
            if(isset($sm['menu'])) {
                echo $sm['menu'];
            } else {
                $menuNames = [
                    1 => 'Admin',
                    2 => 'User',
                    3 => 'Menu'
                ];
                echo isset($menuNames[$sm['menu_id']]) ? $menuNames[$sm['menu_id']] : $sm['menu_id'];
            }
            ?>
        </td>
        <td><?= $sm['url']; ?></td>
        <td><?= $sm['icon']; ?></td>
        <td><?= $sm['is_active']; ?></td> 
        <td>
            <a href="" class="badge badge-success">edit</a>
            <a href="" class="badge badge-danger">delete</a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</tbody>
        </table>
       </div>
   </div>

</div>

</div>


<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="newMenuModalLabel">Add New Menu</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
       </button>
      </div>
      <form action="<?= base_url('menu'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
             <input type="text" class="form-control form-control-user" 
             id="menu" name="menu" placeholder="Menu name">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
