<?php
session_start();
if (empty($_SESSION['customer_id']) and empty($_SESSION['customer_name']) and empty($_SESSION['customer_email']) and $_SESSION['user_role']!= 1)   {
    header('Location:../Login/login.php');
};
include("../controllers/cart_controller.php");
// session_start();
$cid = $_SESSION['customer_id'];
echo $cid;
$countwed =count_weddingcart_ctr($cid);
$countwed =count_shootcart_ctr($cid);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Photo Tamer Cart</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<!-- Header Start -->
<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <img src="img/logo.png" alt="">
            </a>
        </div>
        <div class="col-lg-9">
            <div class="row gx-0 bg-secondary d-none d-lg-flex">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                        <i class="fa fa-envelope text-primary me-2"></i>
                        <h6 class="mb-0">Photo-tamer@gmail.com</h6>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2">
                        <i class="fa fa-phone-alt text-primary me-2"></i>
                        <h6 class="mb-0">555-555-5555</h6>
                    </div>
                </div>
                <div class="col-lg-5 px-5 text-end">
                    <div class="d-inline-flex align-items-center py-2">
                        <a class="btn btn-light btn-square rounded-circle me-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="btn btn-light btn-square rounded-circle me-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-light btn-square rounded-circle me-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="btn btn-light btn-square rounded-circle me-2" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="btn btn-light btn-square rounded-circle" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0 px-lg-5">
                <a href="index.php" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 display-4 text-primary text-uppercase">Photo Tamer</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="allshoots.php" class="nav-item nav-link">Services</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                        <a href="../Login/register.php" class="nav-item nav-link">Register</a>
                        <a href="cart.php" class="nav-item nav-link active">Cart</a>
                    </div>
                    <a href="index.php" class="btn btn-primary py-md-3 px-md-5 d-none d-lg-block">Logout</a>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Hero Start -->
<div class="container-fluid bg-primary p-5 bg-hero mb-5">
    <div class="row py-5">
        <div class="col-12 text-center">
            <h1 class="display-2 text-uppercase text-white mb-md-4">Cart</h1>
        </div>
    </div>
</div>
<!-- Hero End -->

</div>
</div>

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Image</th>
        <th scope="col">Service</th>
        <th scope="col">Price</th>
        <th scope="col">Qunatity</th>
        <th scope="col">Cancel</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $shootcart=get_from_shootcart_ctr($_SESSION['customer_id']);
    ?>
    <!-- Shoots -->
    <?php
    foreach($shootcart as $item){
        ?>
        <tr>
            <td><img src="../images/images/shoots/<?php echo ($item['shoot_img'])?>" style="width: 50px;"></td>
            <td><?php echo($item['shoot_name']) ?></td>
            <td><?php echo('$'); echo($item['shoots.shoot_price*cart.qty']); ?></td>
            <td>
                <div class="input-group mb-3" style="width: 100px;">
                    <div class="input-group-prepend">
                        <button class="input-group-text" id="pid" onclick="loadDoc1(<?php echo $item['shoot_id'];?>)">-</button>
                    </div>
                    <input type="text" class="form-control text-center bg-white"  value="<?php echo $item['qty'];?>" disabled>
                    <div class="input-group-appnd">
                        <button class="input-group-text" id="pin" onclick="loadDoc(<?php echo $item['shoot_id'];?>)" >+</button>
                    </div>
            </td>
            <td>
                <form action="../actions/remove_shoots_from_cart.php" method="POST">
                    <input type="hidden" name="p_id" value="<?php echo($item['shoot_id']);?>" >
                    <!-- <button name="deleteCart" ></button> -->
                    <input type="submit" name="deleteCart" class='btn btn-outline-danger' value="Delete Order">
                </form>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

<div class="card border-dark mb-3" style="max-width: 18rem; margin: 0px 100px auto;">
    <div class="card-header">Cart Summary</div>
    <div class="card-body text-dark">
        <h5 class="card-title">Subtotal</h5>
        <?php
        $get = get_from_weddingcart_ctr($cid);
        $shoot = get_from_shootcart_ctr($cid);
        $total = total_weddingcart_price_ctr($cid);
        $shootT = total_shootcart_price_ctr($cid);
        foreach ($get as $item){
        echo $item['wedding.wedding_price*cart.qty'];
        ?>
    <?php
    foreach ($shoot as $item){

    ?>

        <p class="card-text">
            <?php
            echo $item['shoots.shoot_price*cart.qty'];
            ?>
            <?php } ?>
            <?php } ?>

        <h5>Total</h5>
        $<?php echo $total["SUM(cart.qty*wedding.wedding_price)"] + $shootT["SUM(cart.qty*shoots.shoot_price)"]  ?>
        </p>
    </div>
</div>

<!-- Script to handle qyt changes -->
<script>
    function loadDoc(id){
        inputbx= document.getElementByID("pin").value;
        console.log(id);
        dataString = 'pid='+ id +'&inputbx='+inputbx;



        $.ajax({
            type: "POST",
            url:"../actions/update_qty.php",
            data: dataString,
            cache:false,
            success:function(result){
                alert(result);
            }

        });

    }

    function loadDoc1(id1){
        inputbx1 = document.getElementByID("pid").value;
        dataString= 'pid1='+id1+'&inputbx1='+inputbx1;
        console.log(id1);
    }

    $.ajax({
        type: "POST",
        url:"../actions/update_qty.php",
        data: dataString,
        cache:false,
        success:function(result){
            alert(result);
        }

    });
</script>

<!-- Footer Start -->
<div class="container-fluid bg-dark text-secondary px-5 mt-5">
    <div class="row gx-5">
        <div class="col-lg-8 col-md-6">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-12 pt-5 mb-5">
                    <h4 class="text-uppercase text-light mb-4">Get In Touch</h4>
                    <div class="d-flex mb-2">
                        <i class="bi bi-geo-alt text-primary me-2"></i>
                        <p class="mb-0">Indianapolis, IN 46203</p>
                    </div>
                    <div class="d-flex mb-2">
                        <i class="bi bi-envelope-open text-primary me-2"></i>
                        <p class="mb-0">Photo-tamer@gmail.com</p>
                    </div>
                    <div class="d-flex mb-2">
                        <i class="bi bi-telephone text-primary me-2"></i>
                        <p class="mb-0">555-555-5555</p>
                    </div>
                    <div class="d-flex mt-4">
                        <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-square rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                    <h4 class="text-uppercase text-light mb-4">Quick Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                        <a class="text-secondary" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-dark py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>