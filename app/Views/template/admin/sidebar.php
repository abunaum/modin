<?php
$request = \Config\Services::request();
$bar = $request->uri->getSegment(1);
?>
<div id="app-sidepanel" class="app-sidepanel">
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    <div class="sidepanel-inner d-flex flex-column">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <div class="app-branding">
            <a class="app-logo" href="<?= base_url(); ?>"><img class="logo-icon me-2" src="https://avatars.githubusercontent.com/u/70275608" alt="logo"><span class="logo-text">MODIN</span></a>

        </div>

        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                <li class="nav-item">
                    <a class="nav-link <?= ($judul == 'Dashboard') ? 'active' : ''; ?>" href="<?= base_url(); ?>">
                        <span class="nav-icon">
                            <svg width="1em" height="1em" viewBox="0 0 36 36" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path class="clr-i-outline clr-i-outline-path-1" d="M33.71 17.29l-15-15a1 1 0 0 0-1.41 0l-15 15a1 1 0 0 0 1.41 1.41L18 4.41l14.29 14.3a1 1 0 0 0 1.41-1.41z" fill="currentColor" />
                                <path class="clr-i-outline clr-i-outline-path-2" d="M28 32h-5V22H13v10H8V18l-2 2v12a2 2 0 0 0 2 2h7V24h6v10h7a2 2 0 0 0 2-2V19.76l-2-2z" fill="currentColor" />
                            </svg>
                            </svg>
                        </span>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1664 1920">
                                <path d="M664 162q-31 0-55.5-24T584 81t24.5-57T664 0q32 0 58 24t26 57t-26 57t-58 24zm294 0q-32 0-57-24t-25-57t25-57t57-24t57 24t25 57t-25 57t-57 24zm627 1620h-69v-326q0 43-40 73.5t-98 30.5q-57 0-97-30.5t-40-73.5q0 43-40.5 73.5T1103 1560t-97.5-30.5T965 1456q0 43-40.5 73.5T827 1560t-97.5-30.5T689 1456q0 43-40.5 73.5T551 1560t-97-30.5t-40-73.5q0 43-40.5 73.5T276 1560t-97.5-30.5T138 1456v326H69q-29 0-49 20t-20 49t20 49t49 20h1516q29 0 49-20t20-49t-20-49t-49-20zm-344-455q0 43 40 73.5t97 30.5q58 0 98-30t40-74v-61q0-43-28-73.5t-69-30.5H237q-41 0-70 30.5t-29 73.5v61q0 43 40.5 73.5T276 1431t97.5-30.5T414 1327q0 43 40 73.5t97 30.5t97.5-30.5T689 1327q0 43 40.5 73.5T827 1431t97.5-30.5T965 1327q0 43 40.5 73.5t97.5 30.5t97.5-30.5t40.5-73.5zm0-234V757q0 43-40.5 74t-97.5 31t-97.5-31t-40.5-74q0 43-40.5 74T827 862t-97.5-31t-40.5-74q0 43-40.5 74T551 862t-97-30.5t-40-74.5v336h827zM840 473h234l-78-162v-58q0-17-12-17h-55q-11 0-11 17v58zm290 0h34q34 0 55.5 29.5T1241 576v52q0 43-40.5 74t-97.5 31t-97.5-31t-40.5-74q0 43-40.5 74T827 733t-97.5-31t-40.5-74q0 43-40.5 74T551 733t-97-30.5t-40-74.5v-52q0-43 24-73t58-30h102V345h-45V231q0-11 13.5-25t23.5-14h151q10 0 23 14t13 25v114h-44v128h51q18-46 83-174v-69q0-11 14.5-24.5T908 192h98q12 0 26.5 13.5T1047 230v69q65 128 83 174z" fill="currentColor" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Data Nikah</span>
                        <span class="submenu-arrow">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </span>
                    </a>
                    <div id="submenu-1" class="collapse submenu submenu-1 <?= ($bar == 'nikah') ? 'show' : ''; ?>" data-bs-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a class="submenu-link <?= ($judul == 'Data Masuk') ? 'active' : ''; ?>" href="<?= base_url('nikah/masuk'); ?>">Nikah Masuk</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="account.html">Nikah Keluar</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="settings.html">Semua Data</a></li>
                        </ul>
                    </div>
                </li>
                <!--//nav-item-->
                <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
                        <span class="nav-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Data lain</span>
                        <span class="submenu-arrow">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </span>
                        <!--//submenu-arrow-->
                    </a>
                    <!--//nav-link-->
                    <div id="submenu-2" class="collapse submenu submenu-2 <?= ($bar == 'other') ? 'show' : ''; ?>" data-bs-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a class="submenu-link" href="login.html">Penolakan</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="signup.html">Surat Kematian</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="reset-password.html">Surat Kuasa</a></li>
                            <li class="submenu-item"><a class="submenu-link <?= ($judul == 'Kalender') ? 'active' : ''; ?>" href="<?= base_url('other/kalender'); ?>">Kalender</a></li>
                        </ul>
                    </div>
                </li>
                <!--//nav-item-->

                <!--//nav-item-->
                <li class="nav-item has-submenu">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-3">
                        <span class="nav-icon">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Person</span>
                        <span class="submenu-arrow">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </span>
                        <!--//submenu-arrow-->
                    </a>
                    <!--//nav-link-->
                    <div id="submenu-3" class="collapse submenu submenu-2 <?= ($bar == 'person') ? 'show' : ''; ?>" data-bs-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a class="submenu-link <?= ($judul == 'Person') ? 'active' : ''; ?>" href="<?= base_url('person'); ?>">List Data</a></li>
                        </ul>
                    </div>
                </li>
                <!--//nav-item-->
            </ul>
            <!--//app-menu-->
        </nav>
        <!--//app-nav-->
        <div class="app-sidepanel-footer">
            <nav class="app-nav app-nav-footer">
                <ul class="app-menu footer-menu list-unstyled">
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link" href="settings.html">
                            <span class="nav-icon">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />
                                    <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
                                </svg>
                            </span>
                            <span class="nav-link-text">Settings</span>
                        </a>
                        <!--//nav-link-->
                    </li>
                </ul>
                <!--//footer-menu-->
            </nav>
        </div>
        <!--//app-sidepanel-footer-->

    </div>
    <!--//sidepanel-inner-->
</div>
<!--//app-sidepanel-->