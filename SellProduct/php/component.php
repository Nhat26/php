<?php
 error_reporting(0);
function component($productname, $productprice, $productimg, $productid){
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=..\IMG\"$productimg\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productname</h5>
                           
                            <p class=\"card-text\">
                                Sản phẩm y tế
                            </p>
                            <h5>
                                <small>Price: </small>
                                <span class=\"price\">$productprice Đ</span>
                            </h5>

                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                             <input type='hidden' name='product_id' value='$productid'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid,$productSL){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=../IMG/$productimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\">SL: $productSL San pham</small>
                                
                                <h5 class=\"pt-2\">$$productprice <input type=\"hidden\" class=\"iprice\" value=$productprice></h5>
                               
                               
                                <h5 class=\"pt-2\"> <input type=\"hidden\" class=\"kkk\" value=$productid></h5>
                                
                                
                                <div class=\"d-flex p-2\">
                                <h5>Total: </h5>
                                <h5 class=\"itotal\">$productprice</h5>
                                <h6 class=\"okaay\">vnd</h6>
                                </div>
                                <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                   
                                    <input type=\"number\" value=\"1\" onchange='subTotal()' min=\"1\" max=$productSL class=\"form-control w-30 d-inline  iquantity\">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}

// function okayy(){
//     $element = "
//     <h6 class=\"itotal\">dfg</h6>

//     ";
//     echo  $element;
// }

























