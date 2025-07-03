<?=view('layout/header') ?>

    <body>
        <a href="#main-content" class="visually-hidden focusable">
   Skip to main content
   </a>
  
<header class="l-header js-header isFixed header-pinned">
    <div class="container container-flush">
        <div class="">
            <div class="container-fluid">
                <div class="header__content d-flex flex-row align-items-center">
                    <div>
                        <div class="header__logo--block site-logo" style="max-width: 130px;">
                            <a class="site-logo__link navbar-brand" href="/" title="Header logo used to navigate to home page" rel="home">
            <img src="<?=base_url('assets/images/logo.png') ?>" alt="Home">
            </a>
                        </div>
                    </div>
                    <nav role="navigation" aria-labelledby="block-beroe-megamenu-menu" id="block-beroe-megamenu" class="lp-mega-menu-nav lp-mega-menu-nav-desktop">
                        <h2 class="visually-hidden" id="block-beroe-megamenu-menu">Mega menu</h2>
                        <div class="hamburger-icon">
                            <div class="bar"></div>
                            <div class="bar"></div>
                            <div class="bar"></div>
                        </div>
                        <div class="navbar-nav">
                            <ul data-region="header" class="menu menu-level-0">
                                <li class="menu-item">
                                    <div class="menu-item-href">
                                        <a href="#what-we-do" data-drupal-link-system-path="node/32">What We Do</a>
                                    </div>
                                </li>
                                <li class="menu-item">
                                    <div class="menu-item-href">
                                        <a href="#working-with-us" data-drupal-link-system-path="node/32">Working With Us</a>
                                    </div>
                                </li>
                                <li class="menu-item">
                                    <div class="menu-item-href">
                                        <a href="#why-fta" data-drupal-link-system-path="node/32">Why FTA ?</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <nav role="navigation" aria-labelledby="block-beroe-headersecondarymenu-menu" id="block-beroe-headersecondarymenu" class="header-secondary-menu-nav">
                        <h2 class="visually-hidden" id="block-beroe-headersecondarymenu-menu">Header secondary menu</h2>
                        <div class="navbar-nav">
                            <ul class="menu menu--level-0">
                                <li class="menu__item">
                                    <a href="https://www.linkedin.com/company/ftaglobal/jobs/" target="_blank">Careers</a>
                                </li>
                                <li class="menu__item">
                                    <a href="https://calendly.com/d/cq97-wf4-vqk/fta-global?month=2025-05" traget="_blank" data-drupal-link-system-path="node/8">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="main">
    <a id="main-content" tabindex="-1"></a>
    <div class="container container-flush">
        <div>
            <div id="block-beroe-content" class="block block-system block-system-main-block">
                <div class="block--content">
                    <article data-history-node-id="72">
                        <div>
                            <div class="field--node--field-hero mbl-hero">
                                <div>
                                    <div class="paragraph paragraph--type--hero-large paragraph--view-mode--default">
                                        <div class="hero-large-default-section__wrapper">
                                            <div class="hero-large-default-section__background">
                                                <div>
                                                    <div>
                                                        <div>
                                                            <picture>
                                                                <source srcset="<?=base_url('assets/images/hero-bg.jpg') ?>" media="(min-width: 1920px)" type="image/webp" width="1888" height="804">
                                                                <source srcset="<?=base_url('assets/images/hero-bg.jpg') ?>" media="(min-width: 1200px) and (max-width: 1919px)" type="image/webp" width="1887" height="944">
                                                                <source srcset="<?=base_url('assets/images/hero-bg.jpg') ?>" media="(min-width: 768px) and (max-width: 1199px)" type="image/webp" width="768" height="1503">
                                                                <source srcset="<?=base_url('assets/images/hero-bg.jpg') ?>" media="(max-width: 767px)" type="image/webp" width="768" height="1503">
                                                                <img loading="eager" src="<?=base_url('assets/images/hero-bg.jpg') ?>" width="1920" height="960" alt="403">
                                                            </picture>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hero-large-default-section__content">
                                                <div class="hero-large-default-section__left">
                                                    <h4 class="hero-large-default-section__eyebrow">
                        <div style="max-width: 325px;     font-weight: 400;    letter-spacing: 1px; margin-bottom: 1rem;">All-in-one digital services to help you grow smarter and faster.</div>
                        </h4>
                                                    <div class="hero-large-default-section__heading">
                                                        <h1>
                            <div>Sit back. Our experts <br>will take it from here</div>
                        </h1>
                                                    </div>
                                                    <div class="hero-large-default-section__description">
                                                        <div>
                                                            <div class="search-wrapper">
                                                                <input type="text" class="search-input" placeholder="Search for services...">
                                                                <div class="search-icon">
                                                                    <i class="fas fa-search"></i>
                                                                </div>
                                                            </div>

                                                            <!-- Service Buttons -->
                                                            <div class="service-buttons">
                                                                <button>SEO <i class="fas fa-arrow-right"></i></button>
                                                                <button>Paid Media <i class="fas fa-arrow-right"></i></button>
                                                                <button>Website Design <i class="fas fa-arrow-right"></i></button>
                                                                <button>Social Media <i class="fas fa-arrow-right"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="hero-large-default-section__description">
                                                        <div>
                                                            <p class="mb-0">Trusted by:</p>
                                                            <?=view('trusted-partner') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="hero-large-default-section__right c-hero-section">
                                                    <div class="hero-large-default-section__media">
                                                        <div>
                                                            <div>
                                                                <div>
                                                                    <!-- <picture>
                                    <source srcset="<?=base_url('assets/images/hero-right-img.png') ?>" media="(min-width: 1920px)" type="image/webp" width="736" height="552">
                                    <source srcset="<?=base_url('assets/images/hero-right-img.png') ?>" media="(min-width: 1200px) and (max-width: 1919px)" type="image/webp" width="736" height="552">
                                    <source srcset="<?=base_url('assets/images/hero-right-img.png') ?>" media="(min-width: 768px) and (max-width: 1199px)" type="image/webp" width="736" height="552">
                                    <source srcset="<?=base_url('assets/images/hero-right-img.png') ?>" media="(max-width: 767px)" type="image/webp" width="736" height="552">
                                    <img loading="eager" src="<?=base_url('assets/images/hero-right-img.png') ?>" width="736" height="552" alt="Category Watch">
                                    </picture> -->
                                                                    <div class="container mt-2">
                                                                        <style>
                                                                            .error-message {
                                                                            color: red;
                                                                            font-size: 0.875em;
                                                                            }
                                                                        </style>





                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>































                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>


