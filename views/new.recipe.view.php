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
                
                <label>Title</label>
                <input class="form-control" value="" name="recipe_title" type="text" required="">

                <label>Description</label>

                <textarea type="text" class="form-control" name="recipe_description" id="recipe_description" required=""></textarea>

               </div>

                   <div class="form-group col-md-4">
                                        <label>Cook Time</label>
                                        <input class="form-control" value="" name="recipe_time" type="text" required="">
                   </div>

                   <div class="form-group col-md-4">
                                        <label>Servings</label>
                                        <input class="form-control" value="" name="recipe_servings" type="text" required="">
                   </div>

                   <div class="form-group col-md-4">
                                        <label>Calories</label>
                                        <input class="form-control" value="" name="recipe_cals" type="text" required="">
                   </div>


                   <div class="form-group col-md-12">
                                        <label>Video ID <small>(Youtube)</small></label>
                                        <input class="form-control" value="" name="recipe_video" type="text" required="">
                   </div>


                   <div class="form-group col-md-6">

      <label>Category</label>
   <select class="custom-select form-control" name="recipe_category" required="">
   <option selected="selected">- Select -</option>
    <?php foreach($categories as $category): ?>
   <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_title']; ?></option>
    <?php endforeach; ?>
   </select>

                   </div>

                   <div class="form-group col-md-6">
                                        <label>Chefs</label>
                                        
                                           <select class="custom-select form-control" name="recipe_chef" required="">
    <option selected="selected">- Select -</option>
    <?php foreach($chefs as $chef): ?>
   <option value="<?php echo $chef['chef_id']; ?>"><?php echo $chef['chef_title']; ?></option>
    <?php endforeach; ?>
   </select>
                   </div>

              <div class="form-group col-md-12">

                <label>Ingredients</label>

                <textarea type="text" class="form-control" name="recipe_ingredients" id="recipe_ingredients" required=""></textarea>

               </div>


              <div class="form-group col-md-12">

                <label>Directions</label>

                <textarea type="text" class="form-control" name="recipe_directions" id="recipe_directions" required=""></textarea>

               </div>


              <div class="form-group col-md-12">

                <label>Tips</label>

                <textarea type="text" class="form-control" name="recipe_notes" id="recipe_notes" required=""></textarea>

               </div>



              <div class="form-group col-md-6">
                                        <label>Featured</label>


   <select class="custom-select form-control" name="recipe_featured" required="">
   <option value="" selected>- Select -</option>
   <option value="Yes">Yes</option>
   <option value="No">No</option>
   </select>

               </div>

              <div class="form-group col-md-6">
                                        <label>Status</label>


   <select class="custom-select form-control" name="recipe_status" required="">
   <option value="" selected>- Select -</option>
   <option value="Draft">Draft</option>
   <option value="Publish">Publish</option>
   </select>

               </div>

              <div class="form-group col-md-12">


   <label>Image</label><br/>
   
   <div class="input-file-container">  
    <input class="input-file" name="recipe_image" id="my-file" type="file" required="">
    <label tabindex="0" for="my-file" class="input-file-trigger">Select a file...</label>
  </div>
  <p class="file-return"></p>
   <br/>
   <span class="text-danger" style="font-size: 11px; letter-spacing: 0.06em; text-transform: uppercase; font-weight: 500;">Recommended size: <b>850 x 500 Pixels</b> </span>

  </div>


<div class="form-group col-md-12">
  <hr>
  <button class="btn btn-primary" type="submit" name="save">Save</button>
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