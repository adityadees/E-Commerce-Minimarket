<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row position-relative">
        <li class="nav-item mobile-menu d-md-none mr-auto">
          <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
            <i class="ft-menu font-large-1"></i>
          </a>
        </li>
        <li class="nav-item mr-auto">
          <a class="navbar-brand" href="<?= base_url();?>admin">
            <img class="brand-logo" alt="stack admin logo" src="<?php echo base_url();?>assets/frontend/assets/img/favicon.png" width="30px" height="25px">
            <h2 class="brand-text">Gantri</h2>
          </a>
        </li>
        <li class="nav-item d-none d-md-block nav-toggle">
          <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
            <i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i>
          </a>
        </li>
        <li class="nav-item d-md-none">
          <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="fa fa-ellipsis-v"></i>
          </a>
        </li>
      </ul>
    </div>
    <div class="navbar-container content">
      <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="nav navbar-nav mr-auto float-left">
          <li class="nav-item d-none d-md-block">
            <a class="nav-link nav-link-expand" href="#">
              <i class="ficon ft-maximize"></i>
            </a>
          </li>
          <li class="nav-item nav-search">
            <a class="nav-link nav-link-search" href="#">
              <i class="ficon ft-search"></i>
            </a>
            <div class="search-input">
              <input class="input" type="text" placeholder="Explore Stack...">
            </div>
          </li>
        </ul>
        <ul class="nav navbar-nav float-right">
          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <span class="avatar avatar-online">
                <img src="<?php echo base_url();?>assets/backend/images/portrait/small/avatar-s-1.png" alt="avatar">
                <i></i>
              </span>
              <span class="user-name"><?= $_SESSION['user_username'];?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="<?= base_url();?>">
                <i class="ft-globe"></i> Lihat Website
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?= base_url();?>logout">
                <i class="ft-power"></i> Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
