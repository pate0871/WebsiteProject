<!DOCTYPE html>
<?php
    $message_sent = false;

    if(isset($_POST['email']) && $_POST['email'] != '') {

        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

            //submit the form
            $name = $_POST['name'];
            $email = $_POST['email'];
            $school = $_POST['university_college'];
            $program = $_POST['studyProgram'];
            $message = $_POST['message'];

            $to = "paulmarhousing@gmail.com";
            $subject = "Rental Inquiry";
            $body = "";

            $body .= "From: ".$name. "\r\n";
            $body .= "Email: ".$email. "\r\n";
            $body .= "University Or College: ".$school. "\r\n";
            $body .= "Program of Study: ".$program. "\r\n";
            $body .= "Message: ".$message. "\r\n";

            mail($to, $subject, $body);

            $message_sent = true;
        }
    }

?>
<html lang="en">
    <head>
        <meta charset ="utf-8" />
        <title>Contact Us</title>
        <script src="https://kit.fontawesome.com/b31799f5a9.js" crossorigin="anonymous"></script> <!-- This is my kit of icons -->
        <style>
            html, body {
                margin: 0;
                padding: 0;
                font-family: 'Open Sans', sans-serif;
            }
            
            .sideNav {
                height: 100%;
                width: 0;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-image: url("logo/logoBackground.jpeg");
                background-blend-mode: multiply;
                background-size: cover;
                overflow-x: hidden;
                transition: 0.5s;
                padding-top: 60px;
            }

            .sideNav a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 25px;
                color: black;
                display: block;
                transition: 0.3s;
            }

            .sideNav a:hover {
                color: #f1f1f1;
            }

            .closeBtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
            }

            @media screen and (max-height: 100px) {
                .sidenav {padding-top: 15px;}
                .sidenav a {font-size: 18px;}
            }
            hr.iconLine {
                width:40%;
                margin-left: 15px;
            }
            .navHeader {
                background-image: url("logo/logoBackground.jpeg");
                background-blend-mode: multiply;
                background-size: cover;
                padding-bottom: 0px;
                padding-top: 0px;
            }
            .header{
                display: flex;
                width: calc(100% - 30px);
                justify-content: space-between;
                margin-left: 10px;
            }
            .center {
                width: 120px;
                height: 45px;
                margin-top: 10px;
            }
            .left {
                color: black;
                margin-top: 10px;
                font-size: 25px;
                cursor:pointer;
                display:flex;
            }

            .footerNote {
                margin-top: 5px;
                position: fixed;
                width:100%;
                bottom: 0; 
                text-align: center;
                background-image: url("logo/logoBackground.jpeg");
                background-blend-mode: multiply;
                background-size: cover;
                padding-bottom: 30px;
            }
            .footerNote a {
                text-align: center;
                text-decoration: none;
                color: black;
                margin: 0;
                padding: 8px;
            }
            .footerNote p {
                margin: 0;
                color: black;
            }
            .footLine {
                width:50%;
                color:black;
            }
            .footIcon {
                text-align: center;
            }
            .footIcon a {
                text-decoration: none;
                font-size: 20px;
                color: black;
                padding-right: 25px;
            }

            /* Contact Us Form Style */
            .contactForm {
                margin: auto;
                padding-left: 300px;
                padding-top: 100px;

            }
            
            .button {
                font-family: 'Roboto', sans-serif;
                padding: 5px 32px;
                text-transform: uppercase;
                text-align: center;
                letter-spacing: 2.5px;
                color: white;
                background-color: rgb(25, 97, 15);
                border: none;
                border-radius: 45px;
                box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease 0s;
                cursor: pointer;
                outline: none;
                margin: 4px 2px;
                font-size: 16px;
            }

            .button:hover {
                background-color: rgb(223, 20, 20);
                box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
                color: #fff;
                transform: translateY(-7px);
            }
        </style>
    </head>
    <body>
        <!-- This is for the navigation bar at the top-->
        <header class="navHeader">
            <div id="sideNavigation" class="sideNav">
                <a href="javascript:void(0)" class="closeBtn" onclick="closeNav()">&times;</a>
                <a href="index.html">HOME</a>
                <a href="aboutus.html"></i>ABOUT US</a>
                <a href="safety.html"></i>SAFETY</a>
                <a href="properties.html"></i>PROPERTIES</a>
                <a href="contactus.html"></i>CONTACT US</a>
                
                <hr class="iconLine"> <!-- line to separate all our linked pages from the social media icons-->
                <a href="https://www.facebook.com/paulmarhousing" style="display:inline-block"><i class="fab fa-facebook"></i></a>
            </div>
            <div class="header">
                <span class="left" onclick="openNav()">&#9776; MENU</span>
                <img class="center" src="./logo/logo.png" width="300" height="100"alt="logoPicture">
            </div>
            <hr class="navLine"> <!-- line to separate header from the main content-->
        </header>

        <?php
            if($message_sent):
        ?>
            <h3> Thank you for your inquiry. We'll be in touch soon! </h3>
            
        <?php
             else:
        ?>
        
        <div class="contactForm">
            <h1>Contact Us</h1>
            <p>Please complete the information below. Fields marked with <span class="required">*</span>
                are required fields.
            </p>
            <form method="POST" action="contact.php">
                <table>
                    <tbody>
                        <tr>
                            <td>Name<span class="required">*</span></td>
                            <td><input type="text" id="name" name="name" class="large" required="required" /></td>
                        </tr>
                        <tr>
                            <td>E-mail<span class="required">*</span></td>
                            <td><input type="text" id="email" name="email" class="large" required="required" /></td>
                        </tr>
                        <tr>
                            <td>University/College<span class="required">*</span></td>
                            <td>
                                <select id="university_college" name="university_college" required="required">
                                    <option value="">--Select Your University or College--</option>
                                    <option value="UWO">University of Windsor</option>
                                    <option value="SCC">St. Clair College</option>
                                    <option value="None">None</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Program of Study <span class="required">*</span></td>
                            <td><input type="text" id="studyProgram" name="studyProgram" class="large" required="required" /></td>
                        </tr>

                        <tr>
                            <td>Message <span class="required">*</span></td>
                            <td><textarea class="large" id="message" name="message"></textarea></td>
                        </tr>
                    </tbody>
                </table>
                <br/>
                <!--Clear button -->
                <input class="button" type="reset" value="Clear">
                <!-- Submit button that submits the form-->
                <input class="button" type="submit" value="Submit">
            </form>
        </div>
        <?php
            endif;
        ?>

        <!-- Footer-->
        <footer class="footerNote">
            <div class="footerlo">
                <img class="footerlogo" src="./logo/logo.png" width="200" height="75">
            </div>
                <a href="index.html">HOME</a>
                <p style="display: inline-block;">|</p>
                <a href="aboutus.html"></i>ABOUT US</a>
                <p style="display: inline-block;">|</p>
                <a href="safety.html"></i>SAFETY</a>
                <p style="display: inline-block;">|</p>
                <a href="properties.html"></i>PROPERTIES</a>
                <p style="display: inline-block;">|</p>
                <a href="contactus.html"></i>CONTACT US</a>
                <hr class="footLine">
            <div class="footIcon">
                <a href="https://www.facebook.com/paulmarhousing"><i class="fab fa-facebook"></i></a>
            </div>
        </footer>
        <!-- Script for opening and closing the side navigation-->
        <script>
            function openNav() {
              document.getElementById("sideNavigation").style.width = "30%";
            }
            
            function closeNav() {
              document.getElementById("sideNavigation").style.width = "0";
            }
        </script>
    </body>
</html>