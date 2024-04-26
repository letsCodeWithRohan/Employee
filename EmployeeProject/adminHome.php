<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Admin</title>
</head>
<body>
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
</style>
<body class="h-screen w-screen bg-zinc-900">
<header class="bg-zinc-700 text-white px-[3vw] w-full h-[60px] items-center justify-between flex text-white">
        <h1>Logo</h1>    
        <form action="" method="post">
        <button class="bg-red-500 text-white p-2 rounded-md mt-3" name="logout"><i class="bi bi-box-arrow-right me-3"></i>Log out</button>
    </form>
</header>
<section class="home flex">
    <!-- Menubar -->
    <aside class="w-1/5 h-screen bg-zinc-800 flex flex-col pt-[5vh] text-white">
    <a href="/EmployeeProject/adminHome.php" class="px-2 py-4 bg-white bg-zinc-700 w-full font-semibold "><i class="bi bi-collection me-3"></i>Show Details</a>
    <a href="/EmployeeProject/adminHome.php" class="px-2 py-4 w-full font-semibold"><i class="fa-solid fa-key me-3"></i>Change Password</a>
    <a href="/EmployeeProject/adminHome.php" class="px-2 py-4 w-full font-semibold"><i class="bi bi-trash3 me-3"></i>Delete My Profile</a>
</aside>
<main class="w-4/5 h-screen flex flex-col items-center">
    <h1 class="text-center m-4 font-semibold text-2xl text-white">Employee Details</h1>
    <?php 
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    ?>
    <table class="w-2/3 bg-white">
        
    </table>
    
    <?php 
    if(isset($_POST['logout'])){
        echo "successfully logout";
        session_destroy();
        header("Location: http://localhost/EmployeeProject/adminLogin.php");
    }
    ?>
    </main>
</section>
</body>
</html>
</body>
</html>