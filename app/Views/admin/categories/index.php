<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<h4>Service Categories</h4>
<a href="<?= base_url('admin/categories/create') ?>" class="btn btn-success btn-sm mb-2">Add New Category</a>

<table class="table table-bordered" id="categoriesTable">
  <thead>
    <tr><th>ID</th><th>Name</th><th>Slug</th><th>Type</th><th>Actions</th></tr>
  </thead>
  <tbody>
    <?php foreach ($categories as $cat): ?>
      <tr>
        <td><?= $cat['id'] ?></td>
        <td><?= esc($cat['name']) ?></td>
        <td><?= esc($cat['slug']) ?></td>
        <td><?= esc($cat['type']) ?></td>
        <td>
         <a href="<?= base_url('admin/categories/edit/' . $cat['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
         <a href="<?= base_url('admin/categories/delete/' . $cat['id']) ?>" class="btn btn-sm btn-danger">Delete</a>

        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<script>
    $(document).ready( function () {
        $('#categoriesTable').DataTable();
    } );
</script>
<?= $this->endSection() ?>