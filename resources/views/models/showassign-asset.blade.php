<div class="modal fade" id="showassignasset" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <!-- <button type="button" class="close" data-dismiss="modal"><img src="/assets/images/close-bottle.png" class="img-fluid"></button> -->
       <!-- Modal Header -->
       <div class="modal-header text-center">
        <h4 class="modal-title">Assignment Confirmation</h4>
       </div>
       <!-- Modal body -->
       <div class="modal-body">
          <div class="Delt-content">
             <!--  <img src="/assets/images/sucess.png" class="img-fluid mb-2"> 
             <h5 class="my-2">Are you sure?</h5> 
             <p class="confirmtext">You want to create new lead?</p>  -->
            <div class="customtable-responsive"> 
              <table class="table">
                  <thead>
                      <tr> 
                        <!-- <th class="text-left">{{ $segment == 'clients'?'Client':'Lead'}} Name</th>  -->
                        <th class="text-left">Name</th> 
                        <th class="text-left">Assigned To</th> 
                        </tr>
                      </thead>
                      <tbody id="showassigned"> 
                      </tbody>
              </table>
            </div>
          </div> 
       </div>
       <!-- Modal footer -->
       <div class="modal-footer">
           <div class="btn-section w-100 P-0">
               <a class="btn-cstm btn-white btn btn-modal delete-btn-modal assignasset">Yes</a> 
               <a type="" class="btn btn-modal" data-dismiss="modal">No</a>
           </div>
       </div>
     </div>
   </div>
</div>