<!DOCTYPE html>
<html lang="en">
    <?php 
    require '_db.php';
    session_start();
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <script src="https://cdn.tailwindcss.com/"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    table,tr,th,td{
        border: 1px solid #000;
        border-collapse: collapse;
    }
    th,td{
        padding: 10px;
    }
    aside{
        transition: display linear 0.5s;
    }
    aside.hidded{
        transition: all ease 0.3s;
        width: max-content;
        & span{
            display: none;
        }
        & i{
            margin: 0 15px;
        }
    }
</style>
<body class="h-screen w-screen bg-gradient-to-r from-blue-200 to-cyan-200 flex flex-col">
    <section class="home flex flex-1">
        <!-- Menubar -->
        <aside class="duration-5 w-1/5 h-full bg-white flex flex-col pt-[5vh] relative rounded-lg">
            <p id="hider" class="absolute bg-white shadow-lg rounded-md w-[40px] h-[40px] flex justify-center items-center right-[-20px] top-[5px]"><</p>
            <a href="/EmployeeProject/home.php" class="px-2 py-4 bg-white text-sky-500 w-full font-semibold "><i class="bi bi-collection mx-3"></i><span>Show Details</span></a>
            <a href="/EmployeeProject/changePass.php" class="px-2 py-4 w-full font-semibold"><i class="fa-solid fa-key mx-3"></i><span>Change Password</span></a>
            <a href="/EmployeeProject/deleteProfile.php" class="px-2 py-4 w-full font-semibold"><i class="bi bi-trash3 mx-3"></i><span>Delete My Profile</span></a>
            <?php require '_header.php'; ?>
</aside>
<main class="flex-1 h-full flex flex-col items-center">
    <h1 class="text-center m-4 font-semibold text-2xl">Employee Details</h1>
    <?php 
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];

    $sql = "SELECT * FROM registration WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if($result->num_rows == 1){
        $data = mysqli_fetch_assoc($result);
        $name = $data["name"];
        $gender = $data["gender"];
        $mobile = $data["mobile"];
        $e_id = $data["e_id"];
    }
    else{
        echo "Error Fetching Data";
    }
    ?>
    <table class="w-2/3 bg-white font-[Poppins]">
        <tr><th>Employee ID</th><td><?php echo $e_id; ?></td></tr>
        <tr><th>Name</th><td><?php echo $name; ?></td></tr>
        <tr><th>Email</th><td><?php echo $email; ?></td></tr>
        <tr><th>Password</th><td><?php echo $password; ?></td></tr>
        <tr><th>Mobile</th><td><?php echo $mobile; ?></td></tr>
        <tr><th>Gender</th><td><?php
        if($gender == 'm'){
            echo "Male";
        }
        elseif($gender == 'f'){
            echo "Female";
        }
        else{
            echo "Other";
        }
        ?></td></tr>
    </table>
    
    <?php 
    if(isset($_POST['logout'])){
        echo "successfully logout";
        session_destroy();
        header("Location: http://localhost/EmployeeProject/login.php");
    }
    ?>
    </main>
</section>
<script>
    let hider = document.querySelector('#hider');

    hider.addEventListener('click',() => {
        document.querySelector('aside').classList.toggle('hidded');
    })
</script>
</body>
</html>