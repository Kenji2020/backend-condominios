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
                            <h4>New Recipe</h4>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="block form-block mb-4">

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<div class="form-row">
              
              <div class="form-group col-md-12">
                
                <input type="hidden" value="<?php echo $recipe['recipe_id']; ?>" name="recipe_id">
                
                <label>Title</label>
                <input class="form-control" value="<?php echo $recipe['recipe_title']; ?>" name="recipe_title" type="text" required="">

                <label>Description</label>

                <textarea type="text" class="form-control" name="recipe_description" id="recipe_description" required=""><?php echo $recipe['recipe_description']; ?></textarea>

               </div>

                   <div class="form-group col-md-4">
                                        <label>Cook Time</label>
                                        <input class="form-control" value="<?php echo $recipe['recipe_time']; ?>" name="recipe_time" type="text" required="">
                   </div>

                   <div class="form-group col-md-4">
                                        <label>Servings</label>
                                        <input class="form-control" value="<?php echo $recipe['recipe_servings']; ?>" name="recipe_servings" type="text" required="">
                   </div>

                   <div class="form-group col-md-4">
                                        <label>Calories</label>
                                        <input class="form-control" value="<?php echo $recipe['recipe_cals']; ?>" name="recipe_cals" type="text" required="">
                   </div>


                   <div class="form-group col-md-12">
                                        <label>Video ID <small>(Youtube)</small></label>
                                        <input class="form-control" value="<?php echo $recipe['recipe_video']; ?>" name="recipe_video" type="text" required="">
                   </div>


                   <div class="form-group col-md-6">

      <label>Category: <a href="#"><?php echo $recipe['category_title']; ?></a></label>
   <select class="custom-select form-control" name="recipe_category" required="">
   <option value="<?php echo $recipe['recipe_category']; ?>" selected="selected">- Select -</option>
    <?php foreach($categories as $category): ?>
   <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_title']; ?></option>
    <?php endforeach; ?>
   </select>

                   </div>

                   <div class="form-group col-md-6">
                                        <label>Chefs: <a href="#"><?php echo $recipe['chef_title']; ?></a></label>
                                        
                                           <select class="custom-select form-control" name="recipe_chef" required="">
    <option value="<?php echo $recipe['recipe_chef']; ?>" selected="selected">- Select -</option>
    <?php foreach($chefs as $chef): ?>
   <option value="<?php echo $chef['chef_id']; ?>"><?php echo $chef['chef_title']; ?></option>
    <?php endforeach; ?>
   </select>
                   </div>

              <div class="form-group col-md-12">

                <label>Ingredients</label>

                <textarea type="text" class="form-control" name="recipe_ingredients" id="recipe_ingredients" required=""><?php echo $recipe['recipe_ingredients']; ?></textarea>

               </div>


              <div class="form-group col-md-12">

                <label>Directions</label>

                <textarea type="text" class="form-control" name="recipe_directions" id="recipe_directions" required=""><?php echo $recipe['recipe_directions']; ?></textarea>

               </div>


              <div class="form-group col-md-12">

                <label>Tips</label>

                <textarea type="text" class="form-control" name="recipe_notes" id="recipe_notes" required=""><?php echo $recipe['recipe_notes']; ?></textarea>

               </div>



              <div class="form-group col-md-6">
                                        <label>Featured: <a href="#"><?php echo $recipe['recipe_featured']; ?></a></label>


   <select class="custom-select form-control" name="recipe_featured" required="">
   <option value="<?php echo $recipe['recipe_featured']; ?>" selected>- Select -</option>
   <option value="Yes">Yes</option>
   <option value="No">No</option>
   </select>

               </div>

              <div class="form-group col-md-6">
                                        <label>Status: <a href="#"><?php echo $recipe['recipe_status']; ?></a></label>


   <select class="custom-select form-control" name="recipe_status" required="">
   <option value="<?php echo $recipe['recipe_status']; ?>" selected>- Select -</option>
   <option value="Draft">Draft</option>
   <option value="Publish">Publish</option>
   </select>

               </div>

              <div class="form-group col-md-12">


   <label>Image: <a href="<?php echo SITE_URL ?>/images/<?php echo $recipe['recipe_image']; ?>" data-lightbox="image-1">Preview</a></label><br/>

   
   <div class="input-file-container">  
   <input type="hidden" value="<?php echo $recipe['recipe_image']; ?>" name="recipe_image_save">
    <input class="input-file" name="recipe_image" id="my-file" type="file">
    <label tabindex="0" for="my-file" class="input-file-trigger">Select a file...</label>
  </div>
  <p class="file-return"></p>
   <br/>
   <span class="text-danger" style="font-size: 11px; letter-spacing: 0.06em; text-transform: uppercase; font-weight: 500;">Recommended size: <b>850 x 500 Pixels</b> </span>

  </div>


<div class="form-group col-md-12">
  <hr>
                                <button class="btn btn-primary" type="submit" name="save">Save</button>
                                <input class="btn btn-danger" type="button" value="Delete" onclick="alertdelete();" name="trash"/>

                                    <script type="text/javascript">
   function alertdelete() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_recipe.php?id=<?php echo $recipe['recipe_id']; ?>" });}
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

<script>
CKEDITOR.replace( 'recipe_description' );
CKEDITOR.replace( 'recipe_ingredients' );
CKEDITOR.replace( 'recipe_directions' );
CKEDITOR.replace( 'recipe_notes' );
</script>