@extends('template')


@section('head')
{{HTML::style('resources/css/modules/projects/projects-view.css');}}
@endsection

@section('content')
    
    <div class="row">
    <div class="medium-12 column">
        <div class="medium-5 column search-box-container no-padding">
              <div class="medium-1 column no-padding">
               <i class="fa fa-search fa-2x"> </i>   
              </div>
            
            <div class="medium-11 column">
             {{Form::text('search-users','', array('class' => 'search-box'));}}    
            </div>  
           
        </div>
        
        <div class="medium-7 column create-new-container no-padding">
            <a href="#" class="small button"><i class="fa fa-plus"></i> Create New Project</a>
        </div>
        
        <div class="medium-12 column view-box">
            <table>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Location</th>
                      <th>Budget</th>
                      <th>Collaborators</th>
                      <th>Deadline</th>
                      <th>Status</th>
                      <th colspan="2">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>00001</td>
                      <td><a href="#">E-Games</a></td>
                      <td>Pulilan, Bulacan</td>
                      <td>1,000,000 PHP</td>
                      <td>3</td>
                      <td>March 21, 2015</td>
                      <td>Approved</td>
                      <td>
                          <a href="user/edit/">
                              <i class="fa fa-pencil fa-2x"></i>
                          </a>
                      </td>
                      <td>
                          <a href="user/edit/">
                              <i class="fa fa-trash fa-2x"></i>
                          </a>
                      </td>
                    </tr>

                    <tr>
                      <td>00002</td>
                      <td><a href="#">E-Games</a></td>
                      <td>Marilao, Bulacan</td>
                      <td>1,320,100 PHP</td>
                      <td>2</td>
                      <td>May 28, 2015</td>
                      <td>Pending</td>
                      <td>
                          <a href="user/edit/">
                              <i class="fa fa-pencil fa-2x"></i>
                          </a>
                      </td>
                      <td>
                          <a href="user/edit/">
                              <i class="fa fa-trash fa-2x"></i>
                          </a>
                      </td>
                    </tr>
                    
                    <tr>
                      <td>00003</td>
                      <td><a href="">E-Games</a></td>
                      <td>Taytay, Rizal</td>
                      <td>3,000,000 PHP</td>
                      <td>4</td>
                      <td>April 09, 2015</td>
                      <td>On hold</td>
                      <td>
                          <a href="user/edit/">
                              <i class="fa fa-pencil fa-2x"></i>
                          </a>
                      </td>
                      <td>
                          <a href="user/edit/">
                              <i class="fa fa-trash fa-2x"></i>
                          </a>
                      </td>
                    </tr>
                    
                    <tr>
                      <td>00004</td>
                      <td><a href="#">E-Games</a></td>
                      <td>Lipa, Batangas</td>
                      <td>4,449,288 PHP</td>
                      <td>5</td>
                      <td>September 05, 2015</td>
                      <td>Approved</td>
                      <td>
                          <a href="user/edit/">
                              <i class="fa fa-pencil fa-2x"></i>
                          </a>
                      </td>
                      <td>
                        <a href="user/edit/">
                            <i class="fa fa-trash fa-2x"></i>
                        </a>
                      </td>
                    </tr>

                  </tbody>
            </table>
        </div>
    </div>
    
</div>
@endsection
