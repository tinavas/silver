@extends('template')

@section('head')
{{HTML::style('resources/css/modules/projects/projects-show.css');}}
@endsection

@section('content')

<div class="row projects">
    <div class="medium-12 large-centered column view-box">
        <div class="project-desc">
            <h4>Approved</h4>
            <h3>Bagito Express</h3>
            <h5>Project ID: 001</h5>
            <h6>Shizz Mall, Metro Manila</h6>
            <h6>Date Created: {{date('F d, Y')}}</h6>
        </div>
        <div class="proj-func">
            <a href="#" class="small button proj-func-button"><i class="fa fa-pencil"></i>Edit</a>
            <a href="#" class="small button proj-func-button"><i class="fa fa-remove"></i>Invalidate</a>
        </div>

        <div class="project-collab-container table-title">
            <h4>Project Collaborators</h4>
            <table>
                  <thead>
                    <tr>
                      <th>Position</th>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Middle Name</th>
                      <th>Contact No.</th>
                      <th>Email</th>
                      <th colspan="2">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Front Designer</td>
                      <td>Turingan</td>
                      <td>Joshua</td>
                      <td>Baluyot</td>
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

        <div class="quotation-container table-title">
            <h4>Quotations</h4>
            <div class="proj-btn-container right">
                <a href="" class="small button create-quot"><i class="fa fa-plus"></i>Add New Quotation</a>
            </div>
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