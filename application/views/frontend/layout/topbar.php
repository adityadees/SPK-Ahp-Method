  <header class="header">
    <div class="header-top hidden-tablet-landscape">
        <div class="container">
            <div class="header-top-content display-flex">
                <div class="header-top-info">
                    <div class="header-socials">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                    <a href="#" class="telephone"><i class="fas fa-mobile-alt"></i>+62 823 7137 3347</a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom hidden-tablet-landscape" id="js-navbar-fixed">
        <div class="container">
            <div class="header-bottom">
                <div class="header-bottom-content display-flex">
                    <div class="logo">
                        <a href="<?= base_url();?>">
                            <h1>Dinas PU</h1>
                        </a>
                    </div>
                    <div class="menu-search display-flex">
                        <nav class="menu">
                            <div>
                                <ul class="menu-primary">
                                    <li class="menu-item <?php if($title=='Home'){?>curent-menu-item<?php } else {}?>">
                                        <a href="<?= base_url();?>">Home</a>
                                    </li>
                                    <li class="menu-item <?php if($title=='Visi & Misi'){?>curent-menu-item<?php } else {}?>">
                                        <a href="<?= base_url();?>visimisi">Visi & Misi</a>
                                    </li>
                                    <li class="menu-item <?php if($title=='Sejarah'){?>curent-menu-item<?php } else {}?>">
                                        <a href="<?= base_url();?>sejarah">Sejarah Dinas</a>
                                    </li>
                                    <li class="menu-item <?php if($title=='Rekap Pembangunan'){?>curent-menu-item<?php } else {}?>">
                                        <a href="<?= base_url();?>rekap">Rekap Pembangunan</a>
                                    </li>
                                    <li class="menu-item <?php if($title=='Gallery'){?>curent-menu-item<?php } else {}?>">
                                        <a href="<?= base_url();?>gallery">Gallery</a>
                                    </li>
                                    <li class="menu-item <?php if($title=='Hubungi Kami'){?>curent-menu-item<?php } else {}?>">
                                        <a href="<?= base_url();?>hubungi">Hubungi Kami</a>
                                    </li>
                                    <li class="menu-item <?php if($title=='Kritik & Saran'){?>curent-menu-item<?php } else {}?>">
                                        <a href="<?= base_url();?>kritik">Kritik Saran</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden-tablet-landscape-up header-mobile">
        <div class="header-top-mobile">
            <div class="container-fluid">
                <div class="logo">
                    <a href="<?= base_url();?>">
                        <h1>Dinas PU</h1>
                    </a>
                </div>
                <div class="search-box">
                    <form method="POST">
                        <input type="text" placeholder="Search..." name="s" value="">
                        <div class="search-icon font-color-white display-flex-center">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                    </form>
                </div>
                <button class="hamburger hamburger--spin hidden-tablet-landscape-up" id="toggle-icon">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="au-nav-mobile">
            <nav class="menu-mobile">
                <div>
                    <ul class="au-navbar-menu">
                        <li class="menu-item <?php if($title=='Home'){?>curent-menu-item<?php } else {}?>">
                            <a href="<?= base_url();?>">Home</a>
                        </li>
                        <li class="menu-item <?php if($title=='Visi & Misi'){?>curent-menu-item<?php } else {}?>">
                            <a href="<?= base_url();?>visimisi">Visi & Misi</a>
                        </li>
                        <li class="menu-item <?php if($title=='Sejarah'){?>curent-menu-item<?php } else {}?>">
                            <a href="<?= base_url();?>sejarah">Sejarah Dinas</a>
                        </li>
                        <li class="menu-item <?php if($title=='Rekap Pembangunan'){?>curent-menu-item<?php } else {}?>">
                            <a href="<?= base_url();?>rekap">Rekap Pembangunan</a>
                        </li>
                        <li class="menu-item <?php if($title=='Gallery'){?>curent-menu-item<?php } else {}?>">
                            <a href="<?= base_url();?>gallery">Gallery</a>
                        </li>
                        <li class="menu-item <?php if($title=='Hubungi Kami'){?>curent-menu-item<?php } else {}?>">
                            <a href="<?= base_url();?>hubungi">Hubungi Kami</a>
                        </li>
                        <li class="menu-item <?php if($title=='Kritik & Saran'){?>curent-menu-item<?php } else {}?>">
                            <a href="<?= base_url();?>kritik">Kritik Saran</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- <div class="clear"></div> -->
        <div class="header-top">
            <div class="container-fluid">
                <div class="header-top-content display-flex">
                    <div class="header-top-info">
                        <a href="tel:6282371373347" class="telephone"><span><i class="fas fa-mobile-alt"></i></span> +62 823 7137 3347</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</header>
<main>
