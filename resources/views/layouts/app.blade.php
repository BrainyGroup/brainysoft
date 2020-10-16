<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="BrainySoft"  name="description" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', $title) }}</title> --}}
   
   

    <title>{{ config('app.name', 'BrainySoft') }}</title>

    {{-- <title>{{ $title }}</title> --}}

    


    <!-- Scripts -->
  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

            <!-- BEGIN GLOBAL MANDATORY STYLES -->
            <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
            <link href="{{ asset('datatable/assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('datatable/assets/css/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
            {{-- <link href="{{ asset('datatable/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" /> --}}
            <link href="{{ asset('datatable/assets/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
            <!-- END GLOBAL MANDATORY STYLES -->
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <link href="{{ asset('datatable/assets/css/datatables.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('datatable/assets/css/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('datatable/assets/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN THEME GLOBAL STYLES -->
            <link href="{{ asset('datatable/assets/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
            <link href="{{ asset('datatable/assets/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
            <!-- END THEME GLOBAL STYLES -->
            <!-- BEGIN THEME LAYOUT STYLES -->
            <link href="{{ asset('datatable/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('datatable/assets/css/darkblue.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
            <link href="{{ asset('datatable/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
            <!-- END THEME LAYOUT STYLES -->

            <!-- summernote css/js -->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
           
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

            <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">



            <link rel="shortcut icon" href="favicon.ico" /> </head>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">
    



    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Fonts -->
    

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

   
</head>
<body>
    <div id="app">
        
        @include('layouts.nav')

        <main class="py-4">

            <div class="container">
                 <div class="row justify-content-center">
                    @include('layouts.errors')
                    @include('layouts.success')
                    @yield('content')

                    


                  
        
        
                    
                    
                    
        
  
                
                 </div>
                 
            </div>
            
        </main>
        @include('layouts.footer')
    </div>
            <!-- BEGIN CORE PLUGINS -->

        <script src="{{ asset('datatable/assets/js/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('datatable/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('datatable/assets/js/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('datatable/assets/js/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('datatable/assets/js/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('datatable/assets/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ asset('datatable/assets/js/datatable.js')}}" type="text/javascript"></script>
        <script src="{{ asset('datatable/assets/js/datatables.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('datatable/assets/js/datatables.bootstrap.js')}}" type="text/javascript"></script>
        <script src="{{ asset('datatable/assets/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ asset('datatable/assets/js/app.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ asset('datatable/assets/js/table-datatables-buttons.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->

        <!-- END THEME LAYOUT SCRIPTS -->

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

        @if(isset($documentation->description))

        <script>            
            $(document).ready(function() {
                //$('.summernote').summernote();
                $(".summernote").summernote('code', '{!! json_encode($documentation->description) !!}');
            });
        </script>

        @else 

        <script>            
            $(document).ready(function() {
                $('.summernote').summernote();
              
            });
        </script>

        @endif
        

</body>
</html>
