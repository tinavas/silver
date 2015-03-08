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
    {{HTML::style('http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/foundation/dataTables.foundation.css')}}
    @yield('head')
</head>
<body>  
            <div class="medium-2 column no-padding left-side">
              <div class="user-info-container">
                  <div class="avatar-container">
                    {{HTML::image('resources/images/no-image.jpg');}}
                  </div>
                    <h6 class="title name no-margin">
                        <strong>{{Sentry::getUser()->first_name . ' ' .Sentry::getUser()->last_name}}</strong>
                    </h6>
                    <h6 class="title user-type no-margin">
                        {{Sentry::getUser()->getGroups()[0]->name}}
                    </h6>
              </div>
              
               <div class="sidenav-container">
                   
                    <ul class="side-nav">
                      <li><a href="{{url('/architect')}}">
                      <i class="fa fa-building fa-2x"> </i> 
                          <span class="title">Projects</span> 
                      </a>
                      </li>
                      <li><a href="{{url('/architect/quotations')}}">
                      <i class="fa fa-book fa-2x"> </i> 
                          <span class="title">My Quotations</span> 
                      </a>
                      </li>
                      <li><a href="{{url('/architect/viewer')}}">
                      <i class="fa fa-binoculars fa-2x"> </i> 
                          <span class="title">Other Quotations</span> 
                      </a>
                      </li>
                    </ul>
               </div>
            </div>
            <div class="medium-10 column no-padding right-side">
                
                <a href="{{URL::to('/logout')}}" class="icon logout">
                    <i class="fa fa-power-off"></i>
                </a>
                 <a href="{{URL::to('/architect/change-password')}}" class="icon"><i class="fa fa-gears"><span><h6>Settings</h6></span></i></a>
                <!--<a href="#" class="icon"><i class="fa fa-envelope"><span><h6>Messages</h6></span></i>-->
                </a>
                
            </div>
            
        <!-- Main Content Goes Here --> 
        <section class="content">
            <div class="medium-10 column content">
                @yield('content')
            </div>
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
    {{HTML::script('//cdn.datatables.net/1.10.4/js/jquery.dataTables.js')}}
    {{HTML::script('resources/js/uni.script.js')}}
    {{HTML::script('resources/js/footable.js')}}
    {{HTML::script('resources/js/footer.paginate.js')}}
    
    <script>
        $(document).foundation();
    </script>
</body>
</html>
