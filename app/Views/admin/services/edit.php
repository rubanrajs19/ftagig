<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<h4>Edit Service</h4>
<form method="post" action="<?= base_url('admin/services/edit/' . $service['id']) ?>">
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control" value="<?= esc($service['title']) ?>" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Category</label>
    <select name="category_id" class="form-select">
      <?php foreach ($categories as $cat): ?>
        <option value="<?= $cat['id'] ?>" <?= $service['category_id'] == $cat['id'] ? 'selected' : '' ?>><?= esc($cat['name']) ?> (<?= esc($cat['type']) ?>)</option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control editor"><?= esc($service['description']) ?></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Delivery Time</label>
    <input type="text" name="delivery_time" class="form-control" value="<?= esc($service['delivery_time']) ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Price</label>
    <input type="text" name="price" class="form-control" value="<?= esc($service['price']) ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Rating</label>
    <input type="text" name="rating" class="form-control" value="<?= esc($service['rating']) ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Rating Count</label>
    <input type="number" name="rating_count" class="form-control" value="<?= esc($service['rating_count']) ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Ideal For</label>
    <textarea name="ideal_for" class="form-control editor"><?= esc($service['ideal_for']) ?></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Features (JSON)</label>
    <textarea name="features" class="form-control editor"><?= esc($service['features']) ?></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Button 1 Label</label>
    <input type="text" name="button_1_label" class="form-control" value="<?= esc($service['button_1_label']) ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Button 2 Label</label>
    <input type="text" name="button_2_label" class="form-control" value="<?= esc($service['button_2_label']) ?>">
  </div>
  <button class="btn btn-success">Update</button>
</form>
<?= $this->endSection() ?>
