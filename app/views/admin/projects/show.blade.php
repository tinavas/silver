@extends('template')

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
        <div class="proj-func">
            <a href="{{URL::to('admin/projects/' . $project->id . '/edit')}}" class="small button proj-func-button"><i class="fa fa-pencil"></i>Edit</a>
        </div>
        <h4 class="view-header"><i class="fa fa-building"></i> Project Collaborators</h4>
        <div class="project-collab-container table-title">
            <div class="proj-btn-container right">
                <a href="{{URL::to('admin/projects/add/users/' . $project->id)}}" class="small button create-quot"><i class="fa fa-plus"></i>Add New Collaborator</a>
            </div>
            <table> 
                  <thead>
                  <tr>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Middle Name</th>
                      <th>Contact No.</th>
                      <th>Email</th>
                      <th>Actions</th>
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
                        <td>
                          <a href="{{URL::to('/admin/project/' . $project->id . '/user/' . $user->id . '/delete')}}"></a>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                    </tr>
                  </tbody>
            </table>
        </div>

        <div class="admin-quotation-container table-title">
            <h4>Quotations</h4>
            <table>
                  <thead>
                    <tr>
                      <th>Status</th>
                      <th>Quotation ID</th>
                      <th>Date Added</th>
                      <th>Subject</th>
                      <th>Name</th>
                      <th>Contact No.</th>
                      <th>Email</th>
                      <th colspan="2">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Rejected</td>
                      <td>0001</td>
                      <td>{{date('F d, Y')}}</td>
                      <td>Cost of Construction([labor, materials])</td>
                      <td>Turingan, Joshua B.</td>
                      <td>09054005755</td>
                      <th>turingan.joshua@gmail.com</th>
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
@endsection