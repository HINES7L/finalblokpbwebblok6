<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />
  
    <title>Absensi Sekolah</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/logooo.png')?>">
    <!-- Pignose Calender -->
    <!-- <link href=".<?= base_url('assets/plugins/pg-calendar/css/pignose.calendar.min.css')?>" rel="stylesheet"> -->
    <!-- Chartist -->
   <!--  <link rel="stylesheet" href=".<?= base_url('assets/plugins/chartist/css/chartist.min.css')?>"> -->
    <!-- <link rel="stylesheet" href=".<?= base_url('assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')?>"> -->
    <!-- Custom Stylesheet -->
    <link href="<?= base_url('assets/css/style.css')?>" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                
                <a href="<?= base_url('index.html')?>">
                    <b class="logo-abbr"><img src="<?= base_url('assets/images/logoooo.png')?>" alt=""> </b>
                    <span class="logo-compact"><img src="<?= base_url('assets/images/logo123.PNG')?>" alt=""></span>
                    <span class="brand-title">
                        <img src="<?= base_url('assets/images/logonav.png')?>" alt="" width="180" height="auto">

                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <span class="bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"></span>
                <div id="google_translate_element"></div>
                <div class="header-right">
                    <ul class="clearfix">
                        <!-- <li class="icons dropdown"><a href="<?= base_url('javascript:void(0)')?>" data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="badge badge-pill gradient-1">4</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">4 New Messages</span>  
                                    <a href="<?= base_url('javascript:void()')?>" class="d-inline-block">
                                        <span class="badge badge-pill gradient-1">3</span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="notification-unread">
                                            <a href="<?= base_url('javascript:void()')?>">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Saiful Islam</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="notification-unread">
                                            <a href="<?= base_url('javascript:void()')?>">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/2.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Adam Smith</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Can you do me a favour?</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('javascript:void()')?>">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Barak Obama</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('javascript:void()')?>">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/4.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Hilari Clinton</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hello</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li> -->
                        <!-- <li class="icons dropdown"><a href="<?= base_url('javascript:void(0)')?>" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-pill gradient-2">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 New Notifications</span>  
                                    <a href="<?= base_url('javascript:void()')?>" class="d-inline-block">
                                        <span class="badge badge-pill gradient-2">5</span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="<?= base_url('javascript:void()')?>">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events near you</h6>
                                                    <span class="notification-text">Within next 5 days</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('javascript:void()')?>">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Started</h6>
                                                    <span class="notification-text">One hour ago</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('javascript:void()')?>">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Ended Successfully</h6>
                                                    <span class="notification-text">One hour ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('javascript:void()')?>">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events to Join</h6>
                                                    <span class="notification-text">After two days</span> 
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown d-none d-md-flex">
                            <a href="<?= base_url('javascript:void(0)')?>" class="log-user"  data-toggle="dropdown">
                                <span>English</span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="<?= base_url('javascript:void()')?>">English</a></li>
                                        <li><a href="<?= base_url('javascript:void()')?>">Dutch</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li> -->
                        <li class="icons dropdown" style="position: absolute; top: 10px; right: 10px; z-index: 1000;">
    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
        <span class="activity active"></span>
        <img src="<?= base_url('img/'.$prof->foto);?>" height="40" width="40" alt="">
        <span><?= $prof->username?></span>
    </div>
    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
        <div class="dropdown-content-body">
            <ul>
                <li>
                    <a href="<?= base_url('home/profile')?>"><i class="icon-user"></i> <span>Profile</span></a>
                </li>
                <li>
                    <a href="<?= base_url('javascript:void()')?>">
                        <i class="icon-envelope-open"></i> <span>Inbox</span> 
                        <div class="badge gradient-3 badge-pill gradient-1">3</div>
                    </a>
                </li>
                <hr class="my-2">
                <li>
                    <a href="<?= base_url('page-lock.html')?>"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                </li>
                <li><a href="<?= base_url('home/logout')?>"><i class="icon-key"></i> <span>Logout</span></a></li>
            </ul>
        </div>
    </div>
</li>

                    </ul>
                </div>
            </div>
        </div>
        <script>
    let idleTime = 0;
    const idleLimit = 10 * 60 * 1000; // 10 menit dalam milidetik

    function resetIdleTime() {
        idleTime = 0;
    }

    function startIdleTimer() {
        setInterval(() => {
            idleTime += 1000; // Tambah waktu idle setiap detik
            if (idleTime >= idleLimit) {
                window.location.href = "<?= base_url('home/logout') ?>"; // Redirect ke logout
            }
        }, 1000);
    }

    // Reset waktu idle jika ada aktivitas
    window.onload = resetIdleTime;
    document.onmousemove = resetIdleTime;
    document.onkeydown = resetIdleTime;
    document.onclick = resetIdleTime;
    document.onscroll = resetIdleTime;

    startIdleTimer();
</script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'id',
            includedLanguages: 'en,id',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

  