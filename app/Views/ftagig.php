<?=view('layout/header') ?>

    <body>
        <a href="#main-content" class="visually-hidden focusable">
   Skip to main content
   </a>
  

<?= view('layout/navigation.php') ?>
<style>
    #searchSuggestions{
        display: none;
    }
    .search-suggestions-list {
    position: absolute;
    z-index: 10;
    background: white;
    width: 100%;
    border: 1px solid #ccc;
    max-height: 300px;
    overflow-y: auto;
    }
    .suggestion-item {
    padding: 10px;
    cursor: pointer;
    }
    .suggestion-item:hover {
    background-color: #f8f9fa;
    }
    .suggestion-highlight {
    font-weight: bold;
    color: #630ee1;
    }

</style>
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
                                                            <div class="search-wrapper position-relative">
                                                                <input type="text" class="search-input" id="serviceSearch" placeholder="Search for services...">
                                                                <div class="search-icon">
                                                                    <i class="fas fa-search"></i>
                                                                </div>
                                                                <div id="searchSuggestions" class="search-suggestions-list"></div>
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
       
       
       






    </body>
<script>
const baseUrl = "<?= base_url() ?>";

document.getElementById('serviceSearch').addEventListener('keyup', function () {
    let query = this.value.trim();
    if (query.length < 2) {
        document.getElementById('searchSuggestions').innerHTML = '';
        return;
    }

    fetch(`${baseUrl}search-services?query=${encodeURIComponent(query)}`)
        .then(res => res.json())
        .then(data => {
            let output = '';
            const regex = new RegExp(`(${query})`, 'gi');

            data.forEach(item => {
                const name = item.name.replace(regex, '<span class="suggestion-highlight">$1</span>');
                const desc = item.description ? item.description.replace(regex, '<span class="suggestion-highlight">$1</span>') : '';
                output += `<div class="suggestion-item" data-slug="${item.slug}">
                              <div>${name}</div>
                              <div class="text-muted small">${desc}</div>
                           </div>`;
            });
            document.getElementById("searchSuggestions").style.display = "block";
            document.getElementById('searchSuggestions').innerHTML = output;

            // click handler
            document.querySelectorAll('.suggestion-item').forEach(item => {
                item.addEventListener('click', function () {
                    const slug = this.getAttribute('data-slug');
                    window.location.href = `${baseUrl}/${slug}`;
                });
            });
        });
});
</script>




    <?=view('layout/footer') ?>