<?php include 'header.php'; ?>
<?php include 'connection.php'; ?>


<!-- Add Cart Code -->


<?php if (isset($_POST['ins'])) {
    $prodID = $_POST['prodid']; //1
    $prodName = $_POST['prodname']; //mango
    $prodImg = $_POST['prodImg'];//mango.hpg
    $prodPrice = $_POST['prodPrice'];
    $prodQty = $_POST['pqty'];
    $prodTotal = $_POST['ptotal']; // print_r($_POST);
    // $cart = $_SESSION['cart'];

    $AddtoCartItems = [
        'prodid' => "$prodID", 
        'prodname' => "$prodName",
        'prodImg' => "$prodImg",
        'prodPrice' => "$prodPrice",
        'pqty' => "$prodQty",
        'ptotal' => "$prodTotal",
    ];

    if(isset($_SESSION['Cart'])){

        $myItems = array_column($_SESSION['Cart'],'prodname'); //Mango
        if(in_array($prodName,$myItems)){ //Cherry,Mango

            echo "<script>alert('Item Already Added');
            window.location.href = 'index.php';</script>";
        }
        else{
            $Count = count($_SESSION['Cart']); //2


            $_SESSION['Cart'][$Count] = $AddtoCartItems;
            echo "<script>alert('Item Added Successfully');
            window.location.href = 'index.php';</script>";
        }
        

    }
    else{
        $_SESSION['Cart'][0] = $AddtoCartItems;
        echo "<script>alert('Item Added Successfully');
        window.location.href = 'index.php';</script>";
    }
    
} 
?>




<!-- REMOVE CART CODE -->
<?php
if(isset($_POST["Remove"])){
    foreach($_SESSION['Cart'] as $key => $Val){
        if($Val['prodid'] == $_POST['Item_Id']){
            unset($_SESSION['Cart'][$key]);
            $_SESSION['Cart'] = array_values($_SESSION['Cart']);
            echo "<script>alert('Item Removed');
            window.location.href = 'CartDetail.php';</script>";   

        }
    }
}
?>
