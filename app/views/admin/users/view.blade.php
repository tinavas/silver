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
             {{Form::text('search-box','', array('class' => 'search-box'));}}    
            </div>  
           
        </div>
        
        <div class="medium-7 column create-new-container no-padding">
            <a href="{{url('admin/users/create')}}" class="small button"><i class="fa fa-plus"></i> Create New User</a>
        </div>
        
        <div class="medium-12 column view-box">
            <table>
                  <thead>
                    <tr>
                      <th>User ID</th>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>User Type</th>
                      <th>Contact Number</th>
                      <th>Email</th>
                      <th colspan="2">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($users as $user)
                      <tr>
                        <td>{{str_pad($user->id,8,"0",STR_PAD_LEFT)}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$repo->getRole($user->id)->name}}</td>
                        <td>{{$user->contact_number}}</td>
                        <td>{{$user->email}}</td>
                        <td> 
                          <a href="url('admin/users/edit')">
                                <i class="fa fa-pencil fa-2x"></i>
                          </a>
                        </td>
                         <td>
                          <a href="admin/users/delete">
                              <i class="fa fa-trash fa-2x"></i>
                          </a>
                        </td>
                      </tr>
                   @endforeach
                  </tbody>
            </table>

            {{$users->links()}}
        </div>
    </div>
    
</div>

@endsection