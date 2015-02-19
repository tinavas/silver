@extends('architecttemplate')

@section('head')
{{HTML::style('resources/css/modules/quotation/quotation-create.css')}}
<style>
    table tr:nth-of-type(2n) {
        background: none repeat scroll 0% 0% white;
    }   
</style>
@endsection

@section('content')
<div class="row quotation">
    <div class="medium-10 large-centered column">
      <h4 class="view-header"><i class="fa fa-user"></i>Quotation Entry Editor</h4>
      <div class="view-box">
      @if(Session::has('message'))
        <span data-alert class = "alert-box">
                {{Session::get('message')}}
            <a href = "#" class = "close">&times;</a>
        </span>
    @endif
      <a href="#" data-reveal-id="myModal" class = "button">Add New Entry</a>
        @if(count($entries) == 0)
        <h1>No Entries Yet</h1>
        @else
            <div class = "pagination pagination-centered hide-if-no-paging">
            <table class = "footable">
                <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                </tr>
                </thead>
                <tbody>
                @foreach($entries as $entry)
                    <tr class = "header"><td colspan = "6"><h5><b>{{$entry->description}}</b> <span class = "right"><a href="{{URL::to('architect/entry/delete/' . $entry->id)}}" style="color:white">Remove</a></span></h5></td></tr>
                    <?php $parentSum = 0 ?>
                    @foreach($entry->child() as $subHeader)
                        <tr>
                        @foreach($subHeader->entry() as $child)
                        <tr> 
                            <?php $subHeaderSum = 0 ?>
                            <td class = "left"><b class="sub-header">{{$child->description}}</b></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><a href="{{URL::to('/architect/entry/delete/' . $child->id)}}">Remove</a></td>
                        </tr> 
                            @foreach($child->child() as $childEntry)
                                @foreach($childEntry->entry() as $last)
                                    <tr>
                                        <td class = "left"><span class="entry">{{$last->description}}</span></td>
                                        <td><span class="entry">{{$last->quantity}}</span></td>
                                        <td><span class="entry">{{$last->unit}}</span></td>
                                        <td><span class="entry">{{number_format($last->price,2)}}</span></td>
                                        <td>{{number_format($last->quantity * $last->price,2)}}</td>
                                        <td><a href="{{URL::to('/architect/entry/delete/' . $last->id)}}">Remove</a></td>
                                    </tr>
                                     <?php $subHeaderSum +=  ($last->quantity * $last->price)?>
                                @endforeach
                            @endforeach
                        <?php $parentSum += $subHeaderSum?>
                        <tr class><td colspan="6" class = "left"><b>Total {{$child->description}}: {{number_format($subHeaderSum,2)}}</b>
                        </td></tr>
                        @endforeach
                        </tr>
                    @endforeach
                     <tr class = "header"><td colspan = "6"><h5><b>Total {{$entry->description}} : {{number_format($parentSum,2)}}</b></h5></td></tr>
                @endforeach
                </tbody>
                </table>
            </div>
        @endif
      @if($errors->has())
            <span class = "error">
                @foreach($errors->all() as $error)
                    {{$error}} <br>
                @endforeach
            </span>
        @endif
        <div id="myModal" class="reveal-modal" data-reveal>
        <h4>Add New Entry</h4>

        {{Form::open(array('url' => '/architect/entry/create/' . $id))}}
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
                    {{Form::label('quantity','Quantity', array('class' => 'inline right'))}}
                 </div>
                 <div class="medium-10 column">
                    {{Form::text('quantity',null,array('class'=>''))}}
                 </div>
             </div>
             <div class="row">
                 <div class="medium-2 column">
                    {{Form::label('price','Price', array('class' => 'inline right'))}}
                 </div>
                 <div class="medium-10 column">
                    {{Form::text('price',null,array('class'=>'inline right'))}}
                 </div>
             </div>
             <div class="row">
                <div class="medium-2 column">
                    {{Form::label('parent_id','Parent', array('class' => 'inline right'))}}
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
    </div>
    <div style="clear:both"></div>
</div>
@endsection