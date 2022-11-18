<?php require'sidebar.view.php'; ?>  

<!--Page Container-->
<section class="page-container">
    <div class="page-content-wrapper">

        <?php require'navbar.view.php'; ?>

        <!--Main Content-->

 <div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4>Edit Chef</h4>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="block form-block mb-4">

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<div class="form-row">
              
              <div class="form-group col-md-12">

                <label>Name</label>
                  <input type="hidden" value="<?php echo $chef['chef_id']; ?>" name="chef_id">
   <input type="text" value="<?php echo $chef['chef_title']; ?>" placeholder="" name="chef_title" class="form-control" required="">

               </div>




              <div class="form-group col-md-12">


   <label>Image: <a href="<?php echo SITE_URL ?>/images/<?php echo $chef['chef_image']; ?>" data-lightbox="image-1">Preview</a></label><br/>
   
   <input type="hidden" value="<?php echo $chef['chef_image']; ?>" name="chef_image_save">
   <div class="input-file-container">  
    <input class="input-file" name="chef_image" id="my-file" type="file">
    <label tabindex="0" for="my-file" class="input-file-trigger">Select a file...</label>
  </div>
  <p class="file-return"></p>
   <br/>
   <span class="text-danger" style="font-size: 11px; letter-spacing: 0.06em; text-transform: uppercase; font-weight: 500;">Recommended size: <b>250 x 250 Pixels</b> </span>

  <hr>
                                <button class="btn btn-primary" type="submit" name="save">Save</button>
                                <input class="btn btn-danger" type="button" value="Delete" onclick="alertdelete();" name="trash"/>

                                    <script type="text/javascript">
   function alertdelete() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_chef.php?id=<?php echo $chef['chef_id']; ?>" });}
   </script>

                             </div>





</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>