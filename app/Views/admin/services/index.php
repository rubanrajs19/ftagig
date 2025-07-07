
<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<h4>All Services</h4>

<a href="<?= base_url('admin/services/create') ?>" class="btn btn-success btn-sm mb-2">Add New Service</a>

<?php if (!empty($services)): ?>
<table class="table table-bordered" id="servicesTable">
  <thead>
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Category</th>
      <th>Active</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($services as $svc): ?>
      <tr>
        <td><?= $svc['id'] ?></td>
        <td><?= esc($svc['title']) ?></td>
        <td><?= esc($categories[$svc['category_id']] ?? '-') ?></td>
        <td> <a href="<?= base_url("admin/services/toggle/{$svc['id']}") ?>" class="btn btn-sm btn-<?= $svc['is_active'] ? 'success' : 'secondary' ?>">
        <?= $svc['is_active'] ? '✅ Active' : '❌ In-Active' ?></td>
        <td>
          
           <a href="<?php echo base_url(); ?>admin/services/edit/<?= $svc['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="<?php echo base_url(); ?>admin/services/delete/<?= $svc['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this service?')">Delete</a>
          <a href="<?php echo base_url(); ?>admin/services/clone/<?= $svc['id'] ?>" class="btn btn-sm btn-info">Clone</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php else: ?>
  <div class="alert alert-info">No services found.</div>
<?php endif; ?>

<script>
    $(document).ready( function () {
        $('#servicesTable').DataTable();
    } );
</script>
<?= $this->endSection() ?>
