<!-- services_section.php: Final fixed version -->
 <style>
    .price-line span {       
        font-size: 12px ;
    }
 </style>
<section class="tabs-container">
  <div class="text-center mb-5">
    <p class="hero-large-default-section__eyebrow cl-teal">What We Do Best</p>
    <h2 class="hero-large-default-section__heading cl-voilet mbl-center">Discover Real-world Business Outcomes Like Never Before</h2>
    <p class="hero-large-default-section__description">Whether you need a specific service or the full scale, we’ve got you covered!</p>
  </div>

  <div class="tab-header">
    <div class="tab-btn active" data-tab="individual">Individual Services</div>
    <div class="tab-btn" data-tab="bundle">Service Bundles</div>
  </div>

  <!-- INDIVIDUAL SERVICES -->
  <div id="individual-services">
    <div class="service-tabs mb-4">
      <?php foreach ($individual_categories as $i => $cat): ?>
        <button class="btn<?= $i === 0 ? ' active' : '' ?>" data-category="<?= $cat['slug'] ?>">
          <?= esc($cat['name']) ?>
        </button>
      <?php endforeach; ?>
    </div>

    <div class="row g-4">
      <?php if (!empty($individual_services)): ?>
        <?php foreach ($individual_categories as $index => $cat): ?>
          <div class="service-card" data-category="<?= $cat['slug'] ?>" style="display:<?= $index === 0 ? 'block' : 'none' ?>;">
            <div class="cards-container">
              <?php foreach ($individual_services[$cat['id']] ?? [] as $svc): ?>
                <div class="card">
                  <h4><?= esc($svc['title']) ?></h4>
                  <?= html_entity_decode($svc['description']) ?>
                  <div class="meta">
                    <div class="rating"><?= esc($svc['rating']) ?> ★</div>
                    <div class="days">🕒 <?= esc($svc['delivery_time']) ?></div>
                  </div>
                  <div class="footer">
                    <div class="price price-line">₹ <?= number_format($svc['price']) ?> <span>+ 18% GST</span></div>
                    <button class="btn">Add to cart 🛒</button>
                  </div>
                </div>
              <?php endforeach; ?>
              <?php if (empty($individual_services[$cat['id']])): ?>
                <div class="col-12 text-center text-muted">No services found.</div>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>

  <!-- BUNDLE SERVICES -->
  <div id="bundle-services" class="d-none">
    <div class="service-tabs mb-4">
      <?php foreach ($bundle_categories as $i => $cat): ?>
        <button class="btn<?= $i === 0 ? ' active' : '' ?>" data-category="<?= $cat['slug'] ?>">
          <?= esc($cat['name']) ?>
        </button>
      <?php endforeach; ?>
    </div>

    <!-- <div class="container py-5">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php foreach ($bundle_categories as $cat): ?>
          <?php foreach ($bundle_services[$cat['id']] ?? [] as $svc): ?>
            <div class="col">
              <div class="plan-card">
                <div class="plan-title"><?= esc($svc['title']) ?></div>
                <div class="price-line">₹ <?= number_format($svc['price']) ?> <span>+ GST</span></div>
                <div class="page-range-rating">
                  <div><?= esc($svc['delivery_time']) ?></div>
                  <div class="rating"><?= esc($svc['rating']) ?> ★</div>
                </div>
                <div class="section-title">Key Services</div>
                <div class="feature-list">
                  <?= html_entity_decode($svc['features']) ?>
                </div>
                <div class="section-title">Ideal For</div>
                <div class="ideal-for">
                  <?= html_entity_decode($svc['ideal_for']) ?>
                </div>
                <button class="add-to-cart-btn">Add to cart 🛒</button>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endforeach; ?>
      </div>
    </div> -->
    
    <?php foreach ($bundle_categories as $index => $cat): ?>
    <div class="bundle-card-group" data-category="<?= $cat['slug'] ?>" style="<?= $index === 0 ? '' : 'display:none;' ?>">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php foreach ($bundle_services[$cat['id']] ?? [] as $svc): ?>
          <div class="col">
            <div class="plan-card">
              <div class="plan-card">
                  <div class="plan-title"><?= esc($svc['title']) ?></div>
                  <div class="price-line">₹ <?= number_format($svc['price']) ?> <span>+ GST</span></div>
                  <div class="page-range-rating">
                    <div><?= esc($svc['delivery_time']) ?></div>
                    <div class="rating"><?= esc($svc['rating']) ?> ★</div>
                  </div>
                  <div class="section-title">Key Services</div>
                  <div class="feature-list">
                    <?= html_entity_decode($svc['features']) ?>
                  </div>
                  <div class="section-title">Ideal For</div>
                  <div class="ideal-for">
                    <?= html_entity_decode($svc['ideal_for']) ?>
                  </div>
                  <button class="add-to-cart-btn">Add to cart 🛒</button>
                </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endforeach; ?>

  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const tabBtns = document.querySelectorAll('.tab-btn');
    const indContainer = document.getElementById('individual-services');
    const bundleContainer = document.getElementById('bundle-services');

    tabBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        tabBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const tab = btn.getAttribute('data-tab');
        const isBundle = tab === 'bundle';

        indContainer.classList.toggle('d-none', isBundle);
        bundleContainer.classList.toggle('d-none', !isBundle);

        if (!isBundle) {
          // reset individual view
          const catBtns = indContainer.querySelectorAll('.service-tabs .btn');
          const cards = indContainer.querySelectorAll('.service-card');
          catBtns.forEach((b, i) => b.classList.toggle('active', i === 0));
          cards.forEach((c, i) => c.style.display = i === 0 ? 'block' : 'none');
        }
      });
    });

    // Filter inside individual tab
    document.querySelectorAll('#individual-services .service-tabs .btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const slug = btn.getAttribute('data-category');
        document.querySelectorAll('#individual-services .service-tabs .btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        document.querySelectorAll('.service-card').forEach(card => {
          card.style.display = card.getAttribute('data-category') === slug ? 'block' : 'none';
        });
      });
    });
  });


  // Bundle category filtering
document.querySelectorAll('#bundle-services .service-tabs .btn').forEach(btn => {
  btn.addEventListener('click', () => {
    const slug = btn.getAttribute('data-category');
    document.querySelectorAll('#bundle-services .service-tabs .btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    document.querySelectorAll('#bundle-services .bundle-card-group').forEach(group => {
      group.style.display = group.getAttribute('data-category') === slug ? 'block' : 'none';
    });
  });
});

</script>
