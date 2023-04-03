<!-- The Modal Change status-->
<div class="modal" id="singleassign_user">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- <button type="button" class="close" data-dismiss="modal"><img src="../assets/images/close-bottle.png" class="img-fluid"></button> -->
         <!-- Modal Header -->

         <div class="modal-header text-center">
            <h4 class="modal-title">Assign User</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
             <div> 
               <div class="form-group">
                  <select class="singleuser my-select2 form-control w-100" name="assignuserkk">
                  <option value="">Select</option>
                   <?php foreach ($users as $key => $user) {
                   ?>
                    <option value="{{$user->id}}" role="{{$user->role_id}}">{{ucfirst($user->name)}}</option>
                    <?php } ?>
                  </select>
               </div>
               <label class="error" id="stop-assign-tradelead-broker" type="{{($segment == 'leads') ? 'lead' : 'client'}}"></label>
               <label class="error" id="not-assign-empty"></label>
             </div>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <div class="btn-section w-100 P-0">
               <a class="btn-cstm btn-white btn btn-modal singleassignuser" data-action="<?php echo url()->current(); ?>" data-name = "" data-leadtype = "">Save</a>
               <a class="btn btn-modal" data-dismiss="modal">Cancel</a>
            </div>
         </div>
      </div>
   </div>
</div>
<!--End The Modal Change status-->

<!-- 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg> ... </svg>
                </button>
            </div>
            <div class="modal-body">
                <p class="modal-text">Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi. </p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div> -->
