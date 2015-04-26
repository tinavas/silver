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
      @if($errors->has())
            <span class = "error">
                @foreach($errors->all() as $error)
                    {{$error}} <br>
                @endforeach
            </span>
      @endif
        <a href="{{URL::to('admin/materials')}}" class = "button"><i class="fa fa-arrow-circle-left"></i>Return</a>
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
                    <th>DC</th>
                    <th>Gross Amount</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($entries as $entry)
                        <tr><td class = "left">{{$entry->description}}</td></tr>
                        @foreach($entry->children as $sub)
                            <tr><td class = "sub-header left" style = "color:#F9690E;">{{$sub->description}}</td></tr>
                            <?php $index = 0; ?>
                            @foreach($sub->children as $child)
                                <tr class = "children">
                                    <th class = "entry left">{{$child->description}}</th>
                                    <td id = "quantity-{{$child->id}}-{{$id}}" class = "quantity">{{number_format($child->value($quotation->id)->first()->quantity,2)}}</td>
                                    <th class = "unit">{{$child->unit}}</th>
                                    <td id = "um-{{$child->id}}-{{$id}}" class = "um">{{number_format($child->value($quotation->id)->first()->um,2)}}</td>
                                    <th  id = "tm-{{$child->id}}" class = "tm">{{number_format($child->value($quotation->id)->first()->tm,2)}}</th>
                                    <td id = "ul-{{$child->id}}-{{$id}}" class = "ul">{{number_format($child->value($quotation->id)->first()->ul,2)}}</td>
                                    <th id = "tl-{{$child->id}}" class = "tl">{{number_format($child->value($quotation->id)->first()->tl,2)}}</th>
                                    <th id = "dc-{{$child->id}}" class = "dc">{{number_format($child->value($quotation->id)->first()->dc,2)}}</th>
                                </tr>
                                <?php ++$index ?>
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>
            </table> 
            </div>
            <h1>Computation</h1>
            <div class="row left">
                <div class="col-md-6">
                <table style = "width:30%;" class = "left">
                    <tr>
                        <td>DC Total:</td>
                        <td class = "total"></td>
                    </tr>
                    <tr>
                        <td>Cont</td>
                        <td class = "cont"></td>
                        <td class="totalCont"></td>
                    </tr>
                    <tr>
                        <td>Overhead</td>
                        <td class = "oh"></td>
                        <td class="totalOh"></td>
                    </tr>
                    <tr>
                        <td>Prof:</td>
                        <td class = "prof"></td>
                        <td class="totalProf"></td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td class = "tax"></td>
                        <td class="totalTax"></td>
                    </tr>
                    <tr>
                        <td>Total after others</td>
                        <td class = "superSum"></td>
                    </tr>
                    <tr>
                        <td>Net Total:</td>
                        <td><b class = "net"></b></td>
                    </tr>
                </table>  
                </div>
            </div>
        @endif
        <div id="modal2" class="reveal-modal" data-reveal>
        <div class="row">
            <div class="medium-12 column">
               <h3>Expenses</h3>
                @if(count($expenses) != 0)
                <table class = "footable editTable" style = "width:100%;">
                    <thead>
                    <tr>
                        <th>Description</th>
                        <th>Cost</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($expenses as $expense)
                        <tr>
                            <th>{{$expense->description}}</th>
                            <td id = "expensevalue-{{$expense->value($quotation->id)->first()->id}}" class = "costs">{{$expense->value($quotation->id)->first()->cost}}</td>
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
    <div style="clear:both"></div>
    {{Form::hidden('cont',$cont,['id' => 'cont'])}}
    {{HTML::script('/resources/js/numeral.js')}}
@endsection