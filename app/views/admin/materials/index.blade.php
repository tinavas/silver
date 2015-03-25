@extends('template')
@section('head')
{{HTML::style('resources/css/modules/projects/projects-view.css')}}
{{HTML::style('resources/css/modules/materials.css')}}
@endsection

@section('content')
    <section class="projects">
    <div class="row">
      <div class="medium-12 column">
        <h4 class="view-header"><i class="fa fa-wrench"></i> Materials Management</h4>
        <div class="medium-12 column view-box">
            <table class = "data-table">
                  <thead>
                    <tr>
                      <th>Quotation Code</th>
                      <th>Title</th>
                      <th>Project</th>
                      <th>Open</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                   @foreach($loadss as $loads)
                    <tr>
                      <td>{{str_pad($loads->quotation()->first()->id, 3, "0", STR_PAD_LEFT) . '-'. str_pad($loads->quotation()->first()->quotation_code, 3, "0", STR_PAD_LEFT)}}</td>
                      <td>{{$loads->quotation()->first()->title}}</td>
                      <td>{{$loads->quotation()->first()->project()->first()->title}}</td>
                      <td>
                        <a href="{{URL::to('/admin/materials/' . $loads->quotation->first()->id)}}">
                          <i class="fa fa-folder-open fa-2x" style="color:orange"></i>
                         </a>
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
            </table>
        </div>
      </div>
    </div>
  </section>
@endsection