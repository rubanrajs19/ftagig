<?=view('layout/header') ?>

    <body>
        <a href="#main-content" class="visually-hidden focusable">
   Skip to main content
   </a>
  

<?= view('layout/navigation.php') ?>

<main class="main">
    <a id="main-content" tabindex="-1"></a>

<style>
.main-slider .swiper-slide img {
    height: 400px;
    object-fit: cover;
    width: 100%;
}
.thumbs-slider .swiper-slide {
    width: 70px;
    height: 70px;
    opacity: 0.6;
    cursor: pointer;
}
.thumbs-slider .swiper-slide-thumb-active {
    opacity: 1;
}
.thumbs-slider img {
    object-fit: cover;
    width: 100%;
    height: 100%;
    border-radius: 4px;
}
.sticky-top{
  z-index: 0;
}
.main-slider .swiper-slide img{
    height: auto;
    object-fit: contain;
}
@media (max-width: 768px) {
    .main-slider .swiper-slide img {
    height: 250px;
    }
}
.swiper-wrapper{
    height:auto !important
}
.breadcrumb{
    margin-left: 0;
    margin-bottom:2rem;
    border:0;
}
.tabs-container{
        padding: 0px 20px;
}
.eyebrow{
    font-size: 20px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
    color:#01ADC3 !important;
}
.cus_title{
    color:#5B05D8 !important;
    font-size: 48px;
    font-style: normal;
    font-weight: 400;
    line-height: 48px;
}
.cus_desc{
    color:#001137;
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: 24px; /* 150% */
}
.rating{
    border-radius: 4px;
    background-color:  #5B05D8 !important;
    padding: 6px 8px;
}
.breadcrumb-item.active{
    color:#5B05D8 !important;
}
.breadcrumb{
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px; 
}
.cus_h2{
    font-size: 24px;
    font-style: normal;
    font-weight: 500;
    line-height: 48px;
    color:#5B05D8 !important;
}
.gst_cus{
     font-size: 12px;
     color:#6c757d ;
}
.add_to_cart{
    border-radius: 8px;
    background:  #FFE61E;
    margin-top: 1rem;
    width: 215px !important;
}
</style>
<section class="tabs-container">

