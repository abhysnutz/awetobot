
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
                <div class="d-flex align-items-center justify-content-center top-main-wrapper">
                    <div class="top-data-wrapper" id="pending-pairing" style="display:block;">
                        <div class="align-items-center">
                            <h1>AWETOBOT INSTALLED SUCCESSFULLY</h1>
                            
                            <br><br>
                        </div>
                        <div class="top-data-code value-token"></div>
                        <input type="hidden" id="hardware_id" value="{{ $hardware_id ?? '' }}">
                        <input type="hidden" id="public_ip" value="{{ $public_ip ?? '' }}">
                        <input type="hidden" id="tunnel_ip" value="{{ $tunnel_ip ?? '' }}">

                        <div class="row">
                            <div class="col text-center">
                                <h4>Enter Pairing Code For This AWETOBOT</h4>
                                <br><br>
                                <small>Pairing Code can be found at awetomate.io > [Site this awetobot is assigned to] > awetobot</small>
                                <br><br>

                                <input type="text" name="paircode" id="paircode" placeholder="Input Pair Code">
                                <button id="btn-paircode"> submit </button>
                            </div>
                        </div>
                    </div>

                    <div class="top-data-wrapper" id="pending-approval" style="display:none;">
                        <div class="align-items-center">
                            <h1>PENDING PAIRING APPROVAL ON AWETOMATE.IO</h1>
                            <br><br>
                            <br><br>
                            <br><br>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <h4>AWETOBOT MACHINE ID</h4>
                                <br>
                                <h2 style="font-size:25px;">{{ $hardware_id ?? '' }}</h2>
                                <br><br><br>
                                <small>You can approve this awetobot at awetomate.io > [Site this awetobot is assigned to] > awetobot</small>
                                <br><br><br>
                                <br><br><br>
                                <br><br><br>

                                <a href="#" class="btn-restart">Restart Pairing Process</a>
                            </div>
                        </div>
                    </div>

                    <div class="top-data-wrapper" id="pairing-approved" style="display:none;">
                        <div class="align-items-center">
                            <h1 class="text-approved">PAIRING APPROVED</h1>
                            <br><br>
                            <div class="row">
                                <div class="col text-center">
                                    <h5>Installing awetobot</h5>
                                    <br><br>
                                    <br><br>
                                    <table class="text-left" cellspacing="5px" cellpadding="5px">
                                        <tr>
                                            <td>1. Downloading Site Details</td>
                                            <td style="color:green; display:none;" id="installation-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                                </svg>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2. Downloading awetobot Configurations</td>
                                            <td style="color:green; display:none;" id="installation-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                                </svg>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>3. Configuring awetobot</td>
                                            <td style="color:green; display:none;" id="installation-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                                </svg>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4. Establishing Tunnel</td>
                                            <td style="color:green; display:none;" id="installation-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                                </svg>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5. Verifying Configurations</td>
                                            <td style="color:green; display:none;" id="installation-5">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                                </svg>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6. Finishing up installations</td>
                                            <td style="color:green; display:none;" id="installation-6">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                                </svg>
                                            </td>
                                        </tr>
                                    </table>
                                
                                    <br><br><br>
                                    <br><br><br>
                                    <br><br><br>
                                    <a href="#" class="btn-restart">Restart Pairing Process</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="status" value="">
                    <input type="hidden" id="bot_id" value="">
                </div>
            </div>
        </div>

        <!-- END HEADER -->
        <div class="clearfix"></div>


        <script type="text/javascript">
            $(document).ready(function () {
                getBot();
                // Authentication Button
                $(document).on('click','#btn-paircode', function(e){
                    e.preventDefault();
                    let paircode = $('#paircode').val();
                    let hardware_id = $('#hardware_id').val();
                    let public_ip = $('#public_ip').val();
                    let data = 'paircode=' +paircode+ '&hardware_id=' +hardware_id+ '&public_ip=' +public_ip;
                    let url = "{{ route('pairCode') }}";

                    $.post(url, data, function(result) {
                        if(result.status == 1){
                            getBot();
                        }else{
                            alert('WRONG CODE');
                        }
                    });
                });

                $(document).on('click','.btn-restart', function(e){
                    e.preventDefault();
                    if (confirm('Restarting will disassociate this awetobot from any site it is authenticated to. Restart?')) {
                        restart();
                    }
                });

                // End Authentication Button

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

            function getBot(){
                $.post("{{ route('getBot') }}", function(result) {
                    let status = result.status;
                    let bot_id = result.bot_id;
                    $('#bot_id').val(bot_id);
                    status = status.toLowerCase().replace(' ', '-');
                    console.log(status);
                    $('#status').val(status);
                    $('.top-data-wrapper').hide();
                    $('#'+status).show();
                    $('#paircode').val('');
                });
            }

            setInterval(checkApproval, 3000);
            
            setTimeout(() => {
                checkInstallation();
                successInstallation();
            }, 1000);

            function checkApproval() {
                let status = $('#status').val();
                let bot_id = $('#bot_id').val();

                if(status == 'pending-approval'){
                    let data = 'bot_id=' +bot_id;

                    $.post("{{ route('checkApproval') }}", data, function(result) {
                        if(result.status == 1){
                            if(result.bot_status == 'PAIRING APPROVED'){
                                getBot();
                                setTimeout(() => {
                                    checkInstallation();
                                }, 1000);
                            }else if(result.bot_status == 'DENY'){
                                getBot();
                            }
                        }
                    });
                }
            }

            function successInstallation(){
                let status = $('#status').val();

                if(status == 'pairing-approved'){
                    $.post("{{ route('successInstallation') }}", function(result) {
                        if(result.status == 1){
                            $.each(result.data , function(k, v){
                                let id = v.id;
                                $('#installation-'+id).show();
                                if(result.data.length == 6){
                                    $('.text-approved').text('APPROVED');
                                }
                            });
                        }
                    });
                }
            }

            function checkInstallation(){
                let status = $('#status').val();
                let bot_id = $('#bot_id').val();
                let tunnel_ip = $('#tunnel_ip').val();

                if(status == 'pairing-approved'){
                    let data = 'bot_id=' +bot_id+ '&tunnel_ip=' +tunnel_ip;

                    $.post("{{ route('checkInstallation') }}", data, function(result) {
                        console.log(result);
                        if(result.status == 1){
                            if(result.progress == 'start'){
                                let data = result.data;
                                let id = data.id;
                                let status = data.status;
                                let name = data.name;
                                
                                if(status == 0){
                                    console.log(name+' progress');
                                    installation(name, id);
                                }
                            }else if(result.progress == 'progress'){
                                console.log('cccccc');
                                setTimeout(() => {
                                    checkInstallation();
                                }, 5000);
                            }else{
                                $('.text-approved').text('APPROVED');
                                $('#status').val('approved');
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            }
                        }
                    });
                }
            }

            function installation(name, id){
                let data = 'name=' +name;
                $.post("{{ route('installation') }}", data, function(result) {
                    if(result.status == 1){
                        console.log('success install '+name);
                        $('#installation-'+id).show();

                        checkInstallation();
                    }
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