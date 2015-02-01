@extends('template')

@section('head')
{{HTML::style('resources/css/modules/dashboard.css');}}
@endsection

@section('content')

<div class="row dashboard">
    <div class="medium-12 large-centered column">
        <div class="view-box">
            <div class="chart-container">
                <div class="chart-sub-container">
                    <h4>Earnings</h4>
                    {{Form::select('summary-earnings', array('M' => 'Monthly', 'Y' => 'Yearly'), 'M');}}
                    <div class="column medium-6">
                        <canvas id="line-status" style="height: 300px; width: 50%;"></canvas>
                    </div>
                    <div class="column medium-6">
                        <canvas id="bar-status" style="height: 300px; width: 50%;" ></canvas>
                    </div>
                </div>
                <div class="chart-sub-container">
                    <h4>Expenses</h4>
                    {{Form::select('summary-expenses', array('M' => 'Monthly', 'Y' => 'Yearly'), 'M');}}
                    <div class="column medium-6">
                        <canvas id="line2-status" style="height: 300px; width: 50%;"></canvas>
                    </div>
                    <div class="column medium-6">
                        <canvas id="bar2-status" style="height: 300px; width: 50%;"></canvas>
                    </div>
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