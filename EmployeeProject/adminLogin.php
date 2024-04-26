<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EmpPlaza</title>
    <script src="https://cdn.tailwindcss.com/"></script>
</head>
<body class="font-[Poppins] overflow-x-hidden">
    <main class="h-[100vh] w-screen bg-zinc-600 flex items-center justify-center">
        <form action="" method="post" class="w-[30%] bg-white rounded-md p-4">
            <h1 class="text-center font-bold text-2xl font-[Poppins]">Login (Admin)</h1>

            <!-- Email -->
            <div class="inputField flex flex-col gap-2 py-2">
                <label for="email">
                    Email
                </label>
                <input required class="border-[#bbb] rounded-sm valid:border-[dodgerblue] border-[1px] p-2" type="email" placeholder="Enter Your Email" name="email">
            </div>

            <!-- Password -->
            <div class="inputField flex flex-col gap-2 py-2">
                <label for="password">
                    Password
                </label>
                <input required class="border-[#bbb] rounded-sm valid:border-[dodgerblue] border-[1px] p-2" type="password" placeholder="Create Password" name="password">
            </div>

            <!-- Login Button -->
            <button type="submit" class="w-full p-2 bg-sky-600 text-white mt-2 rounded-sm hover:bg-sky-700" name="login">Login</button>

            <div class="pt-4 flex items-center gap-2 text-center justify-center">
                <p>Don't have an account ?</p>
                <a href="/EmployeeProject/register.php" class="text-sky-900 underline">Register Now</a>
            </div>
            <?php
                require '_db.php';
                if(isset($_POST['login'])){
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $sql = "SELECT * FROM admin WHERE email='$email'";

                    //return true or false if result found or not
                    $result = $conn->query($sql);

                    //if result have no records
                    if($result->num_rows == 1){
                        // associate result in $data array
                        $data = mysqli_fetch_assoc($result);
                        // echo $data["email"]." <br> ".$data["password"];
                        if($email == $data["email"] && $password != $data["password"]){
                            echo '<p class="text-center p-3 font-semibold text-sm mt-2 text-white bg-red-500" id="hideIt">Wrong Password</p>';
                        }
                        elseif($password == $data["password"] && $email != $data["email"] ){
                            echo '<p class="text-center p-3 font-semibold text-sm mt-2 text-white bg-red-500" id="hideIt">Email not Found</p>';
                        }
                        elseif($password == $data["password"] && $email == $data["email"]){
                            echo '<p class="text-center p-3 font-semibold text-sm mt-2 text-white bg-green-500" id="hideIt">Successfully Logged in</p>';
                            session_start();
                            $_SESSION['email'] = $data["email"];
                            $_SESSION['password'] = $data["password"];
                            header("Location: http://localhost/EmployeeProject/adminHome.php");
                        }
                        else{
                            echo "Unknown error !!!";
                        }

                    }
                    else{
                        echo '<p class="text-center p-3 font-semibold text-sm mt-2 text-white bg-red-500" id="hideIt">No Email Found</p>';
                    }
                }
            ?>
        </form>
    </main>
    <script>
        document.querySelector('#hideIt').addEventListener('click',() => {
            document.querySelector('#hideIt').style.display = 'none';
        })
    </script>
</body>
</html>