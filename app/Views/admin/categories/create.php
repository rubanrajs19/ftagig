<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<h4>Create Category</h4>
<form method="post" action="<?= base_url('admin/categories/create') ?>">
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Slug</label>
    <input type="text" name="slug" class="form-control" required>
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" id="description" class="form-control" rows="4"><?= old('description', $category['description'] ?? '') ?></textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Type</label>
    <select name="type" class="form-select">
      <option value="individual">Individual</option>
      <option value="bundle">Bundle</option>
    </select>
  </div>
  <button class="btn btn-primary">Save</button>
</form>

<script>
  document.querySelector('input[name="name"]').addEventListener('input', function () {
    const name = this.value;
    const slug = name.trim().toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
    document.querySelector('input[name="slug"]').value = slug;
  });
</script>
<?= $this->endSection() ?>
