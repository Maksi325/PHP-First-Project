<?php   include "includes/header.php";  ?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php   include "includes/navigation.php";  ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>
                        <?php
                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }else {
                            $source = 0;
                        }
                        
                        switch($source){
                            case '1': //add new post
                                include "includes/add_post.php";
                                break;
                            case '2': //delete the selected post
                                if(isset($_GET['delete_id'])){
                                    $delete_post_id = $_GET['delete_id'];
                                    deletePostById($delete_post_id);
                                }
                                break;
                            case '3': //edit post details
                                include "includes/edit_post.php";
                                break;
                            case '4': //coming soon 
                                echo "Nice 4";
                                break;
                            default:
                                include "includes/view_all_posts.php";
                                break;
                        }
                          ?>
                        
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <?php   include "includes/footer.php";   ?>