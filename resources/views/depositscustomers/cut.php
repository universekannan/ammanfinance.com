<div class="modal fade" id="addactivation">
         <form action="{{url('/add_activation')}}" method="post" enctype="multipart/from-data">
            {{ csrf_field() }}
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Add Activation</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-md-6">   
         <input type="hidden" class="form-control" name="id" value=""/>
         <input type="hidden" class="form-control" name="customer_id" value=""/>

                          <input type="text"  class="form-control mb-3" name="page_number" placeholder="Page Number"/>

                          <input type="text" class="form-control mb-3" name="things" placeholder="Things"/>
                        
                          <input type="text"  class="form-control mb-3" name="things_type" placeholder="Things Type"/>

                     </div>
                    <div class="col-md-6">   
						  <input type="text"  class="form-control mb-3" name="measurement" placeholder="Measurement"/>
					      <input type="text"  class="form-control mb-3" name="credit_amount" placeholder="Credit Amount"/>
														
						  <input type="text"  class="form-control mb-3" name="from_date" placeholder="From Bate"/>
						  <div class="custom-file">
<input type="file" class="custom-file-input" id="customFile">
<label class="custom-file-label" for="customFile">Things file</label>
</div>
                    </div>
              </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button type="submit" id="save" class="btn btn-primary">Submit</button>
                  </div>
               </div>
            </div>
         </form>
      </div>




       <table id="example2" class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th>#ID</th>
                           <th>credit_amount</th>
                           <th>Interest</th>
                           <th>activation_data</th>
                           <th>from_date</th>
                          
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
 @foreach($manageactivationdetails as $key=>$manageactivationdetailslist)
                         <tr id="arrayorder_<?php echo $manageuserslist = ?>">

                           <td>{{ $key + 1 }}</td>
                           <td>{{ $manageactivationdetailslist->credit_amount }}</td>
                           <td>{{ $manageactivationlist->id = $manageactivationdetailslist->activation_id }}</td>
                           <td>{{ $manageactivationdetailslist->intrest }}</td>
                           <td>{{ $manageactivationdetailslist->activation_data }}</td>
                           <td>{{ $manageactivationdetailslist->from_date }}</td>
                              </tr>
                               @endforeach
                           </tbody>
                            </table>