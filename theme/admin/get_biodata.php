
        <div class="container-fluid">
          <div class="">
            <div style="" class="">
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade  active in" id="personal-deetails">
     <div class="">
      <div class="col-md-12"> <h4>Contestant details:</h4>
<hr/></div>
       <form name="forms" id="forms">
       <div class="form-group">
           <div class="col-md-4 col-xs-10">
         <label for="name">Contestant name</label>
         <div class="input-group" title="full name">
         <span class="input-group-addon">
             <i class="fa fa-user"></i>
         </span>
         <input required type="text" name="name" value="{name}" id="name" class="form-control" placeholder="{name}">
       </div></div></div>
     <div class="col-md-4 col-xs-10">
     <div class="form-group">
       <label for="home town">Email Address</label>
       <div class="input-group">
       <span class="input-group-addon">
           <i class="fa fa-envelope"></i>
       </span>
       <input required type="email" id="email" name="email" value="{email}" class="form-control" placeholder="Email Address">
     </div></div></div>
     <div class="col-md-4 col-xs-10">
         <div class="form-group">
       <label for="phone">Phone Number</label>
       <div class="input-group">
       <span class="input-group-addon">
           <i class="fa fa-phone"></i>
       </span>
       <input required type="text" name="phone" value="{phone}" id="phone" class="form-control"  placeholder="Mobile Number" >
     </div>
   </div>
 </div>
     <div class="col-md-4 col-xs-10">
       <div class="form-group">
         <label for="Gender">Gender</label>
         <div class="input-group">
         <span class="input-group-addon">
             <i class="fa fa-anchor"></i>
         </span>
         <select name="gender" class="form-control" >
           <option value="male" <?php if($gender=='male')echo 'selected';?>>Male</option>
           <option value="female" <?php if($gender=='female') echo 'selected';?>>Female</option>
         </select>
       </div></div></div>
       <div class="col-md-4 col-xs-10">
       <div class="form-group">
         <label for="country">Position</label>
         <div class="input-group">
         <span class="input-group-addon">
             <i class="fa fa-anchor"></i>
         </span>
         <select id="country" name="position" class="form-control" >
           <option value="president" <?php if($position=='president'){echo 'selected';}?>>President</option>
           <option value="Vice president" <?php if($position=='vice president'){echo 'selected';}?>>Vice President</option>
         </select>
       </div></div></div>
       <div class="col-md-4 col-xs-10">
         <h4><i class="fa fa-image"></i> Passport</h4>
         <hr/>
           <div class="box spot">
             <div class="overlay">
       <label for="passport"><img  id="img" src="uploads/{passport}">
</label><input id="passport" type="file" name="userfile" style="display:none;">
</div></div>
<input type="hidden" name="type" value="edit">
<input type="hidden" name="id" value="{id}">
<input type="hidden" name="passport" value="{passport}">

         </div>
         <div class="col-md-12 col-xs-12">
       <div class="form-group">
       <label for="faculty_name">manifesto</label>
       <div class="input-group">
         <span class="input-group-addon">
         <i class="fa fa-user"></i>
         </span>
         <textarea class="form-control" name="manifesto">{manifesto}
         </textarea>
       </div></div></div>
       <div class="col-md-12">
       <div class="form-group">
         <hr/>
       <button class="btn btn-primary" name="save_personal" type="submit" id="save">Save Edit
         <i id="load" class="fa fa-gear fa-spin"></i>
       </button> <span style="color:red;" class="btn" id="preturn"></span>
     </div>
   </div>
         </form>
           </div>
         </div>
      </div>
           </div>
          </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function(){
        $('#load').hide();
        $('#save').click(function() {
          $('#load').show();
        });
                $('#forms').submit(function(e){
          //$('#loading').show();
                    e.preventDefault();
                         $.ajax({
                             url:'ucp/manage/do_upload',
                             type:"post",
                             data:new FormData(this),
                             processData:false,
                             contentType:false,
                             cache:false,
                             async:false,
                              success: function(data){
        $('#loading').hide();
            $('#preturn').html(data);
            }
                         });
                    });
                 
         
            });
             
        </script>
