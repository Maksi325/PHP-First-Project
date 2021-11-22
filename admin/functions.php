<?php
function insert_categories() {
    global $connection;
    
    if ( isset( $_POST['submit'] ) ) {
        $add_cat_title = $_POST['cat_title'];
        if ( $add_cat_title == "" || empty( $add_cat_title ) ) {
            echo "This field should not be empty";
        } else {
            $querry = "INSERT INTO `categories`  (`cat_title`) ";
            $querry .= "VALUES ('{$add_cat_title}') ";
            $Add_Category = mysqli_query( $connection, $querry );
            if ( !$Add_Category ) {
                die( 'Querry Falied: ' . mysqli_error( $connection ) );
            }
        }
        header( "Location: categories.php" );
    }
}


function findAllCategories(){
    global $connection;
    
    $query = "Select * from categories ";
    $result = mysqli_query($connection,$query);
    
    while($row = mysqli_fetch_assoc($result)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td> {$cat_id} </td>";
        echo "<td> {$cat_title} </td>";
        echo "<td><a class = 'fa fa-fw fa-trash' href='categories.php?delete={$cat_id}'></a>  </td>";
        echo "<td><a class='fa fa-fw fa-edit' href='categories.php?edit={$cat_id}'></a>  </td>";
        echo"</tr>";                        
    }            
}

function deleteCategories(){
    global $connection;
    if(isset($_GET['delete'])){
        $Delete_Id = $_GET['delete'];
        $Delete_querry  = "DELETE FROM `categories` WHERE `categories`.`cat_id` = {$Delete_Id}";
        mysqli_query($connection , $Delete_querry);
        header("Location: categories.php");
    }
    
}


?>