<?php 
  require('db_connect.php');
    $name = $age = $address ='';
    $errors = array('name'=>'' , 'age'=>'' , 'address'=>'');

     if(isset($_POST['submit'])){
         if(empty($_POST['name'])){
            $errors['name'] = 'Plesae Enter Your Name.';
         }else{
            $name = $_POST['name'];
            if(!preg_match('/^[a-zA-Z\s]+$/' , $name)){
                $errors['name'] = 'Name Must Conatin Only Letters and Space.';
            }
        }
         if(empty($_POST['age'])){
            $errors['age'] = 'Plesae Enter  Your Age.';
        }else{
            $age = $_POST['age'];
            if(!preg_match('/^[0-9]*$/' , $age)){
                $errors['age'] = 'Please Enter a Valid Age.';
            }
        }
        if(empty($_POST['address'])){
            $errors['address'] = 'Plesae Enter Township.';
        }else{
            $address = $_POST['address'];
            if(!preg_match('/^[a-zA-Z\s]+$/' , $address)){
                $errors['address'] = 'Please Enter Township only.';
        }
    }
    if(array_filter($errors)){

    }else{
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $age = mysqli_real_escape_string($conn,$_POST['age']);
        $address = mysqli_real_escape_string($conn,$_POST['address']);
        $sql="INSERT INTO users(Name,Age,Address) VALUES('$name','$age','$address')";

        if(mysqli_query($conn,$sql)){
            header('location: success.php');
        }else{
            echo "error";
        }
        
    }
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Registration Form</title>
</head>
<body>
    <div class="container-md">
        <h1 class="text-center" style="margin: 50px;">Registration Form</h1>
        <div class="mx-auto bg-light" style="width: 400px; padding: 20px;">
            <form action="index.php" method="POST">
                <div class="form-group" style="margin-bottom: 30px;">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>">
                  <div class="text-warning"> <?php echo $errors['name']; ?></div>
                </div>
                <div class="form-group" style="margin-bottom: 30px;">
                  <label for="age">Age</label>
                  <input type="text" class="form-control" id="age" name="age" value="<?php echo $age ?>">
                  <div class="text-warning"> <?php echo $errors['age']; ?></div>
                </div>
                <div class="form-group" style="margin-bottom: 30px;">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $address ?>">
                    <div class="text-warning"> <?php echo $errors['address']; ?></div>
                  </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </form>
        </div>
    </div>
</body>
</html>