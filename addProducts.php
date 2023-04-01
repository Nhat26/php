<?php
    include_once 'connection.php';
    $cursor =  $Product->find();
    $size = $Product->countDocuments($cursor);
    $khanh=$size+1;
    echo "Cursor size: " . $size;
    if (isset($_POST['submit'])) {
       $post_data = array();
    //    $post_data['id'] = $_POST['txtId']; 
    $post_data['id']=$khanh;
       $post_data['name'] = $_POST['txtName']; 
       $post_data['gia'] = $_POST['txtGia'];
       $post_data['soluong'] = $_POST['txtsoluong'];
       $post_data['img'] = $_POST['txtimg'];
    

       if (($post_data['id']=="")||($post_data['name']=="")) {
            echo "<div class='alert alert-danger'> Required fields empty! </div>";
        }else {
            $Product->insertOne($post_data);
            header("Refresh:0");
        }

       

       $post_data = array();
       $_POST = array();
       
    }
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <link href="./FE/Admin/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    
    <title>Add product</title>
</head>
<body>
<?php require_once ("./FE/Admin/Sidebar.php"); ?>
    <div class="container">
        <div class="card mt-3 mb-2 bg-light">
            <h4 class="card-title mx-auto mt-4">New PRODUCT Form</h4>
            <div class="card-body">
                <form method="POST" class="my-3 mx-3">
        
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text"  class="form-control" id="name" name="txtName" aria-describedby="name">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Product price</label>
                        <input type="text"  class="form-control" id="address" name="txtGia" aria-describedby="address">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Product SL</label>
                        <input type="text"  class="form-control" id="address" name="txtsoluong" aria-describedby="address">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Product Impage</label>
                        <input type="file"  class="form-control" id="img" name="txtimg" aria-describedby="address">
                    </div>
                   
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <input type="submit" name="submit" class="btn btn-primary" value="Insert PRODUCT"/>
                        <a href="http://localhost:3000/Products.php" class="btn btn-warning">View PRODUCT</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
</body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./FE/Admin/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="./FE/Admin/js/datatables-simple-demo.js"></script>
</html>