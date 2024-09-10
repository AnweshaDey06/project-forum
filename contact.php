<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="/ess/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>QueryPoint - Contact Us</title>
</head>
<body>
    
    <?php include 'partials/header.php';?>
 
    <div class="container-fluid my-2">
        <div class="jumbotron text-white" style="background-color: black;">
            <h1 class="text-center">Contact Us</h1>
            <hr class="my-4">
            <p class="text-center">We're really glad to welcome you to our website. Need any assistance? We are here to help! Feel free to reach out through this form. We value your feedback!</p>
        </div>
    </div>

        <div class="row">
            <!-- Contact Form Section -->
            <div class="col-md-6 mb-5" style="padding-left:15vh; padding-right:10.5vh">
                <form>
                    <div class="form-group">
                        <label for="fullName"><b>Full Name</b></label>
                        <input type="text" class="form-control" id="fullName" placeholder="Full name" required>
                    </div>

                    <div class="form-group">
                        <label for="email"><b>Email Address</b></label>
                        <input type="email" class="form-control" id="email" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <label for="username"><b>Username</b></label>
                        <input type="text" class="form-control" id="username" placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <label for="phoneNumber"><b>Phone Number</b> (Optional)</label>
                        <input type="tel" pattern="[+][0-9]{2}-[0-9]{10}" class="form-control" id="phoneNumber" placeholder="Phone Number (e.g., +91-XXXXXXXXXX)">
                        <small id="phoneNumberHelp" class="form-text text-muted">Please provide your phone number along with your country code.</small>
                    </div>

                    <div class="form-group">
                        <label for="problem"><b>What seems to be the problem?</b></label>
                        <textarea class="form-control" id="problem" placeholder="Enter your problem here" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="elaborate"><b>Elaborate Your Problem</b></label>
                        <textarea class="form-control" id="elaborate" placeholder="Explain..."></textarea>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="terms" required>
                        <label class="form-check-label" for="terms">Agree to terms and conditions</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Form</button>
                </form>
            </div>
          
            <!-- Contact Information Section -->
            <div class="col-md-6" style="padding-left:30vh">
                <div class="contact-info">
                    <h3>Contact Information</h3>
                    <p><i class="bi bi-telephone-fill"></i> <b>Call Us:</b> +91-9330096875</p>
                    <p><i class="bi bi-envelope-fill"></i> <b>Write Us:</b> anwesha062003@gmail.com</p>
                    <h4>Connect With Us</h4>
                    <p>
                        <a href="https://www.linkedin.com/in/anwesha-dey-1969a7244" target="_blank"><i class="bi bi-linkedin"></i> LinkedIn</a><br>
                        <a href="https://github.com/AnweshaDey06" target="_blank"><i class="bi bi-github"></i> Github</a><br>
                        <a href="https://www.instagram.com/_.blackrosee_?igsh=emE0MHU2cDR0YnBl" target="_blank"><i class="bi bi-instagram"></i> Instagram</a><br>
                        <a href="https://www.facebook.com/profile.php?id=100073094345528&mibextid=ZbWKwL " target="_blank"><i class="bi bi-facebook"></i> Facebook</a><br>
                    </p>
                </div>
            </div>
        </div>

    <?php include 'partials/footer.php';?>

    <!-- Optional JavaScript -->
    <script src="/ess/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
