@extends('architecttemplate')

@section('head')
{{HTML::style('resources/css/modules/projects/projects-show.css');}}
@endsection

@section('content')

<div class="row projects">
    <div class="medium-12 large-centered column view-box">
        <h4 class="view-header"><i class="fa fa-building"></i> Project Information</h4>
        <div class="project-desc">
             <h3>{{$project->title}}</h3>
             <h5>{{'Project ID: ' . $project->id}}</h5>
             @if($project->status == 0)
                <h6>Status: Pending<h6>
             @elseif($project->status == 1)
                <h6>Status: Approved</h6>
             @elseif($project->status == -1)
                <h6>Status: Cancelled</h6>
             @else
                <h6>Status: Done</h6>
             @endif
            <h6>Location: {{$project->location}}</h6>
            <h6>Description: {{$project->description}}</h6>
            <h6>Date Created: {{date('F j, Y, g:i a',strtotime($project->created_at))}}</h6>
        </div>
        <h4 class="view-header"><i class="fa fa-building"></i> Project Collaborators</h4>
        <div class="project-collab-container table-title">
            <table> 
                  <thead>
                  <tr>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Middle Name</th>
                      <th>Contact No.</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if(!is_null($users))
                    @foreach($users as $user)
                      <tr>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->middle_initial}}</td>
                        <td>{{$user->contact_number}}</td>
                        <td>{{$user->email}}</td>
                      </tr>
                    @endforeach
                  @endif
                    </tr>
                  </tbody>
            </table>
        </div>
        <h4 class="view-header"><i class="fa fa-building"></i>Quotations</h4>
        <div class="project-collab-container table-title">
        </div>
    </div>
</div>
@endsection