@extends('architecttemplate')

@section('head')
{{HTML::style('resources/css/modules/quotation/quotation-create.css')}}
@endsection
@section('content')
    <div class="medium-12 large-centered column quotation-entryeditor">
      <h4 class="view-header"><i class="fa fa-user"></i>Quotation Entry Editor</h4>
      <div class="view-box">
        <div class="add-row-container">
          <button class="btn btn-primary" id="add-new-row">Add New</button>
          <select id="add-new-option">
            <option value="header">Header</option>
            <option value="sub-header">Sub Header</option>
            <option value="item">Item</option>
          </select>
          <span>in</span>
          <select id="add-new-to">
            
          </select>
        </div>
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
                <td>{{$header->description}}</td>
              </tr>
              @foreach($header->children()->get() as $subs)
                <?php $sub = 0; ?> 
                <tr class = "table-sub-header" id = "td-block-{{$block}}-sub-{{$sub}}">
                  <td>{{$subs->description}}</td>
                </tr>
                <?php $sub++?>
                @foreach($subs->children()->get() as  $child)
                  <tr class = "table-td-content">
                    <td>{{$child->description}}</td>
                    <td>{{$child->unit}}</td>
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
@endsection