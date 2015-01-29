@extends('architecttemplate')

@section('head')
{{HTML::style('resources/css/modules/quotation/quotation-show.css');}}
@endsection

@section('content')

<div class="row quotation">
    <div class="medium-12 large-centered column view-box">
        <div class="project-container table-title">
          <h4>Projects</h4>
          <table>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Budget</th>
                    <th>Deadline</th>
                    <th colspan="2">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>00001</td>
                    <td>Bagito Express Building</td>
                    <td>sa PUSO mo!!</td>
                    <td>1,000,000</td>
                    <th>2015-01-15</th>
                    <td>
                      <a href="{{URL::to('')}}">
                              <i class="fa fa-pencil fa-2x"></i>
                        </a>
                    </td>
                  </tr>
                </tbody>
          </table>
        </div>
        <div class="quotation-container table-title">
            <h4>Quotations</h4>
            <table>
                  <thead>
                    <tr>
                      <th>Status</th>
                      <th>Quotation ID</th>
                      <th>Date Added</th>
                      <th>Subject</th>
                      <th>Name</th>
                      <th>Contact No.</th>
                      <th>Email</th>
                      <th colspan="2">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Rejected</td>
                      <td>0001</td>
                      <td>{{date('F d, Y')}}</td>
                      <td>Cost of Construction([labor, materials])</td>
                      <td>Turingan, Joshua B.</td>
                      <td>09054005755</td>
                      <th>turingan.joshua@gmail.com</th>
                      <td>
                        <a href="{{URL::to('')}}">
                                <i class="fa fa-pencil fa-2x"></i>
                          </a>
                      </td>
                    </tr>
                  </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
