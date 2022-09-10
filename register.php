<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.php"; ?>
    <link rel="stylesheet" href="./static/CSS/register.css">
    <title>Register</title>
</head>
<body>
    <?php include "header.php"; ?>
    <div class="regContainer">
        <form id="login" action="Backend/register.php" method="POST">
            <h2 class="usercenter">CHFFreshSales User Center</h2><br>
            <p class="green">Create Account</p><br>
            <table>
                <tr>
                    <td>
                        <label class="orange">Your name: </label>&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                    <td class="name" >
                        <input type="text" name="ufname" size="18" maxlength="18" placeholder="First name" required />
                        <input type="text" name="umname" size="18" maxlength="18" placeholder="Middle name" />
                        <input type="text" name="ulname" size="18" maxlength="18" placeholder="Last name" required />

                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="orange">Email : </label>&nbsp;
                    </td>
                    <td>
                        <input type="email" name="pwd" placeholder="Email" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="orange">Phone Number : </label>&nbsp;
                    </td>
                    <td>
                        <input type="text" name="phone" size="18" placeholder="Phone no" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="orange">Address : </label>&nbsp;
                    </td>
                    <td>
                        <input type="text" name="address" placeholder="Address" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="orange">User Type : </label>&nbsp;
                    </td>
                    <td>
                        <div>
                            <input type="radio" id="customer" name="user" value="customer" checked />
                            <label for="customer">Customer</label>
                            <input type="radio" id="trader" name="user" value="show" />
                            <label for="trader">Trader</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="box">
                            <label class="orange" for="custuname">Username</label>
                        </div>
                    </td>
                    <td>
                        <input id="box2" type="text" placeholder="username" name="custuname">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="box3">
                            <label class="orange">Password</label>
                        </div>
                    </td>
                    <td>
                        <input id="box4" type="password" placeholder="Password" name="custpass">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="box5">
                            <label class="orange">Re-Password</label>
                        </div>
                    </td>
                    <td>
                        <input id="box6" type="password" placeholder="Re  Enter Password" name="recustpass">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="box7">
                            <label class="orange" for="shopname">Shop Name</label>
                        </div>
                    </td>
                    <td>
                        <input class="shop1" id="box8" type="text" placeholder="Shop1" name="shopf">
                        <input class="shop1" id="box9" type="text" placeholder="Shop2" name="shops">
                        <input  id="box16" type="text" placeholder="Shop Name" name="traderType">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="box18" >
                            <label for="shopType" class="orange" >Shop Type</label>
                        </div>
                    </td>
                    <td>
                        <select name="shopType" id="box17" style="width:60%;">
                            <option value="ButcherShop">Butcher shop</option>
                            <option value="GreengrocerStore">Greengrocer store</option>
                            <option value="FishmongerShop">Fishmonger shop</option>
                            <option value="BakeryShop">Bakery shop</option>
                            <option value="DelicatessenStore">Delicatessen store</option>d
                        </select>
                    </td>

                </tr>
                <tr>
                    <td>
                        <div id="box10">
                            <label class="orange" for="traduname">Username</label>
                        </div>
                    </td>
                    <td>
                        <input id="box11" type="text" placeholder="username" name="traduname">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="box12">
                            <label class="orange">Password</label>
                        </div>
                    </td>
                    <td>
                        <input id="box13" type="password" placeholder="Password" name="tradpass">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="box14">
                            <label class="orange">Re-Password</label>
                        </div>
                    </td>
                    <td>
                        <input id="box15" type="password" placeholder="Re-Enter Password" name="retradpass">
                    </td>
                </tr>
            </table>
            <div style="text-align: center;">
                <input type="radio" name="radio" value="box" />
                <label for="radio">By creating an account you agree to our <a href="terms.php">Terms</a> & <a
                        href="privacy.php">Privacy</a></label><br><br>
                <button type="submit" onclick="myFunction()" class="registerbtn" name="register">Agree and
                    Register</button>
            </div>
        </form>
    </div>
    <script>
        const box = document.getElementById('box');
        const box2 = document.getElementById('box2');
        function handleRadioClick() {
            if (document.getElementById('customer').checked) {
                box.style.display = 'block';
                box2.style.display = 'block';
                box3.style.display = 'block';
                box4.style.display = 'block';
                box5.style.display = 'block';
                box6.style.display = 'block';
                box7.style.display = 'none';
                box8.style.display = 'none';
                box9.style.display = 'none';
                box10.style.display = 'none';
                box11.style.display = 'none';
                box12.style.display = 'none';
                box13.style.display = 'none';
                box14.style.display = 'none';
                box15.style.display = 'none';
                box16.style.display = 'none';
                box17.style.display = 'none';
                box18.style.display = 'none';
        
            }
            else if (document.getElementById('trader').checked) {
                box.style.display = 'none';
                box2.style.display = 'none';
                box3.style.display = 'none';
                box4.style.display = 'none';
                box5.style.display = 'none';
                box6.style.display = 'none';
                box7.style.display = 'block';
                box8.style.display = 'block';
                box9.style.display = 'block';
                box10.style.display = 'block';
                box11.style.display = 'block';
                box12.style.display = 'block';
                box13.style.display = 'block';
                box14.style.display = 'block';
                box15.style.display = 'block';
                box16.style.display = 'block';
                box17.style.display = 'block';
                box18.style.display = 'block';
            }

            else {
                box.style.display = 'none';
                box2.style.display = 'none';
                box3.style.display = 'none';
                box4.style.display = 'none';
                box5.style.display = 'none';
                box6.style.display = 'none';
                box7.style.display = 'none';
                box8.style.display = 'none';
                box9.style.display = 'none';
                box10.style.display = 'none';
                box11.style.display = 'none';
                box12.style.display = 'none';
                box13.style.display = 'none';
                box14.style.display = 'none';
                box15.style.display = 'none';
                box16.style.display = 'none';
                box17.style.display = 'none';                
                box18.style.display = 'none';                

            }
        }

        const radioButtons = document.querySelectorAll('input[name="user"]');
        radioButtons.forEach(radio => {
            radio.addEventListener('click', handleRadioClick);
        });
    </script>
    <?php include "footer.php"; ?>
    </body>
</html>