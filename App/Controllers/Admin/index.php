<?php
require "../../Models/pdo.php";
require "../../Models/sanbay.php";
require "../../Models/ve.php";
require "../../Models/taikhoan.php";
require "../../Models/chuyenbay.php";
require "../../Models/hanhkhach.php";
require "../../../public/lib/validate.php";

        require "../../Views/Admin/include/header.php";

        $pages = isset($_GET['pages']) ?  $_GET['pages'] : 'home';
        $sanbay    = new SanBay();
        $ve    = new Ve();
        $tk    = new TaiKhoan();
        $chuyenbay    = new ChuyenBay();
        $hanhkhach    = new HanhKhach();

        switch ($pages) {
            //-------------------------------------------------------Module Home---------------------------- 
            case 'home': {
                include "../../Views/Admin/include/home.php";
                break;
            }

            //-------------------------------------------------------Module SanBay---------------------------- 
            case "list_sanbay": {
                $list_sanbay  = $sanbay->sanbay_select_all();
                include "../../Controllers/Admin/sanbay/list.php";
                break;
            }

            case "form_add_sanbay": {
                $list_sanbay  = $sanbay->sanbay_select_all();
                include "../../Controllers/Admin/sanbay/add.php";
                break;
            }

            case "insert_sanbay": {
                $value = check_form_add_sanbay();
                extract($value);
                if (empty($error)) {
                    try {
                        $sanbay->sanbay_insert($MaSanBay,$TenSanBay,$DiaChi,$ThongTinLienHe);
                        echo "<script>alert(\"Add successfully! \");</script>";
                    } catch (PDOException $e) {
                        throw $e;
                        echo "<script>alert(\"Add failed! \");</script>";
                    }
                    echo "<script>window.location.href ='index.php?pages=list_sanbay';</script>";
                } else {
                    $list_sanbay  = $sanbay->sanbay_select_all();
                    include "../../Controllers/Admin/sanbay/add.php";
                }
                break;
            }

            case "edit_sanbay": {
                $id = $_GET['MaSanBay'];
                $item = $sanbay->sanbay_select_by_id($id);
                $list_sanbay  = $sanbay->sanbay_select_all();
                include "../../Controllers/Admin/sanbaygories/edit.php";
                break;
            }

            case "update_sanbay": {
                // $value = check_form_update_sanbay();
                extract($value);

                if (empty($error)) {
                    try {
                        $sanbay->sanbay_update($MaSanBay, $TenSanBay,$DiaChi,$ThongTinLienHe);
                        echo "<script>alert(\"Update successfully! \");</script>";
                    } catch (PDOException $e) {
                        throw $e;
                        echo "<script>alert(\"Update failed! \");</script>";
                    }
                    echo "<script>window.location.href ='?pages=list_sanbay';</script>";
                } else {
                    $id = $_POST['MaSanBay'];
                    $item = $sanbay->sanbay_select_by_id($id);
                    include "../../Controllers/Admin/sanbay/edit.php";
                }
                break;
            }

            case "delete_sanbay": {
                $id = $_GET['MaSanBay'];
                try {
                    $sanbay->sanbay_delete($id);
                    echo "<script>alert(\"Delete successfully! \");</script>";
                } catch (PDOException $e) {
                    // throw $e;
                    echo "<script>alert(\"Delete failed! \");</script>";
                }
                echo "<script>window.location.href ='?pages=list_sanbay';</script>";
                break;
            }

            case "delete_all_sanbay": {
                $id = $_POST['MaSanBay'];
                try {
                    $sanbay->sanbay_delete($id);
                    echo "<script>alert(\"Delete successfully! \");</script>";
                } catch (PDOException $e) {
                    throw $e;
                    echo "<script>alert(\"Delete failed! \");</script>";
                }
                echo "<script>window.location.href ='?pages=list_sanbay';</script>";
                break;
            }


            // //------------------------------------------------------Module Ve------------------------------ 
            case 'list_ve': {
                $list_ve  = $ve->ve_select_all();
                include "../../Controllers/Admin/ve/list.php";
                break;
            }

            case 'add_ve': {
                $list_ve  = $ve->ve_select_all();
                include "../../Controllers/Admin/ve/add.php";
                break;
            }

            // case 'insert_product': {
            //     // $value = check_form_add_product();
            //     extract($value);
            //     if (empty($error)) {
            //         try {
            //             $db->product_insert($product_name, $price, $discount,$quantity, $images, $description, $MaSanBay);
            //             echo "<script>alert(\"Add successfully! \");</script>";
            //         } catch (PDOException $e) {
            //             throw $e;
            //             echo "<script>alert(\"Add failed! \");</script>";
            //         }
            //         echo "<script>window.location.href ='?pages=list_products';</script>";
            //     } else {
            //         $list_sanbay  = $sanbay->sanbay_select_all();
            //         include "../../Controllers/Admin/products/add.php";
            //     }
            //     break;
            // }

            // case 'update_product': {
            //     // $value = check_form_update_product();
            //     extract($value);

            //     if (empty($error)) {
            //         try {
            //             $db->product_update($product_id, $product_name, $price, $discount,$quantity, $images, $description, $MaSanBay);
            //             echo "<script>alert(\"Update successfully! \");</script>";
            //         } catch (PDOException $e) {
            //             throw $e;
            //             echo "<script>alert(\"Update failed! \");</script>";
            //         }
            //         echo "<script>window.location.href ='?pages=list_products';</script>";
            //     } else {
            //         $id = $_POST['product_id'];
            //         $item = $db->products_select_by_id($id);
            //         $list_sanbay  = $sanbay->sanbay_select_all();
            //         include "../../Controllers/Admin/products/edit.php";
            //     }
            //     break;
            // }

            // case 'edit_product': {
            //     $id = $_GET['product_id'];
            //     $item = $db->products_select_by_id($id);
            //     $list_sanbay  = $sanbay->sanbay_select_all();
            //     include "../../Controllers/Admin/products/edit.php";
            //     break;
            // }

            // case "delete_product": {
            //     $id = $_GET["product_id"];
            //     try {
            //         $db->product_delete($id);
            //         echo "<script>alert(\"Delete product successfully! \");</script>";
            //     } catch (PDOException $e) {
            //         throw $e;
            //     }
            //     echo "<script>window.location.href ='?pages=list_products';</script>";
            //     break;
            // }

            // case 'delete_all_product': {
            //     $id = $_POST["product_id"];
            //     try {
            //         $db->product_delete($id);
            //         echo "<script>alert(\"Delete product successfully! \");</script>";
            //     } catch (PDOException $e) {
            //         throw $e;
            //     }
            //     echo "<script>window.location.href ='?pages=list_products';</script>";
            //     break;
            // }
            // case 'add_pro': {
            //     include "../../Controllers/Admin/statistic/add_pro.php";
            //     break;
            // }


            // //-----------------------------------------------------Module Account---------------------------------------------------
            case 'list_taikhoan': {
                $list_tk = $tk->taikhoan_select_all();
                include "../../Controllers/Admin/taikhoan/list.php";
                break;
            }

            // case 'edit': {
            //     include "../../Controllers/Admin/account/" . $pages . ".php";
            //     break;
            // }

            // case 'edit-pw': {
            //     include "../../Controllers/Admin/account/" . $pages . ".php";
            //     break;
            // }

            // //-----------------------------------------------------Module ChuyenBay------------------------------------------------------
            case "list_chuyenbay": {
                $list_chuyenbay = $chuyenbay->chuyenbay_select_all();
                include "../../Controllers/Admin/chuyenbay/list.php";
                break;
            }

            // case 'add_role': {
            //     include "../../Controllers/Admin/roles/form-add.php";
            //     break;
            // }

            // case 'insert_role': {
            //     // $value = check_form_add_role();
            //     extract($value);
            //     if (empty($error)) {
            //         try {
            //             $role->role_insert($role_name);
            //             echo "<script>alert(\"Add successfully! \");</script>";
            //         } catch (PDOException $e) {
            //             // throw $e;
            //             echo "<script>alert(\"Add failed! \");</script>";
            //         }
            //         echo "<script>window.location.href ='?pages=list_role';</script>";
            //     } else {
            //         $list_role  = $role->role_select_all();
            //         include "../../Controllers/Admin/roles/form-add.php";
            //     }
            //     break;
            // }

            // case 'update_role': {
            //     // $value = check_form_update_role();
            //     extract($value);

            //     if (empty($error)) {
            //         try {
            //             $role->update_role($role_id, $role_name);
            //             echo "<script>alert(\"Update successfully! \");</script>";
            //         } catch (PDOException $e) {
            //             throw $e;
            //             echo "<script>alert(\"Update failed! \");</script>";
            //         }
            //         echo "<script>window.location.href ='?pages=list_role';</script>";
            //     } else {
            //         $id = $_POST['role_id'];
            //         $item = $role->role_select_by_id($id);
            //         include "../../Controllers/Admin/roles/edit.php";
            //     }
            //     break;
            // }

            // case 'edit_role': {
            //     $id = $_GET['role_id'];
            //     $item = $role->role_select_by_id($id);
            //     include "../../Controllers/Admin/roles/edit.php";
            //     break;
            // }

            // case "delete_role": {
            //     $id = $_GET["role_id"];
            //     try {
            //         $role->role_delete($id);
            //         echo "<script>alert(\"Delete role successfully! \");</script>";
            //     } catch (PDOException $e) {
            //         echo "<script>alert(\"Delete failed! \");</script>";
            //     }
            //     echo "<script>window.location.href ='?pages=list_role';</script>";
            //     break;
            // }

            // case 'delete_all_role': {
            //     $id = $_POST["role_id"];
            //     try {
            //         $role->role_delete($id);
            //         echo "<script>alert(\"Delete role successfully! \");</script>";
            //     } catch (PDOException $e) {
            //         echo "<script>alert(\"Update failed! \");</script>";
            //     }
            //     echo "<script>window.location.href ='?pages=list_role';</script>";
            //     break;
            // }

            // //-----------------------------------------------------Module Hanh Khach------------------------------------------------------
            case 'list_hanhkhach': {
                $list_hanhkhach = $hanhkhach->hanhkhach_select_all();
                include "../../Controllers/Admin/hanhkhach/list.php";
                break;
            }

            // case 'add_user': {
            //     $list_user  = $tk->user_select_all();
            //     include "../../Controllers/Admin/user/add.php";
            //     break;
            // }

            // case 'insert_user': {
            //     // $value = check_form_add_customer();
            //     extract($value);
            //     if (empty($error)) {
            //         try {
            //             $tk->user_insert($username, $password, $fullname, $email, $phone, $avatar, $role_id, $address);
            //             echo "<script>alert(\"Add successfully! \");</script>";
            //         } catch (PDOException $e) {
            //             throw $e;
            //             echo "<script>alert(\"Add failed! \");</script>";
            //         }
            //         echo "<script>window.location.href ='?pages=list_account';</script>";
            //     } else {
            //         $list_user  = $tk->user_select_all();
            //         include "../../Controllers/Admin/user/add.php";
            //     }
            //     break;
            // }

            // case 'update_user': {
            //     // $value = check_form_update_customer();
            //     extract($value);
            //     if (empty($error)) {
            //         try {
            //             $tk->user_update($user_id, $username, $password, $fullname, $email, $phone, $avatar, $role_id, $address);
            //             echo "<script>alert(\"Update successfully! \");</script>";

            //         } catch (PDOException $e) {
            //             throw $e;
            //             echo "<script>alert(\"Update failed! \");</script>";
            //         }
            //         echo "<script>window.location.href = '?pages=list_account';</script>";
            //     } else {
            //         $id = $_POST['user_id'];
            //         $item = $tk->user_select_by_id($id);
            //         $list_user  = $tk->user_select_all();
            //         include "../../Controllers/Admin/user/edit.php";
            //     }
            //     break;
            // }

            // case 'edit_user': {
            //     $id = $_GET['user_id'];
            //     $item = $tk->user_select_by_id($id);
            //     $list_user  = $tk->user_select_all();
            //     include "../../Controllers/Admin/user/edit.php";
            //     break;
            // }
            // case "delete_user": {
            //     $id = $_GET["user_id"];
            //     try {
            //         $tk->user_delete($id);
            //         echo "<script>alert(\"Delete user successfully! \");</script>";
            //     } catch (PDOException $e) {
            //         throw $e;
            //     }
            //     echo "<script>window.location.href ='?pages=list_account';</script>";
            //     break;
            // }

            // case 'delete_all_user': {
            //     $id = $_POST["user_id"];
            //     try {
            //         $tk->user_delete($id);
            //         echo "<script>alert(\"Delete user successfully! \");</script>";
            //     } catch (PDOException $e) {
            //         throw $e;
            //     }
            //     echo "<script>window.location.href ='?pages=list_account';</script>";
            //     break;
            // }
            
            // //-----------------------------------------------------Module Orders----------------------------------------------------
            // case 'orders':{
            //     include "../../Controllers/Admin/orders/list.php";
            //     break;
            // }

            // case 'order_detail':{
            //     include "../../Controllers/Admin/orders/list_detail.php";
            //     break;
            // }

            // case 'order_delete':{
            //     include "../../Controllers/Admin/orders/delete.php";
            //     break;
            // }
            
            // case 'order_delete_all':{
            //     include "../../Controllers/Admin/orders/delete_all.php";
            //     break;
            // }

            // case 'delete_order_detail':{
            //     include "../../Controllers/Admin/orders/delete_order_detail.php";
            //     break;
            // }

            // //-----------------------------------------------------Module Comments--------------------------------------------------
            // case 'list-comment': {
            //     $comments = $bl->binh_luan_select_all();
            //     include "../../Controllers/Admin/comments/list.php";
            //     break;
            // }

            // case 'detail': {
            //     $detail_comment = $bl->binh_luan_get_detail($_GET['product_id']);
            //     include "../../Controllers/Admin/comments/detail.php";
            //     break;
            // }

            // case 'delete_comment': {
            //     $bl->binh_luan_delete_one($_GET['comment_id']);
            //     $comments = $bl->binh_luan_select_all();
            //     include "../../Controllers/Admin/comments/list.php";
            //     break;
            // }
            
            // //-----------------------------------------------------Module Statistic-------------------------------------------------
            // case 'statistic_comment': {
            //     include "../../Controllers/Admin/statistic/comment.php";
            //     break;
            // }
            //-----------------------------------------------------Module Statistic-------------------------------------------------
            default: {
                include "../../Views/Admin/include/home/404.php";
                break;
            }
            require "../../Views/Admin/include/footer.php";
        }
       
