@extends('template')

@section('head')
{{HTML::style('resources/css/modules/users/users-view.css');}}
@endsection

@section('content')
<div class="row">
    <div class="medium-12 column">
        <h4 class="view-header"><i class="fa fa-building"></i>Notifications</h4>
        <div class="medium-12 column view-box">
            <table class = "data-table">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($notifications as $notification)
                      <tr>
                        <td>{{date('F j, Y',strtotime($notification->created_at))}}</td>
                        
                        <td>
                        @if($notification->is_read == 0)
                          <b>{{$notification->description}}</b>
                        @else
                          {{$notification->description}}
                        @endif
                        </td>
                        @if($notification->is_read == 0)
                        @endif
                      </tr>

                      <?php 
                        //I have to do this also. Sorry. you may not forgive me for doing this
                        $blue = Notification::find($notification->id);
                        $blue->is_read = 1;
                        $blue->save();
                      ?>
                   @endforeach
                  </tbody>
            </table>
        </div>
    </div>
</div>
@endsection