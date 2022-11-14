<?php include 'header.php'; ?>
<?php include 'connection.php'; ?>



    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $total = 0;
                                if(isset($_SESSION['Cart'])) {
                                    foreach ($_SESSION['Cart'] as $Key => $Value) { 
                                        $total = $total + $Value['ptotal']; //0 + 300 = 300 + 1500= 1800
                                   
                                ?>
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="<?= $Value[
                                                'prodImg'
                                            ] ?>" alt="" style = "width:90px;height:50px;">
                                            <h5><?= $Value['prodname'] ?></h5>
                                        </td>
                                        <td class="shoping__cart__price price" id = "price" onkeyup = "calc()" onclick = "calc()">
                                            <?= $Value['prodPrice'] ?>                
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="number" value="<?= $Value[
                                                        'pqty' 
                                                    ] ?>" min = 1 max = 10 class = "qty" onkeyup = "calc(this)" onclick = "calc(this)" >
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total total" id = "total">
                                            <?= $Value['ptotal'] ?>
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <form action="manageCart.php" method = "post">
                                                <button type = "submit" name = "Remove" style = "border: none;background-color:#f7f7ff"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                <input type="hidden" name = "Item_Id" value = "<?=  $Value['prodid'] ?>">
                                                <!-- <a href="manageCart.php?id=<?= $Value['prodid'] ?>"><i class="fa fa-times" aria-hidden="true"></i></a> -->
                                            </form>
                                        </td>
                                    </tr>
                                <?php } } else{
                                    echo "<h3 class = 'text-danger'>No Items Addded in Card</h3>";
                                } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>Cash on delivery
                                    <label class="form-check-label" for="radio1"></label>
                                </div>
                            </li>
                            <li>Total <span id = 'gtTotal'><?= @$total ?></span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    
<script>
    var gt = 0;
    var qty = document.getElementsByClassName('qty');
    var price = document.getElementsByClassName('price');
    var iTotal = document.getElementsByClassName('total');
    var gtTotal = document.getElementById('gtTotal');

function calc(){

    gt = 0;
    for(i = 0;i<price.length;i++){
        iTotal[i].innerHTML =  MparseInt(qty[i].value) * parseInt(price[i].innerHTL);
        gt += (parseInt(qty[i].value) * parseInt(price[i].innerHTML)); //gt = gt + 
    }
    gtTotal.innerHTML = gt;
}

</script>

<!-- <button onclick = chck()>
        checking
</button>

<script>
    function chck(){
       var i =  document.getElementById('gtTotal').innerHTML;
       alert(i);
    }
    
</script> -->