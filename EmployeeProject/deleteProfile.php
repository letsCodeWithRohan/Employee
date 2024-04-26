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
    aside{
        transition: all linear 0.5s;
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
        <aside class="duration-500 ease-in w-1/5 h-full bg-white flex flex-col pt-[5vh] relative rounded-lg">
            <p id="hider" onclick="hidenav()" class="absolute bg-white shadow-lg rounded-md w-[40px] h-[40px] flex justify-center items-center right-[-20px] top-[5px]"><</p>
            <a href="/EmployeeProject/home.php" class="px-2 py-4 bg-white w-full font-semibold "><i class="bi bi-collection mx-3"></i><span>Show Details</span></a>
            <a href="/EmployeeProject/changePass.php" class="px-2 py-4 w-full font-semibold"><i class="fa-solid fa-key mx-3"></i><span>Change Password</span></a>
            <a href="/EmployeeProject/deleteProfile.php" class="px-2 py-4 text-sky-500 w-full font-semibold"><i class="bi bi-trash3 mx-3"></i><span>Delete My Profile</span></a>
            <?php require '_header.php'; ?>
            <!-- Log out Code -->
            <?php 
            if(isset($_POST['logout'])){
                echo "successfully logout";
                session_destroy();
                header("Location: http://localhost/EmployeeProject/login.php");
            }
            ?>
</aside>
<main class="flex-1 h-full flex flex-col items-center justify-center">
    <?php 
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    ?>
    <form action="" method="post" class="w-[30%] bg-white rounded-md p-4">
            <h1 class="text-center font-bold text-2xl font-[Poppins]">Delete Profile</h1>

            <!-- Password -->
            <div class="inputField flex flex-col gap-2 py-2 my-2">
                <label for="email">
                    Enter Password
                </label>
                <input required class="border-[#bbb] rounded-sm valid:border-[dodgerblue] border-[1px] p-2" type="password" placeholder="Enter Password" name="password">
            </div>

            <div class="inputField flex items-center gap-2 py-2 my-2">
                <input type="checkbox" required><p>Are you sure to delete your profile ?</p>
            </div>
            <!-- Login Button -->
            <button type="submit" class="w-full p-2 bg-white text-red-500 border-[1px] border-red-500 mt-2 rounded-sm hover:bg-red-500 hover:text-white" name="deleteme"> Delete Profile</button>

            <?php 
            if(isset($_POST["deleteme"])){
                $pass = $_POST['password'];
                if($pass == $password){
                    $sql = "DELETE FROM registration WHERE email='$email' && password='$password'";
                    if($conn->query($sql)){
                        echo '<p class="text-center p-3 font-semibold text-sm mt-2 text-white bg-green-500" id="hideIt" onclick="hideMsg()">Profile Deleted</p>';
                        header("Location: http://localhost/EmployeeProject/login.php");
                    }
                    else{
                        echo '<p class="text-center p-3 font-semibold text-sm mt-2 text-white bg-red-500" id="hideIt" onclick="hideMsg()">Unable to Delete</p>';
                    }
                }
                else{
                    echo '<p class="text-center p-3 font-semibold text-sm mt-2 text-white bg-red-500" id="hideIt" onclick="hideMsg()">Wrong Password</p>';
                }
            }
            ?>
        </form>
    
    </main>
</section>
<script>
    function hidenav(){
            document.querySelector('aside').classList.toggle('hidded');
        }
        function hideMsg (){
            document.querySelector('#hideIt').style.display = 'none';
        }
        </script>
</body>
</html>