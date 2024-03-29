@extends('entry-template')

@section('head')
{{HTML::style('resources/css/modules/quotation/quotation-create.css')}}
<style>
    table tr:nth-of-type(2n) {
        background: none repeat scroll 0% 0% white;
    }
    .unit, .tm, .tl, .entry, .material, .labor, .net-total, .gross-amount, .dc{
        font-size:9px;
        font-weight:normal;
    }   
</style>
@endsection
@section('content')
    <div class="medium-12 large-centered column">
      <h4 class="view-header"><i class="fa fa-user"></i>Materials Management</h4>
      <div class="view-box">
      @if(Session::has('message'))
        <span data-alert class = "alert-box">
                <b>{{Session::get('message')}}</b>
            <a href = "#" class = "close">&times;</a>
        </span>
      @endif
      @if(Session::has('errorMessage'))
        <span class="error">{{Session::get('errorMessage')}}</span>
      @endif
      @if($errors->has())
            <span class = "error">
                @foreach($errors->all() as $error)
                    {{$error}} <br>
                @endforeach
            </span>
      @endif
        <a href="{{URL::to('secretary/materials')}}" class = "button"><i class="fa fa-arrow-circle-left"></i>Return</a>
        <a href="#" data-reveal-id="modal2" class = "button"><i class="fa fa-dollar"></i>Add Entry</a>
        <a href="#" data-reveal-id="historyModal" class = "button"> <i class="fa fa-archive"></i>View History</a>
        @if(count($entries) == 0)
        <h1>No Entries Yet</h1>
        @else
            <div class = "pagination pagination-centered hide-if-no-paging">
            <table class = "bagito-table">
                <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>UM</th>
                    <th>TM</th>
                    <th>UL</th>
                    <th>TL</th>
                    <th>Alloted Amount</th>
                    <th>Amount Spent</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($entries as $entry)
                        <tr><td class = "left"><b>{{$entry->description}}</td></b></tr>
                        @foreach($entry->children as $sub)
                            <tr><td class = "sub-header left" style = "color:#F9690E;">{{$sub->description}}</td></tr>
                            <?php 

                            $totalAlloted = 0;
                            $totalAmounted = 0;
                            $index = 0; 

                            ?>
                            @foreach($sub->children as $child)
                                <?php 
                                $alloted =  $child->value($quotation->id)->first()->dc; /** $child->value($quotation->id)->first()->quantity; */

                                $totalAlloted += $alloted;
                                ?>
                                <tr class = "children">
                                    <th class = "entry left">{{$child->description}}</th>
                                    <td id = "quantity-{{$child->id}}-{{$id}}" class = "quantity">{{number_format($child->value($quotation->id)->first()->quantity,2)}}</td>
                                    <th class = "unit">{{$child->unit}}</th>
                                    <td id = "um-{{$child->id}}-{{$id}}" class = "um">{{number_format($child->value($quotation->id)->first()->um,2)}}</td>
                                    <th  id = "tm-{{$child->id}}" class = "tm">{{number_format($child->value($quotation->id)->first()->tm,2)}}</th>
                                    <td id = "ul-{{$child->id}}-{{$id}}" class = "ul">{{number_format($child->value($quotation->id)->first()->ul,2)}}</td>
                                    <th id = "tl-{{$child->id}}" class = "tl">{{number_format($child->value($quotation->id)->first()->tl,2)}}</th>

                                    <td class = "dc">{{number_format($alloted,2)}}</td>
                                    <td>
                                      @if($child->material($quotation->id)->first() == null)
                                        {{number_format(0,2)}}
                                      @else
                                        <?php $amounted = 0; ?>
                                        @foreach($child->material($quotation->id)->get() as $material)
                                            <?php $amounted += $material->amount * $material->quantity ?>   
                                        @endforeach
                                        @if($amounted > $alloted)
                                            <span style = "color:red"> {{number_format($amounted,2)}} </span>
                                        @else
                                            <span> {{number_format($amounted,2)}} </span>
                                        @endif
                                        <?php $totalAmounted += $amounted ?>
                                    @endif
                                    </td>
                                </tr>
                                <?php ++$index ?>
                            @endforeach
                            <tr class = "children">
                                <td class = "sub-header left" style = "color:#F9690E;">Total {{$sub->description}}</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>{{number_format($totalAlloted,2)}}</td>
                                <td>
                                    @if($totalAlloted < $totalAmounted)
                                        <span style = "color:red">{{number_format($totalAmounted,2)}}</span>
                                    @else
                                         <span>{{number_format($totalAmounted,2)}}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table> 
            </div>
            <h1>Computation</h1>
            <h6>DC Total:</h6>
            <h6 class = "total" style = "font-weight:bold"></h6>
            <br> 
            <h6>Total Expenditure:</h6>
            @if($sumValue < $summer)
                <h6 style = "color:red; font-weight:bold;" >{{number_format($summer,2)}}</h6>
            @else
                <h6 style = "font-weight:bold;">{{number_format($summer,2)}}</h6>
            @endif  
        @endif
        <div id="modal2" class="reveal-modal large" data-reveal>
               <h1>Add new entry</h1>
               {{Form::open(['url' => '/secretary/materials/store/' . $id,'files'=>'true'])}}
                <div class="items">
                    <div class="uploadElement">
                        <div class="row">
                            <div class="medium-4 columns">
                                {{Form::label('quantity','Quantity')}}
                            </div>
                        
                            <div class="medium-4 columns">
                                {{Form::label('amount','Unit Price')}}
                            </div>

                            <div class="medium-4 columns">
                                {{Form::label('entry_id','Entry')}}
                            </div>
                        </div>
                        <div class="row">
                             <div class="medium-4 columns">
                                {{Form::text('quantity[]')}}
                            </div>

                             <div class="medium-4 columns">
                                {{Form::text('amount[]')}}
                            </div>
                            
                             <div class="medium-4 columns">
                                {{Form::select('entry_id[]',$childd)}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="medium-6 column">
                        {{Form::label('supplier_id','Supplier')}}  
                    </div>
                    <div class="medium-6 column">
                        {{Form::label('receipt','Attach Receipt')}}
                    </div>
                </div>
                <div class="row">
                    <div class="medium-6 column">
                        {{Form::select('supplier_id',$suppliers)}}  
                    </div>
                    <div class="medium-6 column">
                        {{Form::file('receipt')}}  
                    </div>
                </div>
                <br>
                {{Form::label('remarks','Remarks')}}
                {{Form::textarea('remarks')}}
                <br>
                {{Form::submit('Submit',['class' => 'button'])}}
                <button class = "button right" id = "addItem">Add Item</button>
               {{Form::close()}}
        </div>
    </div>
    <div id="historyModal" class = "reveal-modal xlarge" data-reveal>
        <div class="row">
            <div class="medium-12">
                <h1>Budget Allocation History</h1>
                @if(count($materials) == 0)
                    <h3>No entries yet</h3>
                @else
                    <table class = "data-table stretch">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Entry</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                            <th>Supplier</th>
                            <th>Total</th>
                            <th>View Receipt</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($materials as $material)
                        <tr>
                            <td>{{date('F j, Y',strtotime($material->created_at))}}</td>
                            <td>{{$material->entry()->first()->description}}</td>
                            <td>{{$material->quantity}}</td>
                            <td>{{number_format($material->amount,2)}}</td>
                            <td>{{$material->supplier()->first()->supplier_name}}</td>
                            <td>{{number_format($material->amount * $material->quantity,2)}}</td>
                            <td><a href="{{URL::to('uploads/' . $material->filename)}}" target="_blank">View</a></td>
                            <td><a href="{{URL::to('/secretary/materials/remove/' . $material->id)}}">Remove</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
    <div style="clear:both"></div>
    {{Form::hidden('cont',$cont,['id' => 'cont'])}}
    {{HTML::script('/resources/js/numeral.js')}}
@endsection