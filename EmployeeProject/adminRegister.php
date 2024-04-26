<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Admin</title>
    <script src="https://cdn.tailwindcss.com/"></script>
</head>
<body class="font-[Poppins] overflow-x-hidden">
    <main class="min-h-[100vh] w-screen bg-zinc-600 flex items-center justify-center">
        <form action="" method="post" class="w-[30%] bg-white rounded-md p-4">
            <h1 class="text-center font-bold text-2xl font-[Poppins]">Register (Admin)</h1>

            <!-- Name -->
            <div class="inputField flex flex-col gap-2 py-2">
                <label for="name">
                    Name
                </label>
                <input required class="border-[#bbb] rounded-sm valid:border-[dodgerblue] border-[1px] p-2" type="text" placeholder="Enter Your Name" name="name">
            </div>

            <!-- Email -->
            <div class="inputField flex flex-col gap-2 py-2">
                <label for="email">
                    Email
                </label>
                <input required class="border-[#bbb] rounded-sm valid:border-[dodgerblue] border-[1px] p-2" type="email" placeholder="Enter Your Email" name="email">
            </div>
            
            <!-- Mobile -->
            <div class="inputField flex flex-col gap-2 py-2">
                <label for="mobile">
                    Mobile Number
                </label>
                <input required class="border-[#bbb] rounded-sm valid:border-[dodgerblue] border-[1px] p-2" pattern="[0-9]{10}" type="tel" placeholder="Enter Your Mobile No." name="mobile">
            </div>

            <!-- Password -->
            <div class="inputField flex flex-col gap-2 py-2">
                <label for="password">
                    Password
                </label>
                <input required class="border-[#bbb] rounded-sm valid:border-[dodgerblue] border-[1px] p-2" type="password" placeholder="Create Password" name="password">
            </div>

            <!-- Terms -->
            <div class="inputField flex items-center gap-2 py-2">
                <input type="checkbox" required>
                <p>Accept to Terms of Services</p>
            </div>

            <!-- Register Button -->
            <button type="submit" class="w-full p-2 bg-sky-600 text-white mt-2 rounded-sm hover:bg-sky-700" name="register">Register</button>

            <div class="pt-4 flex items-center gap-2 text-center justify-center">
                <p>Already have an admin</p>
                <a href="/EmployeeProject/adminLogin.php" class="text-sky-900 underline">Login Now</a>
            </div>

            <?php
                require '_db.php';

                if(isset($_POST['register'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $mobile = $_POST['mobile'];
                $password = $_POST['password'];

                $sql = "INSERT INTO admin values ('$name','$email',$mobile,'$password')";

                if($conn->query($sql) === TRUE){
                    echo '<h1 class="flex items-center text-xl w-full font-semibold text-[green]">Successfully Registered</h1>';
                    header("Location: http://localhost/EmployeeProject/adminLogin.php");
                }
                }
?>
        </form>
    </main>
</body>
</html>