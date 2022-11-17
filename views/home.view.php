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
                            <h4>Sections</h4>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $recipes_total; ?></div>
                            <i class="fa fa-angle-right i-icon"></i>
                            <p class="label">Recipes</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $categories_total; ?></div>
                            <i class="fa fa-angle-right i-icon"></i>
                            <p class="label">Categories</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $chefs_total; ?></div>
                            <i class="fa fa-angle-right i-icon"></i>
                            <p class="label">Chefs</p>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="section-title">
                            <h4>Summary</h4>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="block table-block mb-4">
                            <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                                <h5 class="text-truncate">Chefs</h5>
                                <div class="graph-pills graph-home">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active active-2" href="../controller/chefs.php">View All <i class="fa fa-angle-right" style="margin-left: 5px"></i></a>
                                    </li>
                                </ul>
                            </div>
                            </div>

                    <div class="custom-scroll" style="max-height: 250px;">
                                <div class="table-responsive text-no-wrap">
                                    <table class="table">
                                        <tbody class="text-middle">
                                        <?php foreach($chefs as $chef): ?>
                                        <tr>
                                            <td class="product">
                                                <img class="product-img" src="../images/<?php echo $chef['chef_image']; ?>">
                                            </td>
                                            <td class="name"><span class="span-title"><?php echo $chef['chef_title']; ?></span></td>
                                            <td class="price price-td-home"><a href="../controller/edit_chef.php?id=<?php echo $chef['chef_id']; ?>"><i class="fa fa-cog a-i-color"></i></a> <a onclick="alertdelete_<?php echo $chef['chef_id']; ?>();"><i class="fa fa-trash-o a-i-color"></i></a></td>
                                        </tr>

                            <script type="text/javascript">
  function alertdelete_<?php echo $chef['chef_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "../controller/delete_chef.php?id=<?php echo $chef['chef_id']; ?>" });}
  </script>
  
                            <?php endforeach; ?>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                       </div>
                    </div>  

                <div class="col-12 col-md-6 col-lg-6">
                        <div class="block table-block mb-4">
                            <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                                <h5 class="text-truncate">Categories</h5>
                                <div class="graph-pills graph-home">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active active-2" href="../controller/categories.php">View All <i class="fa fa-angle-right" style="margin-left: 5px"></i></a>
                                    </li>
                                </ul>
                            </div>
                            </div>

                    <div class="custom-scroll" style="max-height: 250px;">
                                <div class="table-responsive text-no-wrap">
                                    <table class="table">
                                        <tbody class="text-middle">
                                        <?php foreach($categories as $category): ?>
                                        <tr>
                                            <td class="product">
                                                <img class="product-img" src="../images/<?php echo $category['category_image']; ?>">
                                            </td>
                                            <td class="name"><span class="span-title"><?php echo $category['category_title']; ?></span></td>
                                            <td class="price price-td-home"><a href="../controller/edit_category.php?id=<?php echo $category['category_id']; ?>"><i class="fa fa-cog a-i-color"></i></a> <a onclick="alertdelete_<?php echo $category['category_id']; ?>();"><i class="fa fa-trash-o a-i-color"></i></a></td>
                                        </tr>

                            <script type="text/javascript">
  function alertdelete_<?php echo $category['category_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "../controller/delete_category.php?id=<?php echo $category['category_id']; ?>" });}
  </script>
  
                            <?php endforeach; ?>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                       </div>
                    </div>  

<div class="col-12 col-md-12 col-lg-12">
                        <div class="block table-block mb-4">
                            <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                                <h5 class="text-truncate">Recipes</h5>
                                <div class="graph-pills graph-home">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active active-2" href="../controller/recipes.php">View All <i class="fa fa-angle-right" style="margin-left: 5px"></i></a>

                                    </li>
                                </ul>
                            </div>
                            </div>

                    <div class="custom-scroll" style="max-height: 250px;">
                                <div class="table-responsive text-no-wrap">
                                    <table class="table table-striped">
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

                                    <tbody class="text-middle">
                                            <?php foreach($recipes as $recipe): ?>

                                        <tr>
                                            <td class="product">
                                                <img class="product-img" src="../images/<?php echo $recipe['recipe_image']; ?>">
                                            </td>
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