@extends('architecttemplate')

@section('head')
{{HTML::style('resources/css/modules/quotation/quotation-create.css')}}
@endsection
@section('content')
    <div class="medium-12 large-centered column quotation-entryeditor">
      <h4 class="view-header"><i class="fa fa-user"></i>Quotation Entry Editor</h4>
      <div class="view-box">
      @if(Session::has('message'))
        <span data-alert class = "alert-box">
                <b>{{Session::get('message')}}</b>
            <a href = "#" class = "close">&times;</a>
        </span>
      @endif
      @if($errors->has())
            <span class = "error">
                @foreach($errors->all() as $error)
                    {{$error}} <br>
                @endforeach
            </span>
      @endif
        <!--<div class="add-row-container">
          <button class="btn btn-primary" id="add-new-row">Add New</button>
          <select id="add-new-option">
            <option value="header">Header</option>
            <option value="sub-header">Sub Header</option>
            <option value="item">Item</option>
          </select>
          <span>in</span>
          <select id="add-new-to">
            
          </select>
        </div> -->
      <a href="#" data-reveal-id="myModal" class = "button right"> <i class="fa fa-plus"></i>Add New Entry</a>
      @if(count($headers) != 0)
        <table class="editTable">
          <thead>
            <th>Description</th>
            <th>Units</th>
          </thead>
          <?php $block = 0; ?>
            @foreach($headers as $header)
              <tbody id="block-{{$block}}">
              <tr class = "table-td-header">
                <td id = "parent-{{$header->id}}">{{$header->description}}</td>
              </tr>
              @foreach($header->children()->get() as $subs)
                <?php $sub = 0; ?> 
                <tr class = "table-sub-header" id = "td-block-{{$block}}-sub-{{$sub}}">
                  <td id = "subheader-{{$subs->id}}">{{$subs->description}}</td>
                </tr>
                <?php $sub++?>
                @foreach($subs->children()->get() as  $child)
                  <tr class = "table-td-content">
                    <td id = "child-{{$subs->id}}">{{$child->description}}</td>
                    <td id = "unit-{{$subs->id  }}">{{$child->unit}}</td>
                  </tr>
                @endforeach
              @endforeach
              <?php $block++; ?>
              </tbody>
            @endforeach
        </table>
      @endif
      </div>
    </div>

    <div id="myModal" class="reveal-modal" data-reveal>
        <h4>Add New Entry</h4>
        <?php $subs = $header->children()->get(); ?>
        {{Form::open(array('url' => '/architect/entry-template/create/'))}}
         <div class="row">
             <div class="medium-2 column">
                {{Form::label('description','Description', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                  {{Form::text('description',null,array('class'=> ''))}}
             </div>
         </div>
         <div class = "row">
            <div class="medium-2 column">
                {{Form::label('type','Type', array('class' => 'inline right'))}}
             </div>
             <div class="medium-10 column">
                  {{Form::select('type',['1' => 'Header', '2' => 'Sub Header', '3' => 'Child'],'1',array('class'=> 'inline right type'))}}
             </div>
         </div>
         <div class = "child-entry">
             <h4>Child Entry</h4>
             <div class="row">
                    <div class="medium-2 column">
                        {{Form::label('ajax_header','Category', array('class' => 'inline right'))}}
                     </div>
                    <div class="medium-10 column">
                        {{Form::select('ajax_header',$parents,array('class'=>'inline right'))}}
                    </div>
                 </div>
             <div class="row huehue">
                <div class="medium-2 column">
                    {{Form::label('parent_id','Sub Category', array('class' => 'inline right'))}}
                 </div>
                 <div class="medium-10 column">
                    {{Form::select('parent_id',$subs,array('class'=>'inline right'))}}
                 </div>
             </div>
             <div class="row">
                <div class="medium-2 column">
                    {{Form::label('unit','Unit', array('class' => 'inline right'))}}
                 </div>
                 <div class="medium-10 column">
                    {{Form::text('unit','')}}
                 </div>
             </div>
         </div>
         <div class="sub-header-entry">
                 <h4>Sub Header Entry</h4>
                 <div class="row">
                    <div class="medium-2 column">
                        {{Form::label('parent_id_sub','Parent', array('class' => 'inline right'))}}
                     </div>
                    <div class="medium-10 column">
                        {{Form::select('parent_id_sub',$parents,array('class'=>'inline right'))}}
                    </div>
                 </div>
         </div>
        <div class="row">
            <div class="medium-12 column">
                {{Form::submit('Create', array('class'=>'right button submit'))}}
            </div>
        </div>
        {{Form::close()}}
        </div>
    </div>
@endsection