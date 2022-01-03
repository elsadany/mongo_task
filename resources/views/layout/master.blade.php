
<!-- - var menuBorder = true--><!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="LivewellGX Dashboard">
        <meta name="keywords" content="LivewellGX  Dashboard">
        <meta name="author" content="PIXINVENT">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <base href="{{URL::to('/public/')}}">
        <script>
            var base = "{{URL::to('/public/')}}";
        </script>
        <title>Mongo | @yield('title')</title>
        <link rel="apple-touch-icon" href="./assets/backend/images/ico/apple-icon-120.png">
        <link rel="shortcut icon" type="image/x-icon" href="./assets/backend/images/ico/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="./assets/backend/css/vendors.min.css">
                <link rel="stylesheet" type="text/css" href="{{url('assets/backend/vendors/css/tables/datatable/datatables.min.css')}}">

        <link rel="stylesheet" type="text/css" href="./assets/backend/vendors/css/ui/prism.min.css">
        <link rel="stylesheet" type="text/css" href="{{url('assets/backend/tags/tagsinput.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('assets/backend/css/select2.min.css')}}">

        <!-- END VENDOR CSS-->
        <!-- BEGIN STACK CSS-->
        <link rel="stylesheet" type="text/css" href="./assets/backend/css/app.min.css">
        <!-- END STACK CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="./assets/backend/css/core/menu/menu-types/vertical-menu.min.css">
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{url('assets/backend/css/pages/app-chat.min.css')}}">

        <link rel="stylesheet" type="text/css" href="./assets/backend/style.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <!-- END Custom CSS-->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
        <!-- BEGIN VENDOR JS-->
        <script src="./assets/backend/vendors/js/vendors.min.js" type="text/javascript"></script>
        {{-- <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script> --}}
        <script src="https://cdn.ckeditor.com/4.13.1/full-all/ckeditor.js"></script>
        {{-- <script src="./assets/backend/js/ckeditor.js"></script> --}}

    </head>
    <body class="vertical-layout vertical-menu 2-columns chat-application   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

        @include('layout.menu')

        <div class="app-content content">
            <div class="content-wrapper">
                @yield('content')

            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////-->

        <!-- customizer here -->

        <footer class="footer footer-static footer-light navbar-border">
            <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2021 <a class="text-bold-800 grey darken-2" href="https://www.litpeaks.com/" target="_blank">LITPEAKS </a>, All rights reserved. </span><span class="float-md-right d-block d-md-inline-block d-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span></p>
        </footer>

        <!-- BEGIN VENDOR JS-->
        <!-- BEGIN PAGE VENDOR JS-->
                <script type="text/javascript" src="{{url('assets/backend/js/select2.full.min.js')}}"></script>

        <script type="text/javascript" src="./assets/backend/vendors/js/ui/prism.min.js"></script>
        <!-- END PAGE VENDOR JS-->
        <!-- BEGIN STACK JS-->
                <script src="{{url('assets/backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>
        <script src="{{url('assets/backend/js/scripts/tables/datatables/datatable-basic.min.js')}}"></script>
        <script src="./assets/backend/js/core/app-menu.min.js" type="text/javascript"></script>
        
        <script src="./assets/backend/js/core/app.min.js" type="text/javascript"></script>
        <script src="./assets/backend/js/scripts/customizer.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>


        <script>
                        $(document).ready(function () {

              if ($(".editor").length > 0) {
                    // $(".editor").summernote({'width': '100%', 'height': '300px'});

                    $('.editor:not([id])').each(function (e) {
                        $(this).attr('id', 'txt_' + Math.round(Math.random() * 1000));
                    });
                    if (CKEDITOR) {
                       
                        CKEDITOR.on('dialogDefinition', function (ev)
                        {
                            // Take the dialog name and its definition from the event data.
                            var dialogName = ev.data.name;
                            var dialogDefinition = ev.data.definition;

                            // Check if the definition is from the dialog we're
                            // interested in (the 'image' dialog). This dialog name found using DevTools plugin
                            
                        });

                        
                        $('.editor').each(function () {
                            $(this).parent().css('padding-bottom', '20px');
                            CKEDITOR.replace(this.id,{
                                enterMode : CKEDITOR.ENTER_DIV,
                                // Use the ability to specify elements as an object.
                                attributes: true,
                                styles: true,
                                classes: true,
                                allowedContent : true
                            });
                        });
                    }
                }
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                            $('.select2').select2();

        </script>
        <style>
            div.dataTables_wrapper div.dataTables_filter input{border: 1px solid #ddd;}
div.dataTables_wrapper div.dataTables_filter input::focus-within{outline: none !important;}
#DataTables_Table_0_previous{float:left!important}
            .form-group .error{
                color:red;
            }
            #content .row{margin:0px !important}


        </style>

        <!-- END STACK JS-->

        {{-- datatable scripts --}}
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        
        $('.data-table').DataTable({
            "order": [
                [0,'desc']
            ],
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ]
        }); 
    });
</script>
        {{-- end datatable scripts --}}


        <!-- BEGIN PAGE LEVEL JS-->
        <!-- END PAGE LEVEL JS-->
        
        @stack('script')
    </body>

</html>