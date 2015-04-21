<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Silver Design</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
   <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> 
   <link href='http://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
    {{HTML::style('resources/libraries/foundation5.4.7/css/foundation.min.css');}}
    {{HTML::style('resources/css/hover-min.css');}}
    {{HTML::style('resources/css/style.css');}}
    @yield('head')
</head>
<body>    
        <!-- Main Content Goes Here --> 
        <section>
                @yield('content')
        </section>     
        <!-- End of Main Content -->
        
    <div class="row">
        <section class="footer">
            
        </section>
    </div>
    {{HTML::script('resources/libraries/foundation5.4.7/js/vendor/jquery.js')}}
    {{HTML::script('resources/libraries/jqueryui/js/jquery.ui.datepicker.js')}}
    {{HTML::script('resources/libraries/foundation5.4.7/js/vendor/modernizr.js')}}
    {{HTML::script('resources/libraries/foundation5.4.7/js/foundation.min.js')}}
    {{HTML::script('resources/libraries/foundation5.4.7/js/foundation/foundation.js')}}
    {{HTML::script('resources/libraries/foundation5.4.7/js/foundation/foundation.alert.js')}}
    {{HTML::script('resources/libraries/foundation5.4.7/js/foundation/foundation.reveal.js')}}
    {{HTML::script('resources/libraries/jqueryui/js/jquery.dataTables.min.js')}}
    {{HTML::script('resources/libraries/mindmup/mindmup-editabletable.js')}}
    {{HTML::script('resources/js/uni.script.js')}}
    {{HTML::script('resources/js/footable.js')}}
    {{HTML::script('resources/js/footer.paginate.js')}}
    
    <script>
        $(document).foundation();
    </script>
</body>
</html>
