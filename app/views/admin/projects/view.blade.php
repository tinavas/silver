@extends('template')


@section('head')
{{HTML::style('resources/css/modules/projects/projects-view.css');}}
@endsection

@section('content')
    
    <div class="row">
    <div class="medium-12 column">
        <div class="medium-5 column search-box-container no-padding">
              <div class="medium-1 column no-padding">
               <i class="fa fa-search fa-2x"> </i>   
              </div>
            
            <div class="medium-11 column">
            {{Form::open(['method' => 'get', 'url' => '/admin/project/search/project'])}}
              {{Form::text('search-users','', array('class' => 'search-box'))}}
              {{Form::submit('Submit',['style' => 'display:none'])}}
            {{Form::close()}}    
            </div>  
           
        </div>
        
        <div class="medium-7 column create-new-container no-padding">
            <a href="{{URL::to('admin/projects/create')}}" class="small button"><i class="fa fa-plus"></i> Create New Project</a>
        </div>
        
        <div class="medium-12 column view-box">
            <table>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Location</th>
                      <th>Budget</th>
                      <th>Collaborators</th>
                      <th>Deadline</th>
                      <th>Status</th>
                      <th colspan="2">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                   @foreach($projects as $project)
                    <tr>
                      <td>{{str_pad($project->id, 5, "0", STR_PAD_LEFT)}}</td>
                      <td>{{$project->title}}</td>
                      <td>{{$project->location}}</td>
                      <td>{{number_format($project->budget,2)}}</td>
                      <td>{{$projectRepo->getNumberOfSubscribers($project->id)}}</td>
                      <td>{{$project->deadline}}</td>
                      <td>
                        @if($project->status == 0)
                          Pending
                        @elseif($project->status == 1)
                          Approved
                        @elseif($project->status == -1)
                          Cancelled
                        @else
                          Done
                        @endif
                      </td>
                      <td>
                        <a href="{{URL::to('admin/projects/' . $project->id . '/edit')}}">
                                <i class="fa fa-pencil fa-2x"></i>
                          </a>
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
            </table>
            {{$projects->appends(['keyword' => $keyword])->links()}}
            @if($keyword != '')
              {{HTML::link('/admin/projects','Back',['class' => 'left button'])}}
            @endif
        </div>
    </div>
    
</div>
@endsection