<section class="tabs-container">
    <?=view('services_section') ?>
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
        <script id="hs-script-loader" text="" charset="" type="text/javascript" src="//js.hs-scripts.com/19915834.js"></script>
        <script id="cookieyes" text="" charset="" type="text/javascript" src="https://cdn-cookieyes.com/client_data/aa6f86e2b7c6f775c6094c25/script.js"></script>
        <script type="text/javascript" id="" charset="">
            (function(a,e,b,f,g,c,d){a[b]=a[b]||function(){(a[b].q=a[b].q||[]).push(arguments)};c=e.createElement(f);c.async=1;c.src="https://www.clarity.ms/tag/"+g+"?ref\x3dgtm2";d=e.getElementsByTagName(f)[0];d.parentNode.insertBefore(c,d)})(window,document,"clarity","script","huhljgbuz8");
        </script>
        <script id="" text="" charset="" type="text/javascript" src="https://plausible.io/js/script.js"></script>
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
        <iframe allow="join-ad-interest-group" data-tagging-id="AW-988582562" data-load-time="1747328605321" height="0" width="0" src="https://td.doubleclick.net/td/rul/988582562?random=1747328605301&amp;cv=11&amp;fst=1747328605301&amp;fmt=3&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be55d1v898981829za200zb896781088&amp;gcd=13l3l3l3l1l1&amp;dma=0&amp;tag_exp=101509156~103116026~103130498~103130500~103200004~103233424~103252644~103252646~103301114~103301116&amp;ptag_exp=101509157~103116026~103130498~103130500~103200004~103207801~103233427~103252644~103252646~103263070~103301114~103301116&amp;u_w=1920&amp;u_h=1080&amp;url=https%3A%2F%2Fwww.ftaglobal.in%2Fcategory-watch&amp;ref=https%3A%2F%2Fwww.ftaglobal.in%2Fberoe-live-ai&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Category%20Watch%20%7C%20Beroe&amp;did=dZTQ1Zm&amp;gdid=dZTQ1Zm&amp;npa=0&amp;pscdl=noapi&amp;auid=719138752.1747328233&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B136.0.7103.93%7CGoogle%2520Chrome%3B136.0.7103.93%7CNot.A%252FBrand%3B99.0.0.0&amp;uamb=0&amp;uam=&amp;uap=Windows&amp;uapv=19.0.0&amp;uaw=0&amp;fledge=1&amp;data=event%3Dgtag.config"
        style="display: none; visibility: hidden;"></iframe>







    </body>
    <?=view('layout/footer') ?>