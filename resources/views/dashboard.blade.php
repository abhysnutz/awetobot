<!DOCTYPE html>
<!--
Item Name: Elisyam - Web App & Admin Dashboard Template
Version: 1.5
Author: SAEROX

** A license must be purchased in order to legally use this template for your project **
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AWETOBOT</title>
        <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>

        
        <script>
            WebFont.load({
                google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="http://itm-desk.dv9.com/itm-old/assets/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="http://itm-desk.dv9.com/itm-old/assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="http://itm-desk.dv9.com/itm-old/assets/img/favicon-16x16.png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="http://itm-desk.dv9.com/itm-old/assets/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="http://itm-desk.dv9.com/itm-old/assets/vendors/css/base/elisyam-1.5.min.css">
        <link rel="stylesheet" href="http://itm-desk.dv9.com/itm-old/assets/css/animate/animate.min.css">
        <link rel="stylesheet" href="http://itm-desk.dv9.com/itm-old/assets/css/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="http://itm-desk.dv9.com/itm-old/assets/css/owl-carousel/owl.theme.min.css">
        <link rel="stylesheet" href="http://itm-desk.dv9.com/itm-old/assets/css/leaflet/leaflet.min.css">
        <link rel="stylesheet" href="http://itm-desk.dv9.com/itm-old/assets/css/scrolling-tabs/jquery.scrolling-tabs.css">
        <link rel="stylesheet" href="http://itm-desk.dv9.com/itm-old/assets/css/bootstrap-select/bootstrap-select.min.css">
        <link rel="stylesheet" href="http://itm-desk.dv9.com/itm-old/assets/css/custom.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="http://itm-desk.dv9.com/itm-old/assets/vendors/js/base/jquery.min.js"></script>
        <script src="http://itm-desk.dv9.com/itm-old/assets/vendors/js/base/core.min.js"></script>
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body id="page-top">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="http://itm-desk.dv9.com/itm-old/assets/img/logo.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        
        <!-- BEGIN HEADER -->
        <div class="top">
            <div class="container">
                <a href="#" class="logout" style="float: right;">LOGOUT</a>
                <a href="#" class="unpair" style="float: right; margin-right:20px;">UNPAIR</a>
                <div class="d-flex align-items-center justify-content-center top-main-wrapper">
                    <div class="top-data-wrapper">
                        
                        <div class="align-items-center" style="text-align: center;">
                        
                            <h1 style="text-transform: uppercase;">{{ $bot->site_name }}</h1>
                            
                            <br><br>
                        </div>

                        <div class="row">
                            <div class="col text-center">
                                <h4>Site Awetobot ID : {{ $bot->id }}</h4>
                                <h2>CONNECTED</h2>
                                <br><br>
                                <h3>INTERFACES</h3>
                                
                                <br><br>
                                Interface Table List
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="bot_id" value="{{ $bot->id }}">
                </div>
            </div>
        </div>

        <!-- END HEADER -->
        <div class="clearfix"></div>

        <script type="text/javascript">
            $(document).ready(function () {
                $(document).on('click','.unpair', function(e){
                    e.preventDefault();
                    if (confirm('Unpair this Awetobot from Site ?')) {
                        restart();
                    }
                });
        
                $(document).on('click','.logout', function(e){
                    e.preventDefault();
                    logout();
                });
            });
        
            function restart(){
                let bot_id = $('#bot_id').val();
        
                let data = 'bot_id=' +bot_id;
        
                $.post("{{ route('restart') }}", data, function(result) {
                    if(result.status == 1){
                        location.reload();
                    }
                });
            }
        
            function logout(){
                $.post("{{ route('logout') }}", function() {
                    setTimeout(location.reload(), 2000);
                });
            }
        </script>

        <!-- Begin Footer -->
        <footer class="main-footer pt-4 pb-4">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                    <p class="text-gradient-02">AWETOBOT - Copyright 2022</p>
                </div>
            </div>
        </footer>        
		<!-- End Footer -->  
        
        
        <!-- Begin Modal -->
        <div id="success-modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="sa-icon sa-success animate" style="display: block;">
                            <span class="sa-line sa-tip animateSuccessTip"></span>
                            <span class="sa-line sa-long animateSuccessLong"></span>
                            <div class="sa-placeholder"></div>
                            <div class="sa-fix"></div>
                        </div>
                        <div class="section-title mt-5 mb-2">
                            <h2 class="text-gradient-02">Save Successfully!</h2>
                        </div>
                        <p class="mb-5">You can configure the rest at www.3act.com</p>
                        <button type="button" class="btn btn-gradient-01 mb-3" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
        
                  
        <!-- Begin Vendor Js -->
        
        
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="http://itm-desk.dv9.com/itm-old/assets/vendors/js/nicescroll/nicescroll.min.js"></script>
        <!-- <script src="http://itm-desk.dv9.com/itm-old/assets/vendors/js/noty/noty.min.js"></script> -->
        <script src="http://itm-desk.dv9.com/itm-old/assets/vendors/js/chart/chart.min.js"></script>
        <script src="http://itm-desk.dv9.com/itm-old/assets/vendors/js/owl-carousel/owl.carousel.min.js"></script>
        <script src="http://itm-desk.dv9.com/itm-old/assets/vendors/js/calendar/moment.min.js"></script>
        <script src="http://itm-desk.dv9.com/itm-old/assets/vendors/js/calendar/fullcalendar.min.js"></script>
        <script src="http://itm-desk.dv9.com/itm-old/assets/vendors/js/leaflet/leaflet.min.js"></script>
        <script src="http://itm-desk.dv9.com/itm-old/assets/vendors/js/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="http://itm-desk.dv9.com/itm-old/assets/vendors/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
        <!-- Begin Page Snippets -->
        <!-- <script src="http://itm-desk.dv9.com/itm-old/assets/js/dashboard/db-clean.min.js"></script> -->
        <script src="http://itm-desk.dv9.com/itm-old/assets/js/scrolling-tabs/jquery.scrolling-tabs.min.js"></script>
        <script src="http://itm-desk.dv9.com/itm-old/assets/js/components/validation/validation.min.js"></script>
        <!-- End Page Snippets -->
        
        <script type="text/javascript">
            $('.nav-tabs').scrollingTabs({
                scrollToTabEdge: true,
                disableScrollArrowsOnFullyScrolled: true,
                enableSwiping: true
            });

            $("#type").on("change", function () {        
                  $modal = $('#modal-new-role');
                  if($(this).val() === 'newrole'){
                    $modal.modal('show');
                }
             });
        </script>
        
    </body>
</html>