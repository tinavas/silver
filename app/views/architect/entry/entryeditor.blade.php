@extends('entry-template')

@section('head')
{{HTML::style('resources/css/modules/quotation/quotation-create.css')}}
@endsection
@section('content')
    <div class="medium-12 large-centered column quotation-entryeditor">
      <h4 class="view-header"><i class="fa fa-user"></i>Quotation Entry Editor</h4>
      <div class="view-box">
        <table class="editTable">
          <thead>
            <th>Description</th>
            <th>Units</th>
          </thead>
          <tbody>
            <tr class="table-td-header" id="td-header-0">
              <td>Preliminaries</td>
            </tr>
            <tr class="table-sub-header" id="td-sub-1">
              <td>Sub-Header</td>
              <td>&nbsp;</td>
            </tr>
            <tr class="table-td-content">
              <td>Tiger Woods</td>
              <td>&nbsp;</td>
            </tr>
            <tr class="table-td-content">
              <td>Steel Phoenix</td>
              <td>&nbsp;</td>
            </tr>
            <tr class="table-td-content">
              <td>Blue Chair</td>
              <td>&nbsp;</td>
            </tr>
            <tr class="table-sub-header" id="td-sub-0">
              <td>Sub-Header 2</td>
              <td>&nbsp;</td>
            </tr>
            <tr class="table-td-content">
              <td>Korean Steelipipe</td>
              <td>&nbsp;</td>
            </tr>
            <tr class="table-td-content">
              <td>Spark Table</td>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table>
        <div>
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
      </div>
    </div>
@endsection