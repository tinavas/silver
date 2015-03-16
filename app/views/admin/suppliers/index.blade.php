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
            {{Form::open(['method' => 'get', 'url' => '/admin/suppliers/search/supplier'])}}
              {{Form::text('keyword','', array('class' => 'search-box'));}}
              {{Form::submit('Submit',['style' => 'display:none'])}}    
            {{Form::close()}}
            </div>  
           
        </div>
        
        <div class="medium-7 column create-new-container no-padding">
            <a href="{{url('admin/suppliers/create')}}" class="small button"><i class="fa fa-plus"></i> Create New Supplier</a>
        </div>
        
        <div class="medium-12 column view-box">
            <table>
                  <thead>
                    <tr>
                      <th>Supplier ID</th>
                      <th>Supplier Name</th>
                      <th>Description</th>
                      <th>Address</th>
                      <th>Remarks</th>
                      <th colspan="2">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($suppliers as $supplier)
                      <tr>
                        <td>{{str_pad($supplier->id,8,"0",STR_PAD_LEFT)}}</td>
                        <td>{{$supplier->supplier_name}}</td>
                        <td>{{$supplier->description}}</td>
                        <td>{{$supplier->address}}</td>
                        <td>{{$supplier->remarks}}</td>
                        
                        <td> 
                          <a href="{{URL::to('admin/suppliers/' . $supplier->id . '/edit')}}">
                                <i class="fa fa-pencil fa-2x"></i>
                          </a>
                        </td>
                      </tr>
                   @endforeach
                  </tbody>
            </table>
            {{$suppliers->appends(['keyword' => $keyword])->links()}}

            @if($keyword != '')
              {{HTML::link('/admin/suppliers','Back',['class' => 'left button'])}}
            @endif
        </div>
    </div>
</div>

@endsection