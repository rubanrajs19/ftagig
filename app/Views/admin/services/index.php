
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
      <th>Category ID</th>
      <th>Price</th>
      <th>Rating</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($services as $svc): ?>
      <tr>
        <td><?= esc($svc['id']) ?></td>
        <td><?= esc($svc['title']) ?></td>
        <td><?= esc($svc['category_id']) ?></td>
        <td>₹<?= number_format($svc['price'], 2) ?></td>
        <td><?= esc($svc['rating']) ?></td>
        <td>
          <a href="<?= base_url('admin/services/edit/' . $svc['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="<?= base_url('admin/services/delete/' . $svc['id']) ?>" class="btn btn-danger btn-sm">Delete</a>
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
