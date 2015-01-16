@extends('template')

@section('head')
{{HTML::style('resources/css/modules/users-view.css');}}
@endsection

@section('content')

<div class="row">
    <div class="medium-12 column">
        <div class="medium-5 column search-user-container no-padding">
              <div class="medium-1 column no-padding">
               <i class="fa fa-search fa-2x"> </i>   
              </div>
            
            <div class="medium-11 column">
             {{Form::text('search-users','', array('class' => 'search-users'));}}    
            </div>  
           
        </div>
        
        <div class="medium-7 column create-user-container no-padding">
            <a href="#" class="small button"><i class="fa fa-plus"></i> Create New User</a>
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
                    <tr>
                      <td>2010 01 31032</td>
                      <td>Lim</td>
                      <td>Patrick James</td>
                      <td>Administrator</td>
                      <td>0936 9876 970</td>
                      <td>patrickjames_lim@yahoo.com</td>
                      <td><a href="user/edit/"><i class="fa fa-pencil fa-2x"></i></a></td>
                      <td><a href="user/edit/"><i class="fa fa-trash fa-2x"></i></a></td>
                    </tr>

                    <tr>
                      <td>2010 01 31032</td>
                      <td>Lim</td>
                      <td>Patrick James</td>
                      <td>Administrator</td>
                      <td>0936 9876 970</td>
                      <td>patrickjames_lim@yahoo.com</td>
                      <td><a href="user/edit/"><i class="fa fa-pencil fa-2x"></i></a></td>
                      <td><a href="user/edit/"><i class="fa fa-trash fa-2x"></i></a></td>
                    </tr>

                    <tr>
                      <td>2010 01 31032</td>
                      <td>Lim</td>
                      <td>Patrick James</td>
                      <td>Administrator</td>
                      <td>0936 9876 970</td>
                      <td>patrickjames_lim@yahoo.com</td>
                      <td><a href="user/edit/"><i class="fa fa-pencil fa-2x"></i></a></td>
                      <td><a href="user/edit/"><i class="fa fa-trash fa-2x"></i></a></td>
                    </tr>

                    <tr>
                      <td>2010 01 31032</td>
                      <td>Lim</td>
                      <td>Patrick James</td>
                      <td>Administrator</td>
                      <td>0936 9876 970</td>
                      <td>patrickjames_lim@yahoo.com</td>
                      <td><a href="user/edit/"><i class="fa fa-pencil fa-2x"></i></a></td>
                      <td><a href="user/edit/"><i class="fa fa-trash fa-2x"></i></a></td>
                    </tr>

                  </tbody>
            </table>
        </div>
    </div>
    
</div>

@endsection