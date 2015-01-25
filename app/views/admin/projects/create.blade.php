@extends('template')

@section('head')
{{HTML::style('resources/css/modules/users/users-create.css');}}
@endsection

@section('content')

<div class="row">
    <div class="medium-10 large-centered column personal-info-container">
        <h4 class="view-header"><i class="fa fa-building"></i> Project Information</h4>

        @if($errors->has())
            <span class = "error">
                @foreach($errors->all() as $error)
                        {{$error}} <br>
                 @endforeach
            </span>
        @endif

        <div class="view-box">
            {{Form::open(array('url' => '/admin/projects','method' => 'POST'))}}
         <div class="row">
             <div class="medium-2 column">
                {{Form::label('code','Code', array('class' => 'inline right'))}}
             </div>
             
             <div class="medium-10 column">
                  {{Form::text('code','',array('class'=> 'lastname'))}}
             </div>
         </div>
         
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('title','Title', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                 {{Form::text('title','',array('class'=> 'lastname'))}}
             </div>
         </div>
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('description','Description', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                 {{Form::text('description','',array('class'=> 'lastname'))}}
             </div>
         </div>
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('location','Location', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                 {{Form::text('location','',array('class'=> 'lastname'))}}
             </div>
         </div>
         
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('budget','Budget', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                 {{Form::text('budget','',array('class'=> 'lastname'))}}
             </div>
         </div>
         
         <div class="row">
             <div class="medium-2 column">
                 {{Form::label('deadline','Deadline', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                 <input type="date" name="deadline" class="deadline">
             </div>
         </div>    
        </div>
         
    </div>

</div>

<div class="row" id="projects">
    <div class="medium-10 large-centered column personal-info-container">
        <h4 class="view-header"><i class="fa fa-building"></i> Project Collaborators</h4>

        <div class="view-box">

            <div class="medium-5 column search-box-container no-padding">

                <div class="medium-1 column no-padding">
                    <i class="fa fa-search"> </i>   
                </div>
            
                <div class="medium-11 column">
                    {{Form::text('search-collaborators','', array('class' => 'search-box'));}}    
                </div>
            </div>

            <div class="medium-7 column create-new-container no-padding">
                <a href="{{URL::to('admin/projects/create')}}" class="small button create-collab"><i class="fa fa-plus"></i> Add Collaborator</a>
            </div>

            <table>
                  <thead>
                    <tr>
                      <th>Position</th>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Middle Name</th>
                      <th>Contact No.</th>
                      <th colspan="2">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Position</td>
                      <td>Last_Name</td>
                      <td>First_name</td>
                      <td>Middle_name</td>
                      <td>Contact_No</td>
                      <td>
                        <a href="{{URL::to('')}}">
                                <i class="fa fa-pencil fa-2x"></i>
                          </a>
                      </td>
                    </tr>
                  </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="medium-10 large-centered column account-info-container"> 
        {{Form::submit('Create New Project', array('class'=>'right button submit'))}}
        {{Form::close()}} 
    </div>
</div>
@endsection