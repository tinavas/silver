@extends('template')

@section('head')
{{HTML::style('resources/css/modules/users/users-create.css');}}
{{HTML::style('resources/css/modules/budgets/budget-create.css');}}
@endsection

@section('content')

<div class="row">
    <div class="medium-10 large-centered column personal-info-container">
        <h4 class="view-header"><i class="fa fa-user"></i> Budget Information</h4>

        @if($errors->has())
            <span class = "error">
            @foreach($errors->all() as $error)
                {{$error}} <br>
            @endforeach
            </span>
        @endif

        <div class="view-box">
            {{Form::open(array('url' => '/admin/budget/' . $id,'method' => 'POST'))}}

                <div class="row">
                    <div class="medium-2 column">
                        {{Form::label('description','Description', array('class' => 'inline right'))}}
                    </div>
                    <div class="medium-10 column">
                        {{Form::text('description','',array('class'=> ''))}}
                    </div>
                </div>

                <div class="row">
                    <div class="medium-2 column">
                        {{Form::label('amount','Amount', array('class' => 'inline right'))}}
                    </div>
                    <div class="medium-10 column">
                        {{Form::text('amount','',array('class'=> ''))}}
                    </div>
                </div>

                <div class="row">
                    <div class="medium-2 column">
                        {{Form::label('remarks','Remarks', array('class' => 'inline right'))}}
                    </div>
                    <div class="medium-10 column">
                        {{Form::text('remarks','',array('class'=> ''))}}
                    </div>
                </div>

                {{Form::submit('Create New Budget', array('class'=>'right button submit'))}}

            {{Form::close()}}   
        </div>
    </div>
</div>
@endsection