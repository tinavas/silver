@extends('template')

@section('head')
{{HTML::style('resources/css/modules/dashboard.css');}}
@endsection

@section('content')

<div class="row dashboard">
    <div class="medium-12 large-centered column">

        <div class="view-box">
            <div class="chart-container">
                <div class="charts-content column medium-6">
                    <!-- charts here -->
                </div>
                <div class="charts-content column medium-6">
                    <!-- charts here -->
                </div>
            </div>
        </div>
        
        <div class="view-box">
          <table>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Budget</th>
                    <th>Deadline</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>00001</td>
                    <td>Bagito Express Building</td>
                    <td>sa PUSO mo!!</td>
                    <td>1,000,000</td>
                    <td>2015-01-15</td>
                    <td>
                      <a href="#">
                        <i class="fa fa-eye fa-2x div-toggle"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
          </table>
        </div>
    </div>
</div>
@endsection