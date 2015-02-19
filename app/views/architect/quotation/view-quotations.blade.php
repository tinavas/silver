@extends('architecttemplate')

@section('head')
{{HTML::style('resources/css/modules/projects/projects-show.css');}}
@endsection

@section('content')

<div class="row projects">
    <div class="medium-12 large-centered column view-box">
        <h4 class="view-header"><i class="fa fa-building"></i> Quotation Information</h4>
        <div class="project-dec">
          <h6>Quotation Title: {{$quotation->title}}</h6>
          <h6>Created At: {{date('F j, Y',strtotime($quotation->created_at))}}</h6>
          <h6>Last Update: {{date('F j, Y',strtotime($quotation->updated_at))}}</h6>
          <h6>Remarks: {{$quotation->remarks}}</h6>
        </div>
        <h4 class="view-header"><i class="fa fa-building"></i> Project Information</h4>
        <div class="project-desc">
             <h5>{{'Project ID: ' . $project->id}}</h5>
                @if($quotation->status == 0)
                  On-Going
                @elseif($quotation->status == 1)
                  Active (For approval)
                @elseif($quotation->status == -1)
                  Rejected
                @elseif($quotation->status == 2)
                  Done
                @endif
            <h6>Location: {{$project->location}}</h6>
            <h6>Description: {{$project->description}}</h6>
            <h6>Date Created: {{date('F j, Y, g:i a',strtotime($project->created_at))}}</h6>
        </div>
        <h4 class="view-header"><i class="fa fa-building"></i>Entries</h4>
          <a href="{{URL::to('/architect/entry/create/' . $quotation->id)}}">Add New Entry</a>
        <div class="project-collab-container table-title">
    </div>
</div>
@endsection