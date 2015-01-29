@extends('template')

@section('head')
{{HTML::style('resources/css/modules/users/users-view.css');}}
{{HTML::style('//cdn.datatables.net/1.10.4/css/jquery.dataTables.css"')}}
@endsection

@section('content')

<div class="row">        
        <div class="medium-12 column view-box">
            <table class = "data-table">
                  <thead>
                    <tr>
                      <th>User ID</th>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Contact Number</th>
                      <th>Email</th>
                      <th>Include User</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($users as $user)
                      <tr>
                        <td>{{str_pad($user->id,8,"0",STR_PAD_LEFT)}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->contact_number}}</td>
                        <td>{{$user->email}}</td>
                        <td> 
                          <a href="{{URL::to('admin/project/' . $project_id .'/user/' . $user->id)}}">
                          Add
                          </a>
                        </td>
                      </tr>
                   @endforeach
                  </tbody>
            </table>
        </div>
    </div>
</div>
@endsection