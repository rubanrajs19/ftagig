<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<h4>Edit Service</h4>
<form method="post" action="<?= base_url('admin/services/edit/' . $service['id']) ?>" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control" value="<?= esc($service['title']) ?>" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Category</label>
    <select name="category_id" class="form-select select2" required>
      <option value="">Select Category</option>
      <?php foreach ($categories as $cat): ?>
        <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $service['category_id'] ? 'selected' : '' ?>>
          <?= esc($cat['name']) ?> (<?= esc($cat['type']) ?>)
        </option>
      <?php endforeach; ?>
    </select>
  </div>
  <!-- Slug Field -->
  <div class="form-group">
      <label for="slug">Slug</label>
      <input type="text" name="slug" id="slug" class="form-control" value="<?= esc($service['slug'] ?? '') ?>" placeholder="Enter unique slug">
      <small id="slug-status" class="form-text text-muted"></small>
  </div>
  <!-- About Field -->
  <div class="form-group">
      <label for="about">About (Optional)</label>
      <textarea name="about" id="about" class="form-control" rows="4"><?= esc($service['about'] ?? '') ?></textarea>
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
    <label class="form-label">Key Services (Features)</label>
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
  <!-- Upload New Images -->
  <div class="form-group">
      <label for="images">Upload New Images</label>
      <input type="file" name="images[]" id="images" class="form-control" multiple accept="image/*">
  </div>
  <?php if (!empty($service['images'])): ?>
      <?php $images = json_decode($service['images'], true); ?>
      <div id="existing-images" class="d-flex flex-wrap mt-2">
          <?php foreach ($images as $img): ?>
              <div class="position-relative mr-2 mb-2">
                  <img src="<?= base_url('assets/banners/' . $img) ?>" width="100" height="100" style="object-fit:cover; border:1px solid #ccc; border-radius:4px;">
                  <button type="button" class="btn btn-sm btn-danger position-absolute" style="top:0; right:0;" onclick="removeImage(this, '<?= esc($img) ?>')">×</button>
                  <input type="hidden" name="existing_images[]" value="<?= esc($img) ?>">
              </div>
          <?php endforeach; ?>
      </div>
  <?php endif; ?>
  <?php $selected = json_decode($service['related_categories'] ?? '[]', true); ?>

  <div class="form-group mb-3">
      <label for="related_categories">Related Categories</label>
      <select name="related_categories[]" id="related_categories" class="form-control">
          <?php foreach ($categories as $cat): ?>
              <option value="<?= $cat['id'] ?>" <?= in_array($cat['id'], $selected ?? []) ? 'selected' : '' ?>>
                  <?= esc($cat['name']) ?>
              </option>
          <?php endforeach; ?>
      </select>
  </div>
  <button class="btn btn-success">Update</button>
</form>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    $('.select2').select2();
  });
</script>
<script>
document.getElementById('images').addEventListener('change', function () {
    const previewArea = document.getElementById('preview-area') || createPreviewArea();
    previewArea.innerHTML = '';

    Array.from(this.files).forEach(file => {
        if (!file.type.startsWith('image/')) return;

        const reader = new FileReader();
        reader.onload = function (e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '100px';
            img.style.height = '100px';
            img.style.objectFit = 'cover';
            img.classList.add('mr-2', 'mb-2');
            previewArea.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
});

function createPreviewArea() {
    const div = document.createElement('div');
    div.id = 'preview-area';
    div.className = 'd-flex flex-wrap mt-2';
    document.getElementById('images').parentNode.appendChild(div);
    return div;
}

function removeImage(button, filename) {
    button.parentElement.remove(); // remove thumbnail

    // Add a hidden field to tell server to delete this image
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'delete_images[]';
    input.value = filename;
    document.querySelector('form').appendChild(input);
}

// Slug check (same as create.php)
document.getElementById('slug').addEventListener('input', function () {
    let slug = this.value.trim();
    let status = document.getElementById('slug-status');
    let id = "<?= $service['id'] ?>";

    if (slug.length > 0) {
        fetch("<?= base_url('admin/services/check-slug?slug=') ?>" + encodeURIComponent(slug) + "&id=" + id)
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
$(document).ready(function () {
    $('#related_categories').select2({
        placeholder: "Select related categories"
    });
});
</script>

<?= $this->endSection() ?>
