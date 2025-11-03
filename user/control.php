
<?php

include 'modal.php';




class control extends modal
{
    function __construct()
    {
        session_start();
        // model::__construct()
        parent::__construct();
        $url = $_SERVER['PATH_INFO']; //logoin,about,contact

        switch ($url) {
            case "/index":

                include "index.php";
                break;

            case "/register":

                if (isset($_POST['register'])) {
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $mobile = $_POST['mobile'];

                    // echo $fname,$lname,$email,$password,$mobile;
                    $data = ['fname' => $fname, 'lname' => $lname, 'email' => $email, 'password' => $password, 'mobile' => $mobile];
                    $this->insert('users', $data);
                }
                include "register.php";
                break;

            case "/login":
                if (isset($_POST['login'])) {


                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    if(isset($_POST['remember']))
                    {
                       setcookie('email',$email,time()+10);
                       setcookie('password',$password,time()+10);
                    }

                    $where = ['re_email' => $email, 're_password' => $password];

                    $run = $this->select_where(' register_tbl', $where);
                    // $fetch = mysqli_fetch_array($run)
                    $fetch = $run->fetch_object();
                    $dbEmail = $fetch->re_email;
                    $dbPwd =  $fetch->re_password;
                    $dbName =  $fetch->re_fname . " " . $fetch->re_lname;
                     $dbUserID = $fetch->re_id;

                    // echo $dbName;exit();

                    $_SESSION['username'] = $dbName;
                    $_SESSION['userId'] = $dbUserID;

                    if ($email == $dbEmail && $password == $dbPwd) {
                        header('location:index');
                    }
                }

                include "login.php";
                break;

            case "/logout":
                unset($_SESSION['username']);
                unset($_SESSION['userId']);
                // session_destroy();
                header("location:index");

                break;

            case "/about":
                include "about.php";
                break;

            case "/contact":
                include "contact.php";
                break;

            case "/properties":

                $properties = $this->select(' property');//select * from properties
                include "properties.php";
                break;

            case "/property-details":

                $id = $_REQUEST['id'];

                // echo $id;exit();
                $where = ['property_id' => $id];

                    $run = $this->select_where('property', $where);
                    // $fetch = mysqli_fetch_array($run)
                    $fetch = $run->fetch_object();
                    // $dbEmail = $fetch->email;
                include "property-details.php";
                break;

                 case "/addcart":

                    if(isset($_REQUEST['btn_cart']))
                    {

                if(isset($_SESSION['userId']))
                    {
                        
                    if(isset($_POST['buy']))
                    {
                         $user_id = $_SESSION['userId'];
                        $property_id = $_POST['propid'];                       
                        $quantity = $_POST['qty'];//3

                         $where = ['prop_id' => $property_id, 'user_id' => $user_id];

                    $run1 = $this->select_where('cart', $where);//select quantity from cart where prop_id=2 and user_id=3
                    $fetch = $run1->fetch_object();
                    echo $dbQty = $fetch->quantity;//4
                    // exit();

                       if($dbQty >0)//4 > 0
                       {
                       $quantity = (int) $_POST['qty'];         // force to integer
                       $dbQty = (int) $fetch->quantity;         // force to integer
                       $totalQty = $quantity + $dbQty;          // now it's safe

                        $data = ['quantity'=>$totalQty];//5
                        $where = ['prop_id' => $property_id, 'user_id' => $user_id];
                        $run = $this->update('cart', $data, $where);
                        //update('cart', $data, $where);//update cart set quantity=4 where prd_id=2 and user_id=3
                        if($run)
                        {
                             echo "
                             <script>
                             alert('cart updated')
                             location.href='cart';
                             </script>
                             ";
                        }
                       }
                       else 
                       {
                        $data = ['prop_id' => $property_id, 'user_id' => $user_id,'quantity'=>$quantity];
                        $run = $this->insert('cart', $data);
                          if($run)
                        {
                             echo "
                             <script>alert('added to cart')
                             window.location.href='cart';
                             </script>";
                        }
                       }
                    }

                    }

                    else 
                    {
                        
                             echo 
                             "<script>
                             alert('Please Login first')
                             window.location.href='login';
                             </script>";
                            //  header('location:login');
                        
                    }
                    //  include "addcart.php";
                     break;
                    }
              
                        

                  

     
         case "/cart":

         $cart_arr = $this->select_join2('property','cart',"property.property_id = cart.prop_id");//select * from property join cart on properties.id = cart.prop_id
         include "cart.php";
         break;


        }
    }
}

$obj = new control;
?>