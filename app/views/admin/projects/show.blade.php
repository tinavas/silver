@extends('template')

@section('head')
{{HTML::style('resources/css/modules/projects/projects-show.css');}}
<style>
  .data-table{
    width:100%;
  }
</style>
@endsection

@section('content')

<div class="row projects">
    <div class="medium-12 large-centered column view-box">
        @if(Session::has('errorMessage'))
            <span class="error">{{Session::get('errorMessage')}}</span>
        @elseif(Session::has('notification'))
            <span class="alert-box">
              <b>{{Session::get('notification')}}</b>
            </span>
        @endif
        <h4 class="view-header"><i class="fa fa-building"></i> Project Information</h4>
        <div class="project-desc">
             <h3>{{$project->title}}</h3>
            <h6>Location: {{$project->location}}</h6>
            <h6>Description: {{$project->description}}</h6>
        </div>
        <div class="proj-func">
            <a href="{{URL::to('admin/projects/' . $project->id . '/edit')}}" class="small button proj-func-button"><i class="fa fa-pencil"></i>Edit</a>
            <a href="#" class="small button proj-func-button" data-reveal-id="approved-quotations"><i class = "fa fa-check"></i>View Approved Quotations</a>
        </div>
        <h4 class="view-header"><i class="fa fa-user"></i> Project Collaborators</h4>
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
                          <a href="{{URL::to('/admin/project/' . $project->id . '/user/' . $user->id . '/delete')}}">Remove</a>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                  </tbody>
            </table>
        </div>
        @if($project->status == 1)
          <h4 class="view-header"><i class="fa fa-book"></i>Active Quotation</h4>
          <table>
              <thead>
                <th>Control Number</th>
                <th>Quotation Title</th>
                <th>Author</th>
                <th>Date Created</th>
                <th>Date Updated</th>
                <th>More Details</th>
              </thead>
              <tbody>
                <tr>
                  <td>{{str_pad($project->id, 3, "0", STR_PAD_LEFT) . '-'. str_pad($quotation->quotation_code, 3, "0", STR_PAD_LEFT)}}</td>
                  <td>{{$quotation->title}}</td>
                  <td>{{$quotation->user()->first()->first_name}}</td>
                  <td>{{date('F j, Y',strtotime($quotation->created_at))}}</td>
                  <td>{{date('F j, Y',strtotime($quotation->updated_at))}}</td>
                  <td><a href="{{URL::to('/admin/quotation/view/' . $quotation->id)}}">View</a></td>
                </tr>
              </tbody>
            </table>
        @elseif($project->status == 0)
          <h4 class="view-header"><i class="fa fa-book"></i>For Approval Quotations</h4>
            @if(count($quotations) != 0)
            <table class = "data-table">
              <thead>
                <th>Quotation ID</th>
                <th>Quotation Title</th>
                <th>Author</th>
                <th>Date Created</th>
                <th>Date Updated</th>
                <th>More Details</th>
                <th>Approve</th>
                <th>Disapprove</th>
              </thead>
              <tbody>
              @foreach($quotations as $quotation)
                <tr>
                  <td>{{str_pad($project->id, 3, "0", STR_PAD_LEFT) . '-'. str_pad($quotation->quotation_code, 3, "0", STR_PAD_LEFT)}}</td>
                  <td>{{$quotation->title}}</td>
                  <td>{{$quotation->user()->first()->first_name}}</td>
                  <td>{{date('F j, Y',strtotime($quotation->created_at))}}</td>
                  <td>{{date('F j, Y',strtotime($quotation->updated_at))}}</td>
                  <td><a href="{{URL::to('/admin/quotation/view/' . $quotation->id)}}" target = "_blank">View</a></td>
                  <td><a href="{{URL::to('/admin/project/add-active-quotation/' . $project->id . '/' . $quotation->id)}}">Approve</a></td>
                  <td><a href="{{URL::to('/admin/project/disapprove/' . $quotation->id)}}">Disapprove</a></td>
                </tr>
              @endforeach
              </tbody>
            </table>
          @else
            <h6>No Quotations For Approval Yet!</h6>
          @endif
        @endif
        </div>
    </div>
</div>

<div id = "approved-quotations" class = "reveal-modal xlarge" data-reveal>
    <div class="row">
      <div class="medium-12">
            <h4 class="view-header"><i class="fa fa-book"></i>Approved Quotations</h4>
            @if(count($approved) != 0)
            <table class = "data-table">
              <thead>
                <th>Quotation ID</th>
                <th>Quotation Title</th>
                <th>Author</th>
                <th>Date Created</th>
                <th>Date Updated</th>
                <th>More Details</th>
                <th>Request For Update</th>
              </thead>
              <tbody>
              @foreach($approved as $a)
                <tr>
                  <td>{{str_pad($project->id, 3, "0", STR_PAD_LEFT) . '-'. str_pad($a->quotation()->first()->quotation_code, 3, "0", STR_PAD_LEFT)}}</td>
                  <td>{{$a->quotation()->first()->title}}</td>
                  <td>{{$a->quotation()->first()->user()->first()->first_name}}</td>
                  <td>{{date('F j, Y',strtotime($a->quotation()->first()->created_at))}}</td>
                  <td>{{date('F j, Y',strtotime($a->quotation()->first()->updated_at))}}</td>
                  <td><a href="{{URL::to('/admin/quotation/view/' . $a->quotation()->first()->id)}} " target = "_blank">View</a></td>
                  <td><a href="{{URL::to('/admin/quotation/request-for-update/' . $a->id)}}">Update</a></td>
                </tr>
              @endforeach
              </tbody>
            </table>
          @else
            <h6>No Approved Yet!</h6>
          @endif
      </div>
    </div>
</div>
@endsection