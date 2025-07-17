<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<h4>Create Service</h4>
<form method="post" action="<?= base_url('admin/services/create') ?>" enctype="multipart/form-data">
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
  <div class="form-group">
    <label for="slug">Slug</label>
    <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter unique slug">
    <small id="slug-status" class="form-text text-muted"></small>
  </div>
  <!-- About Field -->
  <div class="form-group">
      <label for="about">About (Optional)</label>
      <textarea name="about" id="about" class="form-control" rows="4" placeholder="About the service..."></textarea>
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
  <!-- Multiple Images -->
  <div class="form-group">
      <label for="images">Upload Images (Optional)</label>
      <input type="file" name="images[]" id="images" class="form-control" multiple accept="image/*">
      <div id="preview-area" class="d-flex flex-wrap mt-2"></div>

  </div>
  <div class="form-group">
    <label for="related_categories">Related Categories</label>
    <select name="related_categories[]" id="related_categories" class="form-control" multiple>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>"><?= esc($cat['name']) ?></option>
        <?php endforeach; ?>
    </select>
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
<script>
document.getElementById('slug').addEventListener('input', function () {
    let slug = this.value.trim();
    let status = document.getElementById('slug-status');

    if (slug.length > 0) {
        fetch("<?= base_url('admin/services/check-slug?slug=') ?>" + encodeURIComponent(slug))
            .then(res => res.json())
            .then(data => {
              
                if (data.available) {
                    status.innerHTML = '<span style="color: green;">Slug is available</span>';
                } else {
                    status.innerHTML = '<span style="color: red;">Slug already exists</span>';
                }
            });
    } else {
        status.textContent = '';
    }
});
</script>
<script>
document.getElementById('images').addEventListener('change', function () {
    const previewArea = document.getElementById('preview-area');
    previewArea.innerHTML = ''; // Clear previous

    Array.from(this.files).forEach(file => {
        if (!file.type.startsWith('image/')) return;

        const reader = new FileReader();
        reader.onload = function (e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.classList.add('mr-2', 'mb-2');
            img.style.width = '100px';
            img.style.height = '100px';
            img.style.objectFit = 'cover';
            img.style.border = '1px solid #ccc';
            img.style.borderRadius = '4px';
            previewArea.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
});
</script>


<?= $this->endSection() ?>