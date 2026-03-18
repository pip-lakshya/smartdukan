<?php include('config.php');
 session_start(); 
 $user= $_SESSION['username'] ;
 $inven=$user."_inventory";
 if ($_SERVER['REQUEST_METHOD'] === 'POST')
     { $action = $_POST['action'] ?? '';
  $sr_no = $_POST['sr_no'] ?? ''; 
  $pro_id = $_POST['product_id'] ?? '';
   $pro_type = $_POST['pro_type'] ?? ''; 
   $brand = $_POST['brand'] ?? '';
    $price = $_POST['price'] ?? ''; 
    $quantity = $_POST['quantity'] ?? ''; 
    $specification = $_POST['specification'] ?? ''; 
    if ($action === 'insert') { $sql = "INSERT INTO $inven (product_id, pro_type, brand, price, quantity, specification) VALUES (?, ?, ?, ?, ?, ?)"; 
    $stmt = $conn->prepare($sql);
     $stmt->bind_param("sssdis", $pro_id, $pro_type, $brand, $price, $quantity, $specification); 
     $stmt->execute(); 
     header("Location: inventory_management.php");
      exit; 
      } 
      if ($action === 'edit' && !empty($sr_no)) { $sql = "UPDATE $inven SET product_id=?, pro_type=?, brand=?, price=?, quantity=?, specification=? WHERE sr_no=?"; 
      $stmt = $conn->prepare($sql); 
      $stmt->bind_param("sssdisi", $pro_id, $pro_type, $brand, $price, $quantity, $specification, $sr_no); 
      $stmt->execute();
       header("Location: inventory_management.php");
        exit;
         } if ($action === 'delete' && !empty($sr_no)) { $sql = "DELETE FROM $inven WHERE sr_no=?"; $stmt = $conn->prepare($sql);
          $stmt->bind_param("i", $sr_no);
           $stmt->execute();
            header("Location: inventory_management.php"); 
            exit;
             } } ?>