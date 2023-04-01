<?php
    include_once 'connection.php';
    error_reporting(0);
    $id = $_GET['id'];
    
    $cursor = $Product->findOne(["id"=>$id]);

    if (isset($_POST['submit'])) {
        $post_data = array();
        $post_data['id'] = $id;
        $post_data['name'] = $_POST['txtname']; 
        $post_data['gia'] = $_POST['txtgia'];
        $post_data['soluong'] = $_POST['txtsoluong'];
 
        $result = $Product->updateOne(['id'=>$post_data['id']],['$set'=>$post_data],['upsert' => true]);
 
        $post_data = array();
        $_POST = array();
        header("Refresh:0");

        echo "<div class='alert alert-success'> Update Success </div>";
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
    <!-- css side bar -->
    <link href="./FE/Admin/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- css side bar -->
    <title>Update Usser</title>
</head>
<body>
<?php require_once ("./FE/Admin/Sidebar.php"); ?>
    <div class="container">
        <div class="card mt-3 mb-2 bg-light">
            <h4 class="card-title mx-auto mt-4">Update Product Form</h4>
            <div class="card-body">
                <form method="POST" class="my-3 mx-3">
            
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="<?php echo $cursor['name']; ?>" class="form-control" id="name" name="txtname" aria-describedby="name">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Price</label>
                        <input type="text" value="<?php echo $cursor['gia']; ?>" class="form-control" id="address" name="txtgia" aria-describedby="sdt">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">SL</label>
                        <input type="text" value="<?php echo $cursor['soluong']; ?>" class="form-control" id="address" name="txtsoluong" aria-describedby="sdt">
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <input type="submit" name="submit" class="btn btn-success" value="Update Product"/>
                        <a href="http://localhost:3000/Products.php" class="btn btn-warning">View Product</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
<!-- css side bar -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./FE/Admin/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="./FE/Admin/js/datatables-simple-demo.js"></script>
<!-- css side bar -->
</html>