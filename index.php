<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>Almuni CRM</title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="./css/homepage.css" />
        <script src="index.js" defer></script>
	</head>

	<body>
		<div class="topbar">
			<a class="logo">Almuni CRM</a>
			<div class="topbar-right">
				<a class="active" href="">Home</a>
				<a href="loginpage.php">Login</a>
				<a href="aboutus.php">About</a>
			</div>
		</div>
        <div class="intro-container">
            <div class="center-text">
                    <div>Alumni CRM</div>
                    <span class="txt-rotate" data-period="2000" data-rotate='["Revolutionized", "Reimagined", "Rethinked", "Everything"]'></span>
            </div>
        </div>
        <div class="innerbar" style="color: white;">
            <h2 style="margin-left: 30px;">Your Contacts , All in one platform</h2>
        </div>
       <div class="maincontent">
           <div class="subheadingwrapper">
            <div class="subheading">
                What is Almuni CRM?
                <div class="explain">
                    Almuni is your Alumni Contact Management Website for you to manage all your institution's alumni contacts! It is designed with ease of use in mind and everything is easy to access. Front End powered by HTML, CSS and JS. Backend with PHP
                </div>
            </div>
           </div>
           <div class="subheadingwrapper">
            <div class="subheading">
               Features
               <div class="information-container">
                <div class="subgrid">
                    <div> A search function is available to ease admins to finding specific contacts rather than scrolling around and manually searching.</div>
                </div>
                <div class="subgrid">
                    <div>Almuni includes login functions for regular users and admins. Admins will have the ability to display all registered almuni users and approve if any are register pending.</div>
                </div>
                <div class="subgrid">
                    <div> Admins are able to edit, add and delete contacts and send out announcements on the webpage to inform all alumni contacts.</div>
                </div>
            </div>
            </div>
           </div>
       </div> 
		
        <div class="innerbar" style="color: white;">
            <h2 style="padding: 1.5rem 0px;">Join Us Now</h2>
            <hr style="width: 50%; margin: auto;">
            <div class="subheadingwrapper">
                <div class="redirectbar">
                <div>
                    New User?
                </div>
                <div><button class="redirect" onclick="redirectToSignup()">Register Now</button></div>
                <div>
                    Existing User?
                </div>
                <div><button class="redirect" onclick="redirectToLogin()">Login</button></div>
            </div>
            </div>
        </div>
        </div>
        <footer class="footer-under">
                <div class="footer-container">
                    <div class="foot-lists">
                        <div class="foot-list">
                            <div class="footer-list-item"><i>WEDGE</i> &copy; All Rights Reserved 2021</div>
                            <div class="footer-list-item"></div>
                            <div class="footer-list-item">Illegal copying is prohibited without the consent of the author and related parties</div>
                        </div>
                    </div>
                    <div class="foot-lists">
                        <div class="foot-list">
                            <div class="footer-list-item"><a href="mailto:someone@gmail.com" style="color: white;">Email</a>
                                <span>&nbsp; • &nbsp;</span>
                                <a style="color: white;">Does Nothing</a>
                                <span>&nbsp; • &nbsp;</span>
                                <a style="color: white;">Jack's Instagram</a>
                            </div>
                        </div>
                    </div>
                </div>
          </footer>
	</body>   
</html>
