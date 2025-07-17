<?=view('layout/header') ?>

    <body>
        <a href="#main-content" class="visually-hidden focusable">
   Skip to main content
   </a>
  

<?= view('layout/navigation.php') ?>

<main class="main">
    <a id="main-content" tabindex="-1"></a>
   
<?php
$categoryMeta = [];
if (isset($all_categories)) {
    foreach ($all_categories as $cat) {
        $categoryMeta[$cat['id']] = [
            'slug' => $cat['slug'], // ✅ category slug
            'type' => $cat['type'], // ✅ 'individual' or 'bundle'
        ];
    }
}
//print_r($categoryMeta);die;
?>
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
                                <div class="price-line">
                                    <div>₹ <?= number_format($svc['price']) ?> <span>+ GST</span></div>
                                    <div class="common-p">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path d="M9.03849 10.1356C9.1714 10.1356 9.27914 10.0278 9.27914 9.89494C9.27914 9.76204 9.1714 9.6543 9.03849 9.6543C8.90559 9.6543 8.79785 9.76204 8.79785 9.89494C8.79785 10.0278 8.90559 10.1356 9.03849 10.1356Z" fill="#001137"/>
                                            <path d="M9.03849 11.0868C9.1714 11.0868 9.27914 10.979 9.27914 10.8461C9.27914 10.7132 9.1714 10.6055 9.03849 10.6055C8.90559 10.6055 8.79785 10.7132 8.79785 10.8461C8.79785 10.979 8.90559 11.0868 9.03849 11.0868Z" fill="#001137"/>
                                            <path d="M10.7273 8.43364L11.7668 7.48454L12.2655 7.03214C13.1664 6.21973 13.613 5.11856 13.6304 3.66123V2.43684H14.385C14.4171 2.43761 14.449 2.43196 14.4789 2.42021C14.5088 2.40846 14.536 2.39086 14.5589 2.36844C14.5819 2.34601 14.6001 2.31922 14.6126 2.28965C14.625 2.26007 14.6314 2.2283 14.6314 2.1962V1.1547C14.6314 1.09088 14.6061 1.02967 14.561 0.984545C14.5158 0.939416 14.4546 0.914062 14.3908 0.914062H3.69091C3.62708 0.914063 3.56588 0.939416 3.52075 0.984545C3.47562 1.02967 3.45026 1.09088 3.45026 1.1547V2.1962C3.45026 2.26002 3.47562 2.32123 3.52075 2.36636C3.56588 2.41149 3.62708 2.43684 3.69091 2.43684H4.44556V3.65738C4.46288 5.11085 4.91144 6.21203 5.8124 7.02251L6.38994 7.55L7.35251 8.42786C7.4526 8.50315 7.53546 8.59894 7.59556 8.70884C7.65565 8.81873 7.69158 8.94018 7.70096 9.06508C7.68863 9.19393 7.64915 9.31871 7.58511 9.4312C7.52107 9.54369 7.43392 9.64133 7.32941 9.7177L5.80855 11.1076C4.90759 11.9181 4.46096 13.0193 4.44171 14.4766V15.5393H3.69091C3.65881 15.5393 3.62704 15.5457 3.59746 15.5582C3.56788 15.5706 3.54109 15.5889 3.51867 15.6118C3.49625 15.6348 3.47865 15.662 3.4669 15.6919C3.45515 15.7217 3.44949 15.7536 3.45026 15.7857V16.8272C3.45026 16.891 3.47562 16.9522 3.52075 16.9974C3.56588 17.0425 3.62708 17.0679 3.69091 17.0679H14.385C14.4176 17.0687 14.45 17.0628 14.4803 17.0507C14.5105 17.0386 14.538 17.0205 14.561 16.9974C14.5841 16.9744 14.6022 16.9469 14.6143 16.9167C14.6264 16.8864 14.6322 16.854 14.6314 16.8214V15.7857C14.6314 15.7219 14.6061 15.6607 14.561 15.6156C14.5158 15.5704 14.4546 15.5451 14.3908 15.5451H13.6304V14.4728C13.613 13.0193 13.1664 11.9181 12.2655 11.1076L10.7427 9.71577C10.6391 9.6401 10.5528 9.54331 10.4894 9.4318C10.426 9.3203 10.387 9.19662 10.375 9.06893C10.3856 8.94418 10.4224 8.82308 10.4831 8.71359C10.5439 8.60409 10.6271 8.50869 10.7273 8.43364ZM9.89369 9.07086C9.90416 9.26596 9.95652 9.45653 10.0472 9.6296C10.1379 9.80267 10.2648 9.95419 10.4192 10.0738L11.9363 11.4638C12.7448 12.1915 13.1279 13.1502 13.1433 14.4766V15.5393H4.92684V14.4786C4.94417 13.1502 5.32727 12.1915 6.13583 11.4638L7.65668 10.0758C7.81224 9.95513 7.94003 9.80243 8.03138 9.62804C8.12272 9.45365 8.17549 9.26166 8.18609 9.06508C8.17637 8.8745 8.12557 8.68827 8.03719 8.51914C7.9488 8.35002 7.82492 8.20199 7.67401 8.08519L6.71144 7.20732L6.1339 6.67984C5.32727 5.95214 4.94417 4.99342 4.92684 3.667V2.43684H13.1491V3.65738C13.1337 4.98572 12.7506 5.94444 11.942 6.67214C11.7745 6.8223 11.609 6.97438 11.4415 7.12839L10.3961 8.08519C10.2474 8.20457 10.1257 8.35417 10.0391 8.52408C9.95249 8.69399 9.90292 8.88036 9.89369 9.07086Z" fill="#001137"/>
                                            <path d="M12.2073 5.58323C12.2332 5.5384 12.2438 5.48637 12.2376 5.43498C12.2313 5.38359 12.2085 5.33562 12.1727 5.29831C12.1374 5.26013 12.0906 5.23469 12.0394 5.22598C11.9882 5.21727 11.9355 5.22578 11.8897 5.25018C10.9406 5.73339 10.5844 5.91435 9.1117 5.4427C8.16772 5.13514 7.14143 5.20411 6.2471 5.63521C6.21447 5.65065 6.18573 5.67323 6.16301 5.70129C6.14029 5.72934 6.12417 5.76214 6.11585 5.79727C6.10753 5.8324 6.10722 5.86895 6.11495 5.90421C6.12267 5.93948 6.13823 5.97255 6.16047 6.00099C6.25287 6.11072 8.34742 8.11863 8.36667 8.11863C8.52194 8.297 8.61634 8.5202 8.63619 8.75585C8.64874 8.85389 8.69851 8.94336 8.7752 9.00571C8.85189 9.06807 8.94963 9.09854 9.04817 9.09083C9.09447 9.09533 9.1412 9.09062 9.18568 9.07696C9.23015 9.06331 9.27147 9.04098 9.30727 9.01127C9.34307 8.98156 9.37262 8.94505 9.39424 8.90385C9.41585 8.86266 9.42909 8.81759 9.43319 8.77125C9.47024 8.46376 9.62139 8.18138 9.85672 7.98002C9.88945 7.95115 10.0242 7.82216 10.2071 7.64697C10.6576 7.21574 11.4084 6.49189 11.6144 6.31093C11.8497 6.10171 12.0499 5.85601 12.2073 5.58323Z" fill="#001137"/>
                                            <path d="M5.7237 14.7685C5.72292 14.8009 5.7287 14.8331 5.74068 14.8633C5.75267 14.8934 5.77061 14.9208 5.79345 14.9438C5.81628 14.9668 5.84353 14.985 5.87356 14.9972C5.90359 15.0094 5.93578 15.0154 5.96819 15.0149H12.1113C12.1751 15.0149 12.2363 14.9896 12.2815 14.9444C12.3266 14.8993 12.3519 14.8381 12.3519 14.7743C12.3311 13.9091 11.9728 13.0865 11.3535 12.482C10.7343 11.8775 9.9032 11.5391 9.03782 11.5391C8.17244 11.5391 7.34136 11.8775 6.72212 12.482C6.10287 13.0865 5.74456 13.9091 5.7237 14.7743V14.7685Z" fill="#5B05D8"/>
                                        </svg>
                                    &nbsp;<?= esc($svc['delivery_time']) ?></div>
                                    </div>
                                    <div class="price-line common-p">
                                        <?= html_entity_decode($svc['description']) ?>
                                        <div class="page-range-rating">                    
                                        <div class="rating"><?= esc($svc['rating']) ?> ★</div>
                                        </div>
                                    </div>
                                    <hr>
                                <div class="section-title">Key Services</div>
                                <div class="feature-list">
                                    <?= html_entity_decode($svc['features']) ?>
                                </div>
                                 <hr>
                                <div class="section-title">Ideal For</div>
                                <div class="ideal-for">
                                    <?= html_entity_decode($svc['ideal_for']) ?>
                                </div>
                                <div class="row g-2 mt-3">
                                    <div class="col">
                                    <?php
                                        $catInfo = $categoryMeta[$svc['category_id']] ?? ['slug' => 'unknown', 'type' => 'individual'];
                                        ?>
                                        <a href="<?= base_url($catInfo['type'] . '/' . $catInfo['slug'] . '/' . $svc['slug']) ?>" class="btn btn-know-more">Know More</a>


                                    </div>  
                                    <div class="col">
                                    
                                    <button class="btn btn-add-cart">Add to cart 🛒</button>
                                    </div>    
                                </div>
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
                            <div class="price price-line">₹ <?= number_format($svc['price']) ?> <span>+ 18% GST</span></div>
                            <div class="footer mt-2">                    
                               <?php
                                    $catInfo = $categoryMeta[$svc['category_id']] ?? ['slug' => 'unknown', 'type' => 'individual'];
                                    ?>
                                    
                                    <a href="<?= base_url($catInfo['type'] . '/' . $catInfo['slug'] . '/' . $svc['slug']) ?>" class="btn btn-know-more">Know More</a>



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