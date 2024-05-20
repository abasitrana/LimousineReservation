<body>
  <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
      <div class="app-header header-shadow">
          <div class="app-header__logo">
              <div class="logo-src"></div>
              <div class="header__pane ml-auto">
                  <div>
                      <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                          <span class="hamburger-box">
                              <span class="hamburger-inner"></span>
                          </span>
                      </button>
                  </div>
              </div>
          </div>
          <div class="app-header__mobile-menu">
              <div>
                  <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                      <span class="hamburger-box">
                          <span class="hamburger-inner"></span>
                      </span>
                  </button>
              </div>
          </div>
          <div class="app-header__menu">
              <span>
                  <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                      <span class="btn-icon-wrapper">
                          <i class="fa fa-ellipsis-v fa-w-6"></i>
                      </span>
                  </button>
              </span>
          </div>
          <div class="app-header__content">
              <div class="app-header-left">
                  <div class="search-wrapper">
                      <div class="input-holder">
                          <input type="text" class="search-input" placeholder="Type to search" />
                          <button class="search-icon"><span></span></button>
                      </div>
                      <button class="close"></button>
                  </div>
              </div>
              <div class="app-header-right">
                  <div class="header-btn-lg pr-0">
                      <div class="widget-content p-0">
                          <div class="widget-content-wrapper">
                              <div class="widget-content-left">
                                  <div class="btn-group">
                                      <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                          <img width="42" class="rounded-circle" src="{{asset('assets/admin/assets/images/avatars/9.jpg')}}" alt="" />
                                          <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                      </a>
                                      <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                          <button type="button" tabindex="0" class="dropdown-item">Logout</button>
                                      </div>
                                  </div>
                              </div>
                              <div class="widget-content-left ml-3 header-user-info">
                                  <div class="widget-heading">
                                    logout
                                  </div>
                                  <div class="widget-subheading">
                                    {{Auth::user()->name}}
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="app-main">
          <div class="app-sidebar sidebar-shadow">
              <div class="app-header__logo">
                  <div class="logo-src"></div>
                  <div class="header__pane ml-auto">
                      <div>
                          <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                              <span class="hamburger-box">
                                  <span class="hamburger-inner"></span>
                              </span>
                          </button>
                      </div>
                  </div>
              </div>
              <div class="app-header__mobile-menu">
                  <div>
                      <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                          <span class="hamburger-box">
                              <span class="hamburger-inner"></span>
                          </span>
                      </button>
                  </div>
              </div>
              <div class="app-header__menu">
                  <span>
                      <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                          <span class="btn-icon-wrapper">
                              <i class="fa fa-ellipsis-v fa-w-6"></i>
                          </span>
                      </button>
                  </span>
              </div>
              <div class="scrollbar-sidebar">
                  <div class="app-sidebar__inner">
                      <ul class="vertical-nav-menu">
                          <li class="app-sidebar__heading">Pages</li>
                          <li>
                              <a href="#"><i class="fas fa-ellipsis-v"></i> Elements <i class="fas fa-angle-down"></i></a>
                              <ul>
                                  <li>
                                      <a href="javascript:;">
                                          <i class="metismenu-icon"></i>
                                          Buttons
                                      </a>
                                  </li>
                                  <li>
                                      <a href="javascript:;"> <i class="metismenu-icon"> </i>Dropdowns </a>
                                  </li>
                                  <li>
                                      <a href="javascript:;"> <i class="metismenu-icon"> </i>Icons </a>
                                  </li>
                                  <li>
                                      <a href="javascript:;"> <i class="metismenu-icon"> </i>Badges </a>
                                  </li>
                              </ul>
                          </li>
                          <li><a href="javascript:;"><i class="fas fa-ellipsis-v"></i> Tables</a></li>
                      </ul>
                  </div>
              </div>
          </div>