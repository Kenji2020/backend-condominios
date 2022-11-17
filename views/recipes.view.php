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
                            <h4>Recipes</h4>
                        </div>
                    </div>

                    <div class="col-12" style="text-align: right;padding-right: 20px;">
                        <a class="btn btn-outline-dark" href="<?php echo SITE_URL ?>/controller/new_recipe.php">
                        <i class="fa fa-plus add-new-i"></i> Add New
                        </a>
                    </div>

                    <div class="col-12">
                        <div class="block bg-trans table-block mb-4">

                            <div class="row">
                                <div class="table-responsive">
<table id="dataTable1" class="display table table-striped" data-table="data-table">
    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Chef</th>
                                        <th>Cock Time</th>
                                        <th>Servings</th>
                                        <th>Calories</th>
                                        <th>Featured</th>
                                        <th>Status</th>
                                        <th>Actions</th>

                                    </tr>
        </thead>
        <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Chef</th>
                                        <th>Cock Time</th>
                                        <th>Servings</th>
                                        <th>Calories</th>
                                        <th>Featured</th>
                                        <th>Status</th>
                                        <th>Actions</th>

                                    </tr>
        </tfoot>

        <tbody>
<?php foreach($recipes as $recipe): ?>

                                        <tr>
                                            <td width="50px"><img src="../images/<?php echo $recipe['recipe_image']; ?>" style="width: 100%; height: 40px; padding: 2px; border: 1px solid #eee;"></td>
                                            <td class="name" style="text-transform: none;"><span class="span-title"><?php echo $recipe['recipe_title']; ?></span></td>
                                            <td class="name"><?php echo $recipe['category_title']; ?></td>
                                            <td class="name"><?php echo $recipe['chef_title']; ?></td>
                                            <td class="name"><?php echo $recipe['recipe_time']; ?></td>
                                            <td class="name"><?php echo $recipe['recipe_servings']; ?></td>
                                            <td class="name"><?php echo $recipe['recipe_cals']; ?></td>
                                            <td class="name"><?php echo $recipe['recipe_featured']; ?></td>
                                            <td class="status">
                                            <?php
                                            $status = $recipe['recipe_status'];
                                            if ($status = 'Publish') {
                                                echo "<span class='badge badge-pill bg-success'>Publish</span>";
                                            }else{
                                                echo "<span class='badge badge-pill bg-warning'>Draft</span>";
                                            }
                                            ?></td>

                                        <td class="name"><a href="../controller/edit_recipe.php?id=<?php echo $recipe['recipe_id']; ?>"><i class="fa fa-cog a-i-color"></i></a> <a onclick="alertdelete_<?php echo $recipe['recipe_id']; ?>();" style="cursor: pointer;"><i class="fa fa-trash-o a-i-color"></i></a></td>
                                        </tr>

                            <script type="text/javascript">
  function alertdelete_<?php echo $recipe['recipe_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "../controller/delete_recipe.php?id=<?php echo $recipe['recipe_id']; ?>" });}
  </script>
  
                            <?php endforeach; ?>

        </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>
