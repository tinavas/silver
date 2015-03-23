@extends('template')

@section('head')
{{HTML::style('resources/css/modules/users/users-view.css');}}
@endsection

@section('content')
<div class="row">
    <div class="medium-12 column">
        <div class="medium-5 column search-box-container no-padding">
              <div class="medium-1 column no-padding">
               <i class="fa fa-search fa-2x"> </i>   
              </div>
            
            <div class="medium-11 column">
            {{Form::open(['method' => 'get', 'url' => '/admin/users/search/user'])}}
              {{Form::text('keyword','', array('class' => 'search-box'));}}
              {{Form::submit('Submit',['style' => 'display:none'])}}    
            {{Form::close()}}
            </div>  
           
        </div>
        
        <div class="medium-7 column create-new-container no-padding">
            <a href="{{url('archictect/messages')}}" class="small button"><i class="fa fa-plus"></i> Create New Notification</a>
        </div>
        
        <div class="medium-12 column view-box">
            <table>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Description</th>
                      <th>User</th>
                      <th colspan="2">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($notifications as $notification)
                      <tr>
                        <td>{{str_pad($notification->id,3,"0",STR_PAD_LEFT)}}</td>
                        <td>{{$notification->description}}</td>
                        <td>{{$notification->user_id}}</td>
                        <td> 
                          <a href="{{URL::to('archictect/users/' . $user->id . '/edit')}}">
                                <i class="fa fa-pencil fa-2x"></i>
                          </a>
                        </td>
                      </tr>
                   @endforeach
                  </tbody>
            </table>
            {{$notifications->appends(['keyword' => $keyword])->links()}}

            @if($keyword != '')
              {{HTML::link('/archictect/notifications','Back',['class' => 'left button'])}}
            @endif
        </div>
    </div>
</div>
@endsection