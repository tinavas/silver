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
<div class="row quotation">
    <div class="medium-10 large-centered column">
      <h4 class="view-header"><i class="fa fa-user"></i>Quotation Entry Editor</h4>
      <div class="view-box">
        <a href="{{URL::to('/architect/viewer')}}" class = "button">Back</a>
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
                </tr>
                </thead>
                <tbody>
                <?php $superTotal = 0 ?>
                @foreach($entries as $entry)
                    <tr><td colspan = "6"><h5><b>{{$entry->description}}</b></h5></td></tr>
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
                        </tr> 
                            @foreach($child->child() as $childEntry)
                                @foreach($childEntry->entry() as $last)
                                    <tr>
                                        <td class = "left"><span class="entry">{{$last->description}}</span></td>
                                        <td><span class="entry">{{$last->quantity}}</span></td>
                                        <td><span class="entry">{{$last->unit}}</span></td>
                                        <td><span class="entry">{{number_format($last->price,2)}}</span></td>
                                        <td>{{number_format($last->quantity * $last->price,2)}}</td>
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
                     <tr><td colspan = "6" class = "left"><h5><b>Total {{$entry->description}} : {{number_format($parentSum,2)}}</b></h5></td></tr>
                     <?php $superTotal += $parentSum ?>
                @endforeach
                <tr><td colspan = "6"> <h2 class = "right">Total: {{number_format($superTotal,2)}}</h2></td></tr>
                </tbody>
                </table>
            </div>
        @endif
    </div>
    <div style="clear:both"></div>
</div>
@endsection