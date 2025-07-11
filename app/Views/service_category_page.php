<?=view('layout/header') ?>

    <body>
        <a href="#main-content" class="visually-hidden focusable">
   Skip to main content
   </a>
  

<?= view('layout/navigation.php') ?>

<main class="main">
    <a id="main-content" tabindex="-1"></a>
   


<section class="tabs-container">
    <!-- Breadcrumb -->
    <?php if (isset($breadcrumb)): ?>
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-transparent px-0">
                <?php foreach ($breadcrumb as $label => $link): ?>
                    <li class="breadcrumb-item<?= $link ? '' : ' active' ?>">
                        <?php if ($link): ?>
                            <a href="<?= $link ?>"><?= esc($label) ?></a>
                        <?php else: ?>
                            <?= esc($label) ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        </nav>
    <?php endif; ?>

    <!-- Page Title -->
    <!-- <h3 class="text-center mb-2"><?= esc($category['name']) ?></h3> -->
      <?php if ($category['type'] === 'bundle'): ?>
        <!-- ✅ BUNDLE SERVICE VIEW -->
        <div class="bundle-card-group" data-category="<?= $category['slug'] ?>" style="display:block;">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php if (!empty($services)): ?>
                    <?php foreach ($services as $svc): ?>
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
                <?php else: ?>
                    <div class="col-12 text-center text-muted">No services found.</div>
                <?php endif; ?>
            </div>
        </div>

    <?php else: ?>
        <!-- ✅ INDIVIDUAL SERVICE VIEW -->
    <!-- Service Cards Layout -->
    <div class="row g-4">
        <div class="service-card" data-category="<?= esc($category['slug']) ?>" style="display:block !important;">
            <div class="cards-container">
                <?php if (!empty($services)): ?>
                    <?php foreach ($services as $svc): ?>
                        <div class="card">
                            <h4><?= esc($svc['title']) ?></h4>
                            <?= html_entity_decode($svc['description']) ?>
                            <div class="meta">
                                <div class="rating"><?= esc($svc['rating']) ?> ★</div>
                                <div class="days">🕒 <?= esc($svc['delivery_time']) ?></div>
                            </div>
                            <div class="footer">
                                <div class="price price-line">
                                    ₹ <?= number_format($svc['price']) ?>
                                    <span>+ 18% GST</span>
                                </div>
                                <button class="btn">Add to cart 🛒</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center text-muted">No services found.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
      <?php endif; ?>
</section>

<section class="tabs-container">
    <?=view('onboarding-section') ?>
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
        
        <script src="/sites/default/files/js/js_iYHJnJ3UWmIphXMFJHftQsGxT_7sqdBER2rfvakCRXo.js?scope=footer&amp;delta=0&amp;language=en&amp;theme=beroe&amp;include=eJx1kGGOxCAIhS_k1CMRtIx1l4oBTdrbr51Ou9lk5w_wHp95RPzCDVhwJvX4O09tUQmB1EVh0SCbn-mJndttvEj_RzmugDGKzlkKVFRMinXxiSUgO2vYusFKZpjI_Kkfl3YjTugNP6ztnEty1CGKfGcaba2csUTy_5lHOOMuvZk_oplxmyyPNU2cg6LuB3I6cBH-1PeDiwzUGinQVsVohmfmIc0nKjTIT2vsTcB6WHNzRqhxAawZDvt1KDXyH_zjtpUSjlK6vyc4v8N-AJItqNQ"></script>
        <script src="/modules/contrib/eu_cookie_compliance/js/eu_cookie_compliance.min.js?v=10.3.1" defer=""></script>
        <script src="/sites/default/files/js/js_lxnPald_1-lXzXwGyotEyqTCDdxZpvH9yd2p_tTl0C8.js?scope=footer&amp;delta=2&amp;language=en&amp;theme=beroe&amp;include=eJx1kGGOxCAIhS_k1CMRtIx1l4oBTdrbr51Ou9lk5w_wHp95RPzCDVhwJvX4O09tUQmB1EVh0SCbn-mJndttvEj_RzmugDGKzlkKVFRMinXxiSUgO2vYusFKZpjI_Kkfl3YjTugNP6ztnEty1CGKfGcaba2csUTy_5lHOOMuvZk_oplxmyyPNU2cg6LuB3I6cBH-1PeDiwzUGinQVsVohmfmIc0nKjTIT2vsTcB6WHNzRqhxAawZDvt1KDXyH_zjtpUSjlK6vyc4v8N-AJItqNQ"></script>
        <ul id="ui-id-1" tabindex="-1" class="ui-menu ui-widget ui-widget-content ui-autocomplete ui-front search-api-autocomplete-search" unselectable="on" style="display: none;"></ul>
        <div role="status" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible"></div>
        <div id="drupal-live-announce" class="visually-hidden" aria-live="polite" aria-busy="false"></div>
        <iframe height="0" width="0" style="display: none; visibility: hidden;"></iframe>
        <div id="sticky-ajax-loader" style="left: 128px; top: 232px;"></div>
        <div id="cboxOverlay" style="display: none;"></div>
        <div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;">
            <div id="cboxWrapper">
                <div>
                    <div id="cboxTopLeft" style="float: left;"></div>
                    <div id="cboxTopCenter" style="float: left;"></div>
                    <div id="cboxTopRight" style="float: left;"></div>
                </div>
                <div style="clear: left;">
                    <div id="cboxMiddleLeft" style="float: left;"></div>
                    <div id="cboxContent" style="float: left;">
                        <div id="cboxTitle" style="float: left;"></div>
                        <div id="cboxCurrent" style="float: left;"></div>
                        <button type="button" id="cboxPrevious"></button>
                        <button type="button" id="cboxNext"></button>
                        <button type="button" id="cboxSlideshow"></button>
                        <div id="cboxLoadingOverlay" style="float: left;"></div>
                        <div id="cboxLoadingGraphic" style="float: left;"></div>
                    </div>
                    <div id="cboxMiddleRight" style="float: left;"></div>
                </div>
                <div style="clear: left;">
                    <div id="cboxBottomLeft" style="float: left;"></div>
                    <div id="cboxBottomCenter" style="float: left;"></div>
                    <div id="cboxBottomRight" style="float: left;"></div>
                </div>
            </div>
            <div style="position: absolute; width: 9999px; visibility: hidden; display: none; max-width: none;"></div>
        </div>
        <div class="go2933276541 go2369186930" id="hs-web-interactives-top-anchor">
            <div id="hs-interactives-
      -overlay" class="go1632949049"></div>
        </div>
        <div class="go2933276541 go1348078617" id="hs-web-interactives-bottom-anchor"></div>
        <div id="hs-web-interactives-floating-container">
            <div id="hs-web-interactives-floating-top-left-anchor" class="go2417249464 go613305155">
            </div>
            <div id="hs-web-interactives-floating-top-right-anchor" class="go2417249464 go471583506">
            </div>
            <div id="hs-web-interactives-floating-bottom-left-anchor" class="go2417249464 go3921366393">
            </div>
            <div id="hs-web-interactives-floating-bottom-right-anchor" class="go2417249464 go3967842156">
            </div>
        </div>
      







    </body>
    <?=view('layout/footer') ?>
    <style>
        .service-card {
            display: block !important;
        }
    </style>