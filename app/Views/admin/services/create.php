<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<h4>Create Service</h4>
<form method="post" action="<?= base_url('admin/services/create') ?>">
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control " required>
  </div>
  <div class="mb-3">
    <label class="form-label">Category</label>
    <select name="category_id" class="form-select select2">
      <?php foreach ($categories as $cat): ?>
        <option value="<?= $cat['id'] ?>"><?= esc($cat['name']) ?> (<?= esc($cat['type']) ?>)</option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control editor"></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Delivery Time</label>
    <input type="text" name="delivery_time" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Price</label>
    <input type="text" name="price" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Rating</label>
    <input type="text" name="rating" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Rating Count</label>
    <input type="number" name="rating_count" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Ideal For</label>
    <textarea name="ideal_for" class="form-control editor"></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Key Services (Features)</label>
    <textarea name="features" class="form-control editor"></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Button 1 Label</label>
    <input type="text" name="button_1_label" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Button 2 Label</label>
    <input type="text" name="button_2_label" class="form-control">
  </div>
  <button class="btn btn-primary">Save</button>
</form>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    $('.select2').select2();
  });
</script>
<?= $this->endSection() ?>