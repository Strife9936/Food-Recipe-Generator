<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef's best friend</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="contactstyles.css">
</head>
<body>
    <div class ="backgroundImage">
        <div class="navbar">
            
            <img src="navLogo.jpeg" alt="navLogo" class="navLogo">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutMe.php">About</a></li>
                <li><a href="allcategories.php">Categories</a></li>
                <li><a href="recipes.php"> All Recipes</a></li>
                <li><a href="contact.php">Contact</a></li>
                
            </ul>
        </div>
        <section class="contact">
        <div class="content">
            <h2>Contact Us</h2>
            
        </div>
        <div class="container">
            <div class="contactInfo">
               <div class="box">
                <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                 <div class="text">
                     <h3>Address</h3>
                    <p>1000 Morris Ave,<br> Union NJ,<br> 07083</p>
                </div>
               </div> 
               <div class="box">
                <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                 <div class="text">
                     <h3>Phone</h3>
                    <p>(908) 737-5326</p>
                </div>
               </div>
               <div class="box">
                <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                 <div class="text">
                     <h3>Email</h3>
                    <p>Parraolk@kean.edu</p>
                </div>
               </div>
            </div>

           <div class ="container">
        <div class = "contactForm">
            <div class = "contact-left">
                <h3>Connect With Us</h3>
                <h4 class="sent-notification"></h4>
                <form id="myForm">
			<h2>Send an Email</h2>

			<label>Name</label>
			<input id="name" type="text" placeholder="Enter Name">
			<br><br>

			<label>Email</label>
			<input id="email" type="text" placeholder="Enter Email">
			<br><br>

			<label>Subject</label>
			<input id="subject" type="text" placeholder=" Enter Subject">
			<br><br>

			<p>Message</p>
			<textarea id="body" rows="5" placeholder="Type Message"></textarea><!--textarea tag should be closed (In this coding UI textarea close tag cannot be used)-->
			<br><br>

			<button type="button" onclick="sendEmail()" value="Send An Email">Submit</button>
		</form>
            </div>
            
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'contactform.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>
                 
                </form>
               </div>
        </div>
        </section>
    </div>
</body>
</html>

