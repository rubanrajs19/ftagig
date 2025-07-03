<!-- services_section.php: Using proven working layout from your previous setup -->
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

  <div id="individual-services">

  
    <div class="service-tabs mb-4" id="category-tabs">
        <?php foreach ($individual_categories as $i => $cat): ?>
        <button class="btn<?= $i === 0 ? ' active' : '' ?>" data-category="<?= $cat['slug'] ?>">
            <?= esc($cat['name']) ?>
        </button>
        <?php endforeach; ?>
    </div>
    <!-- INDIVIDUAL SERVICES -->
    <div class="row g-4" >
        
        
        <?php if (!empty($individual_services)): ?>
        <?php foreach ($individual_categories as $cat): ?>
            <div class="service-card" data-category="<?= $cat['slug'] ?>">
            <div class="cards-container">
                <?php foreach ($individual_services[$cat['id']] ?? [] as $svc): ?>
                <div class="card">
                    <h4><?= esc($svc['title']) ?></h4>
                    <?= $svc['description'] ?>
                    <div class="meta">
                    <div class="rating"><?= esc($svc['rating']) ?> ★</div>
                    <div class="days">🕒 <?= esc($svc['delivery_time']) ?></div>
                    </div>
                    <div class="footer">
                    <div class="price">₹ <?= number_format($svc['price']) ?></div>
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
  <div id="bundle-services">
    <div class="service-tabs mb-4" id="category-tabs">
            <?php foreach ($bundle_categories as $i => $cat): ?>
            <button class="btn<?= $i === 0 ? ' active' : '' ?>" data-category="<?= $cat['slug'] ?>">
                <?= esc($cat['name']) ?>
            </button>
            <?php endforeach; ?>
    </div>
    <div class="row g-4 d-none">
        <div class="col-12 text-center">
        

        <div class="container py-5">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php foreach ($bundle_categories as $cat): ?>
                <?php foreach ($bundle_services[$cat['id']] ?? [] as $svc): ?>
                <div class="col">
                    <div class="plan-card">
                    <div class="plan-title"><?= esc($svc['title']) ?></div>
                    <div class="price-line">₹ <?= number_format($svc['price']) ?> <span>Monthly</span></div>
                    <div class="page-range-rating">
                        <div><?= esc($svc['delivery_time']) ?></div>
                        <div class="rating"><?= esc($svc['rating']) ?> ★</div>
                    </div>

                    <div class="section-title">Key Services</div>
                    <div class="feature-list">
                        <?= nl2br(esc($svc['features'])) ?>
                    </div>

                    <div class="section-title">Ideal For</div>
                    <div class="ideal-for">
                        <?= esc($svc['ideal_for']) ?>
                    </div>

                    <button class="add-to-cart-btn">Add to cart 🛒</button>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
            </div>
        </div>
        </div>
    </div>
</div>
</section>

<!-- <script>
  // Main tab switch
  document.querySelectorAll(".tab-btn").forEach(btn => {
    btn.addEventListener("click", () => {
      document.querySelectorAll(".tab-btn").forEach(b => b.classList.remove("active"));
      btn.classList.add("active");
      const tab = btn.getAttribute("data-tab");
      document.getElementById("individual-services").classList.toggle("d-none", tab !== "individual");
      document.getElementById("bundle-services").classList.toggle("d-none", tab !== "bundle");
    });
  });

  // Category filtering inside tabs
  document.querySelectorAll(".service-tabs").forEach(tabContainer => {
    tabContainer.querySelectorAll(".btn").forEach(btn => {
      btn.addEventListener("click", () => {
        const category = btn.getAttribute("data-category");
        tabContainer.querySelectorAll(".btn").forEach(b => b.classList.remove("active"));
        btn.classList.add("active");
        document.querySelectorAll(".service-card").forEach(card => {
          card.style.display = card.getAttribute("data-category") === category ? "block" : "none";
        });
      });
    });
  });
</script> -->
<script>
  const tabButtons = document.querySelectorAll(".tab-btn");
  const individualServices = document.getElementById("individual-services");
  const bundleServices = document.getElementById("bundle-services");

  // Toggle main tabs
  tabButtons.forEach(btn => {
    btn.addEventListener("click", () => {
      tabButtons.forEach(b => b.classList.remove("active"));
      btn.classList.add("active");

      const tab = btn.getAttribute("data-tab");

      if (tab === "individual") {
        individualServices.classList.remove("d-none");
        bundleServices.classList.add("d-none");

        // Reset individual category tabs
        const indTabs = individualServices.querySelectorAll(".service-tabs .btn");
        indTabs.forEach((b, i) => b.classList.toggle("active", i === 0));
        document.querySelectorAll(".service-card").forEach((card, i) => {
          card.style.display = i === 0 ? "block" : "none";
        });

      } else {
        bundleServices.classList.remove("d-none");
        individualServices.classList.add("d-none");

        // Reset bundle category tabs
        const bundleTabs = bundleServices.querySelectorAll(".service-tabs .btn");
        bundleTabs.forEach((b, i) => b.classList.toggle("active", i === 0));

        // (optional) Scroll into view or further filtering if needed
      }
    });
  });

  // Category filtering inside INDIVIDUAL tab
  document.querySelectorAll("#individual-services .service-tabs .btn").forEach(btn => {
    btn.addEventListener("click", () => {
      const category = btn.getAttribute("data-category");
      document.querySelectorAll("#individual-services .service-tabs .btn").forEach(b => b.classList.remove("active"));
      btn.classList.add("active");
      document.querySelectorAll(".service-card").forEach(card => {
        card.style.display = card.getAttribute("data-category") === category ? "block" : "none";
      });
    });
  });
</script>
<script>
  window.addEventListener('DOMContentLoaded', () => {
    // Show only the first individual service category on page load
    const allCards = document.querySelectorAll('#individual-services .service-card');
    allCards.forEach((card, index) => {
      card.style.display = index === 0 ? 'block' : 'none';
    });

    // Ensure only first individual category tab is active
    const indTabs = document.querySelectorAll('#individual-services .service-tabs .btn');
    indTabs.forEach((btn, index) => {
      btn.classList.toggle('active', index === 0);
    });

    const bundleServices = document.getElementById("bundle-services");
    bundleServices.classList.add("d-none");
    // Same for bundle tabs (optional: reset to first if needed)
    const bundleTabs = document.querySelectorAll('#bundle-services .service-tabs .btn');
    bundleTabs.forEach((btn, index) => {
      btn.classList.toggle('active', index === 0);
    });
  });
</script>
