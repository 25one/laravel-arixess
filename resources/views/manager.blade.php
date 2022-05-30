@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="table">
                <div class="card-header">Items List</div>

                    <div class="card-body">
                          <table class="table-wrapper" width="100%">
                             <thead>
                              <tr>
                                <td>Subject</td>                            
                                <td>Message</td>
                                <td>Name</td>   
                                <td>E-Mail</td>  
                                <td>Date of Creating</td> 
                                <td>Addition File</td> 
                                <td>Answered</td>                                                  
                              </tr>  
                              </thead>
                              <tbody id="pannel">
                                 @include('brick-standard')
                             </tbody>    
                           </table>
                    </div>
                    <hr> 
                    <div id="pagination" class="box-footer">
                       {{ $links }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