<div class="container">

    <!-- ✅ Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url($category_type . '/' . $category_slug) ?>"><?= esc($category_name) ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= esc($service['title']) ?></li>
        </ol>
    </nav>

    <div class="row">
        <!-- ✅ Left Column -->
        <div class="col-lg-8">
            <p class="text-uppercase text-primary fw-bold mb-1 eyebrow"><?= esc($category_name) ?></p>
            <h1 class="fw-bold text-dark mb-2 h2 cus_title"><?= esc($service['title']) ?></h1>
            <p class="lead text-muted mb-3 cus_desc"><?= esc(strip_tags($service['description'])) ?></p>

            <div class="mb-4">
                <span class="badge bg-success text-white rating"><?= esc($service['rating'] ?? '4.5') ?> ★ </span>
                <small class="text-muted">(<?= esc($service['rating_count'] ?? '12') ?> reviews)</small>
            </div>

            <!-- ✅ Swiper Carousel -->
            <?php $images = json_decode($service['images'] ?? '[]', true); ?>
            <div class="swiper main-slider mb-3">
                <div class="swiper-wrapper">
                    <?php if (!empty($images)): ?>
                        <?php foreach ($images as $img): ?>
                            <div class="swiper-slide">
                                <img src="<?= base_url('assets/' . $img) ?>" alt="Service Image">
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <?php for ($i = 0; $i < 3; $i++): ?>
                            <div class="swiper-slide">
                                <img src="https://unsplash.it/800/400?image=10<?= $i + 20 ?>" alt="Placeholder">
                            </div>
                        <?php endfor; ?>
                    <?php endif; ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <!-- ✅ Thumbnails -->
            <div class="swiper thumbs-slider mb-4">
                <div class="swiper-wrapper">
                    <?php if (!empty($images)): ?>
                        <?php foreach ($images as $img): ?>
                            <div class="swiper-slide"><img src="<?= base_url('assets/' . $img) ?>" alt="Thumb"></div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <?php for ($i = 0; $i < 3; $i++): ?>
                            <div class="swiper-slide"><img src="https://unsplash.it/70/70?image=10<?= $i + 20 ?>" alt="Thumb Placeholder"></div>
                        <?php endfor; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- ✅ About Section -->
            <h5 class="text-primary mt-4 eyebrow">About</h5>
            <h6 class="fw-bold cus_h2">Why Choose Us:</h6>
            <p class="text-muted cus_desc">
                <?= !empty($service['about']) ? nl2br(esc($service['about'])) : 'This service helps optimize your site for better visibility, faster indexing, and stronger user engagement.' ?>
            </p>
        </div>

        <!-- ✅ Sidebar -->
        <div class="col-lg-4">
            <div class="p-4 bg-light border rounded shadow-sm sticky-top">
                <h6 class="text-primary mb-3 eyebrow">Key Offerings</h6>
                <ul class="list-unstyled small mb-4 cus_desc">
                    <?php foreach (explode("\n", strip_tags($service['features'] ?? '')) as $line): ?>
                        <li class="mb-2"><?= esc(trim($line)) ?></li>
                    <?php endforeach; ?>
                </ul>
                <hr>
                <h6 class="text-secondary mb-1 eyebrow">What you can expect</h6>
                <ul class="list-unstyled small mb-3 cus_desc">
                    <?php foreach (explode("\n", strip_tags($service['ideal_for'] ?? '')) as $line): ?>
                        <li> <?= esc(trim($line)) ?></li>
                    <?php endforeach; ?>
                </ul>
                <hr>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <strong class="fs-5">₹<?= number_format($service['price']) ?> <span class="gst_cus">+ 18% GST</span></strong>
                    <small class="text-muted">🕒 <?= esc($service['delivery_time']) ?> days</small>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-warning w-auto fw-bold add_to_cart">Add to cart 🛒</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
           
                <style>
                    .btn-know-more{
                    border: 1px solid black !important;
                    border-radius: 4px !important;
                    background: transparent !important;
                    color: #5b05d8;
                    }
                    .btn-add-cart{
                    border-radius: 6px;
                    font-weight: 600;
                    padding: 10px 16px;
                    background: #FFE61E;
                    }
                    .bundle-card-group p{
                    font-size: 14px;
                    color: #555;
                    margin-bottom: 12px;
                    }
                    .bundle-card-group .price-line{
                        justify-content: space-between;
                    }
                    .common-p{
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 500;
                    line-height: 24px;
                    }
                    .common-p p{
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 500;
                    line-height: 24px;
                    }
                    .bundle-card-group .rating{
                    width: 48px;
                    margin: auto;
                    }
                    .service-card .card .btn{
                        text-decoration: none !important;
                    }
                </style>
                <?php if (!empty($related_services)): ?>

                    <div class="container">
                        <div class="row">
                                    <div class="col">                       
                                        <h5 class="text-primary mt-4 eyebrow">You Can Buy in <?php print_r(ucfirst($related_services[0]['category_type']));?></h5>
                                        
                                        <h4 class="mb-4 cus_h2"><?php echo $related_services[0]['category_name']; ?></h4>
                                    </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            <?php foreach ($related_services as $svc): ?>
                                
                                
                                <?php if (($svc['category_type'] ?? '') === 'bundle'): ?>
                                    <!-- ✅ BUNDLE SERVICE CARD -->
                                    <div class="col bundle-card-group">
                                        <div class="plan-card h-100">
                                            <div class="plan-title"><?= esc($svc['title']) ?></div>
                                            <div class="price-line">
                                                <div>₹ <?= number_format($svc['price']) ?> <span>+ GST</span></div>
                                                <div class="common-p"><?= esc($svc['delivery_time']) ?></div>
                                            </div>
                                            <div class="price-line common-p">
                                                <?= html_entity_decode($svc['description']) ?>
                                                <div class="page-range-rating">
                                                    <div class="rating"><?= esc($svc['rating']) ?> ★</div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="section-title">Key Services</div>
                                            <div class="feature-list"><?= html_entity_decode($svc['features']) ?></div>
                                            <hr>
                                            <div class="section-title">Ideal For</div>
                                            <div class="ideal-for"><?= html_entity_decode($svc['ideal_for']) ?></div>
                                            <div class="row g-2 mt-3">
                                                <div class="col">
                                                    <a href="<?= base_url($svc['category_type'] . '/' . $svc['category_slug'] . '/' . $svc['slug']) ?>" class="btn btn-know-more">Know More</a>
                                                </div>
                                                <div class="col">
                                                    <button class="btn btn-add-cart">Add to cart 🛒</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <!-- ✅ INDIVIDUAL SERVICE CARD -->
                                    <div class="col">
                                        <div class="card h-100 shadow-sm">
                                            <div class="card-body">
                                                <h6 class="card-title"><?= esc($svc['title']) ?></h6>
                                                <p class="text-muted mb-1">₹<?= number_format($svc['price']) ?> + GST</p>
                                                <p class="text-muted mb-2"><?= esc($svc['delivery_time']) ?> days</p>
                                                <ul class="pl-3 small">
                                                    <?php foreach (explode("\n", $svc['features']) as $feature): ?>
                                                        <li><?= esc($feature) ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                                <div class="d-flex justify-content-between mt-2">
                                                    <a href="<?= base_url($svc['category_type'] . '/' . $svc['category_slug'] . '/' . $svc['slug']) ?>" class="btn btn-outline-primary btn-sm">Know More</a>
                                                    <a href="#" class="btn btn-warning btn-sm">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                <?php endif; ?>
        </div>
    </div>
</div>


</section>



<section class="tabs-container">
<?=view('layout/footer-new') ?>
</section>
</main>

<footer class="footer">
    <div class="container container-flush">
        <div class="footer-content">
            <div class="footer-content--third-row">
                <div>
                    <div id="block-beroe-footerlogo" class="block block-fixed-block-content block-fixed-block-contentfooter-logo">
                        <div class="block--content">
                            <div>
                                <div>
                                    <div>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav role="navigation" aria-labelledby="block-beroe-footerpolicy-menu" id="block-beroe-footerpolicy">
                        <h2 class="visually-hidden" id="block-beroe-footerpolicy-menu">Footer policy</h2>
                        <div class="navbar-nav">
                            <span class="copyright-text">Copyright © 2025 FTA Global</span>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>
        
       
      





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  const thumbs = new Swiper('.thumbs-slider', {
    spaceBetween: 10,
    slidesPerView: 'auto',
    freeMode: true,
    watchSlidesProgress: true,
  });

  const main = new Swiper('.main-slider', {
    spaceBetween: 10,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    thumbs: {
      swiper: thumbs,
    }
  });
</script>

    </body>
    <?=view('layout/footer') ?>