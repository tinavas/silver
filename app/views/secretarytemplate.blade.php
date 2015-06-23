<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<?php

  //SORRY I HAVE TO DO THIS TO BEAT THE DEADLINE

  $user = Sentry::getUser();
  $count = Notification::where('user_id',$user->id)->where('is_read',0)->count();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Silver Design</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
   <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> 
   <link href='http://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
    {{HTML::style('resources/libraries/foundation5.4.7/css/foundation.min.css');}}
    {{HTML::style('resources/libraries/jqueryui/css/jquery.ui.all.css')}}
    {{HTML::style('resources/css/hover-min.css');}}
    {{HTML::style('resources/css/style.css');}}
    {{HTML::style('resources/css/mediqueries.css');}}
    <style>
      .notif{
        border-radius:50%;
        background-color:red;
        color:white;
        padding-left:6px;
        padding-right:6px;
        font-size:10px;
        padding-top:2px;
        padding-bottom:2px;
        position:relative;
        top:20%;
        left:81%;
      }
    </style>
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
                      <!--<li>
                          <a href="#">
                          <i class="fa fa-pie-chart fa-2x"></i> 
                          <span class="title">Dashboard</span>
                          </a>
                      </li>-->
                      <li>
                          <a href = "{{url('/secretary')}}">
                            <i class="fa fa-user fa-2x"></i> 
                            <span class="title">Users</span>
                          </a>
                      </li>
                      <li>
                        <a href="{{url('/secretary/projects')}}">
                          <i class="fa fa-building fa-2x"> </i> 
                          <span class="title">Projects</span> 
                        </a>
                      </li>
                      <li>
                          <a href = "{{url('/secretary/materials')}}">
                            <i class="fa fa-wrench fa-2x"></i> 
                            <span class="title">Materials</span>
                          </a>
                      </li>
                      <li>
                        <a href="{{url('/secretary/entryeditor')}}">
                        <i class="fa fa-file-text fa-2x"> </i> 
                          <span class="title">Entry Editor</span> 
                        </a>
                      </li>
                    </ul>
            
               </div>
                
            </div>
            
            <div class="medium-10 column no-padding right-side">
                
                <a href="{{URL::to('/logout')}}" class="icon logout">
                    <i class="fa fa-power-off"></i>
                </a>
                 <a href="{{URL::to('/secretary/change-password')}}" class="icon"><i class="fa fa-gears"><span><h6>Settings</h6></span></i></a>
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
    {{HTML::script('resources/libraries/jqueryui/js/jquery.ui.core.js')}}
    {{HTML::script('resources/libraries/jqueryui/js/jquery.ui.widget.js')}}
    {{HTML::script('resources/libraries/jqueryui/js/jquery.ui.datepicker.js')}}
    {{HTML::script('resources/libraries/foundation5.4.7/js/vendor/modernizr.js')}}
    {{HTML::script('resources/libraries/foundation5.4.7/js/foundation.min.js')}}
    {{HTML::script('resources/libraries/foundation5.4.7/js/foundation/foundation.js')}}
    <!-- {{HTML::script('resources/libraries/jqueryui/js/jquery.dataTables.min.js')}} -->
    {{HTML::script('resources/libraries/foundation5.4.7/js/foundation/foundation.alert.js')}}
    {{HTML::script('resources/libraries/foundation5.4.7/js/foundation/foundation.reveal.js')}}
    {{HTML::script('//cdn.datatables.net/1.10.4/js/jquery.dataTables.js')}}
    {{HTML::script('resources/libraries/mindmup/mindmup-editabletable.js')}}
    {{HTML::script('resources/js/uni.script.js')}}
    
    <script>
        $(document).foundation();
    </script>
</body>
</html>
