@extends('entry-template')

@section('head')
{{HTML::style('resources/css/modules/quotation/quotation-create.css')}}
<style>
    table tr:nth-of-type(2n) {
        background: none repeat scroll 0% 0% white;
    }   
</style>
@endsection
@section('content')
    <div class="medium-12 large-centered column">
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
        <a href="{{URL::to('architect/quotation/view/' . $id)}}" class = "button"><i class="fa fa-arrow-circle-left"></i>Return</a>
        <a href="#" data-reveal-id="myModal" class = "button right"> <i class="fa fa-plus"></i>Add New Entry</a>
        <a href="#" data-reveal-id="modal2" class = "button"><i class="fa fa-dollar"></i> View Other Expenses </a>
        <a href="#" data-reveal-id="modalAdj" class = "button"><i class="fa fa-arrows-h"></i>View Adjustment</a>
        @if(count($entries) == 0)
        <h1>No Entries Yet</h1>
        @else
            <div class = "pagination pagination-centered hide-if-no-paging">
            <table class = "footable bagito-table">
                <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>UM</th>
                    <th>TL</th>
                    <th>UL</th>
                    <th>TL</th>
                    <th>DC</th>
                    <th>Material</th>
                    <th>Labor</th>
                    <th>Total</th>
                    <th>Gross Amount</th>
                    <th>Remove</th>
                </tr>
                </thead>
                <tbody>
                <?php $superTotal = 0;
                        $netTotal = 0;
                 ?>
                @foreach($entries as $entry)
                    <tr><td colspan = "13"><b  class = "left">{{$entry->description}}</b> <span class = "right"><a href="{{URL::to('architect/entry/delete/' . $entry->id)}}">Remove</a></span></td></tr>
                    <?php 
                            $parentSum = 0;
                            
                    ?>
                    @foreach($entry->child() as $subHeader)
                        <tr>
                        @foreach($subHeader->entry() as $child)
                        <tr> 
                            <?php $subHeaderSum = 0;
                                  $totalUm = 0; 
                                  $totalUl = 0; 
                            ?>
                            <td class = "left"><b class="sub-header" style = "color:#F9690E;">{{$child->description}}</b></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
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
                                        <td><span class="entry right">{{number_format($last->um,2)}}</span></td>
                                        <td><span class="entry right">{{number_format($last->tm,2)}}</span></td>
                                        <td><span class="entry right">{{number_format($last->ul,2)}}</span></td>
                                        <td><span class="entry right">{{number_format($last->tl,2)}}</span></td>
                                        <td><span class = "entry right">{{number_format($last->dc,2)}}</span></td>
                                        <td><span class="entry right">{{number_format($last->um / $grandTotal * $divisor,2)}}</span></td>
                                        <td><span class="entry right">{{number_format($last->ul / $grandTotal * $divisor,2)}}</span></td>
                                        <td><span class="entry right">{{number_format(($last->um / $grandTotal * $divisor)+($last->ul / $grandTotal * $divisor),2)}}</span></td>
                                        <td><span class="entry right">{{number_format((($last->um / $grandTotal * $divisor)+($last->ul / $grandTotal * $divisor)) * $last->quantity ,2)}}</span></td>
                                        <td><a href="{{URL::to('/architect/entry/delete/' . $last->id)}}">Remove</a></td>
                                    <?php $netTotal += (($last->um / $grandTotal * $divisor)+($last->ul / $grandTotal * $divisor)) * $last->quantity;?>
                                    </tr>
                                     <?php 
                                        $subHeaderSum +=  ($last->dc);
                                        $totalUm += $last->um;
                                        $totalUl += $last->ul;
                                     ?>
                                @endforeach
                            @endforeach
                        <?php $parentSum += $subHeaderSum?>
                        <tr>
                        <td><span class="left" style = "color:#F9690E">Subtotal</span></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><b style = "color:#F9690E" class = "right">{{number_format($totalUm,2)}}</b></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><b style = "color:#F9690E" class = "right">{{number_format($totalUl,2)}}</b></td>
                        <td class = "right" style = "color:#F9690E;"><b>{{number_format($subHeaderSum,2)}}</b>
                        </td>
                        </tr>
                        @endforeach
                        </tr>
                    @endforeach
                     <tr><td colspan = "10" class = "left"><b>Total {{$entry->description}} : {{number_format($parentSum,2)}}</b></td></tr>
                     <?php $superTotal += $parentSum ?>
                @endforeach
                <?php
                      if($grandTotal == 1){
                        $grandTotal = 0;
                      }
                $superSum = $grandTotal;?>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>DC:</td>
                    <td>{{number_format($grandTotal,2)}}</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><b class = "right">Net Total<b></td>
                    <td><b class = "right">{{number_format($netTotal + $quotation->adjustments,2)}}</b></td>
                </tr>
                <tr>
                    <td>CONT:</h6></td>
                    <td>{{number_format($grandTotal * $quotation->cont,2)}}</td>
                    <td>&nbsp;</td>
                    <?php $superSum += ($grandTotal * $quotation->cont)?>
                    <td>{{number_format($superSum,2)}}</td>
                </tr>
                <?php $superSum += $totalExpenses?>
                <tr>
                    <td>OH:</h6></td>
                    <td>{{number_format($totalExpenses,2)}}</td>
                    <td>&nbsp;</td>
                    <td>{{number_format($superSum,2)}}</td>
                </tr>
                <?php $superSum += $totalExpenses * $quotation->others ?>
                <tr>
                    <td>OTHERS:</h6></td>
                    <td>{{number_format($totalExpenses * $quotation->others ,2)}}</td>
                    <td>&nbsp;</td>
                    <td>{{number_format($superSum,2)}}</td>
                </tr>

                <tr>
                    <td>TAX:</h6></td>
                    <td>{{number_format($superSum * $quotation->tax,2)}}</td>
                    <td>&nbsp;</td>
                    <?php $superSum += $superSum * $quotation->tax?>
                    <td>{{number_format($superSum,2)}}</td>
                </tr>
                </tbody>
                </table>
            </div>
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
                    {{Form::label('um','Unit Material', array('class' => 'inline right'))}}
                 </div>
                 <div class="medium-10 column">
                    {{Form::text('um',null,array('class'=>'inline right'))}}
                 </div>
             </div>
            <div class="row">
                 <div class="medium-2 column">
                    {{Form::label('ul','Unit Labor', array('class' => 'inline right'))}}
                 </div>
                 <div class="medium-10 column">
                    {{Form::text('ul',null,array('class'=>'inline right'))}}
                 </div>
             </div>
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
    </div>
    <div id="modal2" class="reveal-modal" data-reveal>
        <div class="row">
            <div class="medium-6 column">
            <h3>Add Expenses</h3>
            {{Form::open(['url' => '/architect/entry/add-expenses/' . $id])}}
               {{Form::label('description','Description')}}
               {{Form::text('description')}}
               {{Form::label('cost','Cost')}}
               {{Form::text('cost','')}} 
               {{Form::submit('Add', array('class'=>'right button submit'))}}
            {{Form::close()}}
            </div>
            <div class="medium-6 column">
               <h3>Expenses</h3>
                @if(count($expenses) != 0)
                <table class = "data-table footable">
                    <thead>
                    <tr>
                        <th>Description</th>
                        <th>Cost</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($expenses as $expense)
                        <tr>
                            <td>{{$expense->description}}</td>
                            <td>{{number_format($expense->cost,2)}}</td>
                            <td><a href="{{URL::to('/architect/entry/remove-expenses/' . $expense->id)}}">Remove</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    <h6 class = "center">No Expenses Yet</h6>
                @endif
            </div>
        </div>
    </div>
    <div id = "modalAdj" class="reveal-modal tiny" data-reveal>
        <div class="row">
            <div class="medium-12 column">
                <h3>Adjustment</h3>
                {{Form::model($quotation,['url' => '/architect/quotation/updateAdjustment/' . $id])}}
                    {{Form::label('adjustments','Value')}}
                    {{Form::text('adjustments')}}
                    {{Form::submit('Update',['class' => 'button'])}}
                {{Form::close()}}  
            </div>
        </div>
    </div>
    <div style="clear:both"></div>
@endsection