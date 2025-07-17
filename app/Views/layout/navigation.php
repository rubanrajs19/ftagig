<?php
use App\Models\ServiceCategoryModel;
$categoryModel = new ServiceCategoryModel();
$categories = $categoryModel->orderBy('name')->findAll();
$individualServices = array_filter($categories, fn($cat) => $cat['type'] === 'individual');
$bundledServices = array_filter($categories, fn($cat) => $cat['type'] === 'bundle');
?>
<style>
  @media (min-width: 1200px) {
    .lp-mega-menu-nav .menu{
      justify-content: flex-end;
    }
  }
  @media (max-width: 991.98px) {
    .menu-item-dropdown-content {
      display: none;
    }
    .menu-item-dropdown-content.show {
      display: contents;
    }
  }
  .custom-secondary-menu{
    display: none;;
  }
.menu-item-dropdown-content .grid--row {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(245px, 1fr));
  gap: 1rem;
}

.paragraph--type--mm-links{
  border-radius: 12px;
  background: #F5F8FA;
  padding:1rem 1rem;
}
.font_size_nav{
  font-size: 0.9rem;
}

</style>
<header class="l-header js-header isFixed">
  <div class="container container-flush">
    <div class="header">
      <div class="container-fluid">
        <div class="header__content d-flex flex-row align-items-center">
          <div>
            <div class="header__logo--block site-logo">
              <a class="site-logo__link navbar-brand" href="/" title="Header logo used to navigate to home page" rel="home">
                <?=view('logo.php') ?>
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
                <!-- Individual Services -->
                <li class="menu-item menu-item--has-content">
                  <div class="menu-item-href menu-item-href-with-submenu">
                    <a href="#"  class="menu-item-href-with-submenu-toggle">Individual Services</a>
                    <div class="menu-item-href-with-submenu-toggle">
                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.19526 11.5284C5.93491 11.7888 5.93491 12.2109 6.19526 12.4712C6.45561 12.7316 6.87772 12.7316 7.13807 12.4712L11.1381 8.47124C11.3984 8.21089 11.3984 7.78878 11.1381 7.52843L7.13807 3.52843C6.87772 3.26808 6.45561 3.26808 6.19526 3.52843C5.93491 3.78878 5.93491 4.21089 6.19526 4.47124L9.72386 7.99984L6.19526 11.5284Z" fill="#001137"></path>
                      </svg>
                    </div>
                  </div>

                  <div class="menu-item-dropdown-content">
                    <!-- <div class="menu-item-dropdown-content-title">Individual Services</div> -->
                    <div class="menu_link_content menu-link-contentmega-menu view-mode-default menu-dropdown menu-dropdown-0 menu-type-default">
                      <div class="layout--fourcol twenty-five">
                        <div class="grid--row grid--25-25-25-25">
                          <?php foreach ($individualServices as $cat): ?>
                            <div class="layout__region region--left">
                              <div class="paragraph paragraph--type--mm-links paragraph--view-mode--default">
                                <div>
                                  <a href="<?= base_url('individual-service/' . $cat['slug']) ?>">
                                    <div class="paragraph paragraph--type--mm-icon-links paragraph--view-mode--default">
                                      <div>
                                        <div>
                                          <?php
                                              $iconPath = FCPATH . 'assets/icons/' . $cat['slug'] . '.png';
                                              $iconUrl = file_exists($iconPath)
                                                  ? base_url('assets/icons/' . $cat['slug'] . '.png')
                                                  : base_url('assets/icons/default.png');
                                            ?>
                                            <img src="<?= $iconUrl ?>" alt="<?= esc($cat['name']) ?> Icon" loading="lazy">

                                        </div>
                                      </div>
                                      <div>
                                        <div class="font_size_nav"><?= esc($cat['name']) ?></div>
                                         <div class="text-muted small"><?= esc($cat['description']) ?></div>
                                        
                                      </div>
                                    </div>
                                  </a>
                                </div>
                              </div>
                            </div>
                          <?php endforeach; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>

                <!-- Service Bundles -->
                <li class="menu-item menu-item--has-content">
                  <div class="menu-item-href menu-item-href-with-submenu">
                    <a href="#"  class="menu-item-href-with-submenu-toggle">Service Bundles</a>
                    <div class="menu-item-href-with-submenu-toggle">
                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.19526 11.5284C5.93491 11.7888 5.93491 12.2109 6.19526 12.4712C6.45561 12.7316 6.87772 12.7316 7.13807 12.4712L11.1381 8.47124C11.3984 8.21089 11.3984 7.78878 11.1381 7.52843L7.13807 3.52843C6.87772 3.26808 6.45561 3.26808 6.19526 3.52843C5.93491 3.78878 5.93491 4.21089 6.19526 4.47124L9.72386 7.99984L6.19526 11.5284Z" fill="#001137"></path>
                      </svg>
                    </div>
                  </div>

                  <div class="menu-item-dropdown-content">
                    <!-- <div class="menu-item-dropdown-content-title">Service Bundles</div> -->
                    <div class="menu_link_content menu-link-contentmega-menu view-mode-default menu-dropdown menu-dropdown-0 menu-type-default">
                      <div class="layout--fourcol twenty-five">
                        <div class="grid--row grid--25-25-25-25">
                          <?php foreach ($bundledServices as $cat): ?>
                            <div class="layout__region region--left">
                              <div class="paragraph paragraph--type--mm-links paragraph--view-mode--default">
                                <div>
                                  <a href="<?= base_url('bundled-service/' . $cat['slug']) ?>">
                                    <div class="paragraph paragraph--type--mm-icon-links paragraph--view-mode--default">
                                      <div>
                                        <div>
                                          <?php
                                              $iconPath = FCPATH . 'assets/icons/' . $cat['slug'] . '.png';
                                              $iconUrl = file_exists($iconPath)
                                                  ? base_url('assets/icons/' . $cat['slug'] . '.png')
                                                  : base_url('assets/icons/default.png');
                                            ?>
                                            <img src="<?= $iconUrl ?>" alt="<?= esc($cat['name']) ?> Icon" loading="lazy">

                                        </div>
                                      </div>
                                      <div>
                                        <div class="font_size_nav"><?= esc($cat['name']) ?></div>
                                        <div  class="text-muted small"><?= esc($cat['description']) ?></div>
                                      </div>
                                    </div>
                                  </a>
                                </div>
                              </div>
                            </div>
                          <?php endforeach; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>

                 <li class="menu-item">
                    <div class="menu-item-href">
                        <a href="#about-us" >About</a>
                    </div>
                  </li> 
                  <!-- <li class="menu-item">
                    <div class="menu-item-href">
                         <a href="" traget="_blank" data-drupal-link-system-path="node/8">Signup</a>
                    </div>
                  </li>           -->
                
              </ul>
            </div>
          </nav>

        </div>
      </div>
    </div>
  </div>
</header>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const isMobile = window.matchMedia('(max-width: 991.98px)').matches;

    if (isMobile) {
      const menuItems = document.querySelectorAll('.menu-item.menu-item--has-content');

      menuItems.forEach(item => {
        const toggleWrapper = item.querySelector('.menu-item-href-with-submenu');
        const submenu = item.querySelector('.menu-item-dropdown-content');

        // Prevent default link action and toggle dropdown
        if (toggleWrapper && submenu) {
          toggleWrapper.addEventListener('click', function (e) {
            e.preventDefault(); // prevent navigating to #
            item.classList.toggle('open');
            submenu.classList.toggle('show');
          });

          // Prevent anchor inside from triggering default link
          const link = toggleWrapper.querySelector('a');
          if (link) {
            link.setAttribute('href', 'javascript:void(0);');
          }
        }
      });
    }
  });
</script>

