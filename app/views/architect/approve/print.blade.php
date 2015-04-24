<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <style>
        body{
            font-family: "Helvetica", Georgia, Serif;
            color:black;
        }
        .hit{
            display:block;
            font-size:9px;
        }
        table{
            width:100%;
            font-size:10px;
        }
        th{
            text-align:left;
        }
        .desc{
            padding-left:50px;
        }
        .sub-header{
            color:#F9690E;
            padding-left:25px;
        }
        .description{
            color:white;
            background-color:#F9690E;
            padding:5px;
        }
        .entry{
            border-left:1px solid gray;
            border-bottom:1px solid gray;
        }
        #grand{
            font-size:20px;
            text-align:left;
        }
    </style>
</head>
<body>
    <h2>Silver Design Inc</h2>
    <span class = "hit">2/F SILVERADO HARDWARE & CONST. SUPPLY, MARCOS HIGHWAY, ANTIPOLO CITY </span>
    <span class = "hit">EMAIL: silverleisure@yahoo.com</span>
    <span class="hit">TEL : 681 6745</span>
    <span class = "hit">MOBILE: 0917 808 2923</span>
    <br>
    <br>
    <span class="hit">Project: {{$project->title}}</span>
    <span class="hit">Location: {{$project->location}}</span>
    <span class="hit">Date: {{date('F j, Y')}}</span>
    <span class="hit">Subject: {{$quotation->title}} </span>
    <br>
    <br>
     <table>
        <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Material</th>
                    <th>Labor</th>
                    <th>Total</th>
                    <th>Gross Amount</th>
                </tr>
                </thead>
                <tbody>
                    <?php $grand = 0; ?>
                    @foreach($entries as $entry)
                        <?php $entrySum = 0 ?>
                        <tr><td class = "description" colspan = "7">{{$entry->description}}</td></tr>
                        @foreach($entry->children as $sub)
                            <?php $subSum = 0 ?>
                            <tr><td class = "sub-header left">{{$sub->description}}</td></tr>
                            @foreach($sub->children as $child)
                                <?php 
                                    $material = $child->value($quotation->id)->first()->um / $dcSum * $netSum; 
                                    $labor = $child->value($quotation->id)->first()->ul / $dcSum * $netSum; 
                                    $net = $labor + $material;
                                    $gross = $net * $child->value($quotation->id)->first()->quantity;
                                ?>
                                <tr class = "children">
                                    <td class = "desc entry">{{$child->description}}</td>
                                    <td class = "entry">{{number_format($child->value($quotation->id)->first()->quantity,2)}}</td>
                                    <td class = "entry">{{$child->unit}}</td>
                                    <td class = "entry">{{number_format($material,2)}}</td>
                                    <td class="entry">{{number_format($labor , 2)}}</td>
                                    <td class="entry">{{number_format($net,2)}}</td>
                                    <td class="entry">{{number_format($gross,2)}}</td>
                                <?php $subSum += $gross ?>
                                </tr>   
                            @endforeach
                            <tr>
                                <td class = "sub-header left">Total {{$sub->description}} : </td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td class = "entry" style = "color:#F9690E;"><b>{{number_format($subSum,2)}}</b></td>
                                <?php $entrySum += $subSum;?>
                            </tr>
                        @endforeach
                        <tr><td class = "description" colspan = "7">Total {{$entry->description}} : {{number_format($entrySum,2)}}</td></tr>
                        <?php $grand += $entrySum ?>
                    @endforeach
                    <tr>
                         <td id="grand" colspan = "7"><h3>Total Expenses: {{number_format($grand,2)}}</h3></td>
                    </tr>
                </tbody>
            </table> 
</body>
</html>