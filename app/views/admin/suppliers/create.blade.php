@extends('template')

@section('head')
{{HTML::style('resources/css/modules/users/users-create.css');}}
@endsection

@section('content')

<div class="row">
    <div class="medium-10 large-centered column personal-info-container">
        <h4 class="view-header"><i class="fa fa-user"></i> Supplier Information</h4>
         
             @if($errors->has())
                <span class = "error">
                    @foreach($errors->all() as $error)
                            {{$error}} <br>
                     @endforeach
                </span>
            @endif
        <div class="view-box">
            {{Form::open(array('url' => '/admin/suppliers','method' => 'POST'))}}
             <div class="row">
                 <div class="medium-2 column">
                    {{Form::label('supplier_name','Supplier Name', array('class' => 'inline right'))}}
                 </div>
                 
                 <div class="medium-10 column">
                      {{Form::text('supplier_name','',array('class'=> 'lastname'))}}
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
                     {{Form::label('address','Address', array('class' => 'inline right'))}}
                 </div>
                 <div class="medium-10 column">
                     {{Form::text('address','',array('class'=> 'lastname'))}}
                 </div>
             </div>
             
             <div class="row">
                 <div class="medium-2 column">
                     {{Form::label('remarks','Remarks', array('class' => 'right'))}}
                 </div>
                 <div class="medium-10 column">
                     {{Form::text('remarks','',array('class'=> 'contactno'))}}
                 </div>
             </div>
        </div>

        {{Form::submit('Create New Supplier', array('class'=>'right button submit'))}}
        {{Form::close()}} 
    </div>
</div>

<div class="row">
    <div class="medium-10 large-centered column account-info-container"> 
        
    </div>
</div>
@endsection