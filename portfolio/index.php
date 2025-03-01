<?php
if ( isset($_POST['name'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pf";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("<script>alert('Database Connection Failed!');</script>");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    if (empty($name) || empty($email) || empty($message)) {
        echo "<script>alert('All fields are required!');</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO `clint` (`name`, `email`, `message`) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            echo "<script>
            alert('Message Sent Successfully!');

        </script>";
        
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
    $conn->close();
}
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>portfolio</title>

       <link rel="stylesheet" href="index.css">
        
        
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo"></div>
            <ul class="nav-links">
                <li><a href="#about">About</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    
     <div class="container1">
      <div class="box1"></div>
       <div class="box2">
           <div class="image"></div>
            <div class="intro"><ul>
                <div class="name"> 
                 
                    <div id="name2"> <ul><h>KISHAN KUMAR</h>
                     <p id="dev">Full stack developer</p></ul>
                    </div>
                </div>
            </li>
            <li><p>Email: <a href="mailto:kumarkrishnatri2023@gmail.com">kumarkrishnatri2023@gmail.com</a></p></li>
            <li><p>Phone: <a href="tel:+919693240618">9693240618</a></p></li>
            </div>
       </div>
     </div>
    </header>
    <section id="about" class="section">
        <h2>About Me</h2>
        <p>Hello! I'm a BSc (IT) student and a Full Stack Developer. I specialize in creating dynamic, responsive, and user-friendly web applications using modern technologies.</p>
    </section>
    <div class="social-links">
        <a href="https://github.com/kumar-2024" target="_blank">
        <img src="github.gif" alt="Logo" class="logo"></a>
        <a href="https://www.linkedin.com/in/kishan-kumar-5a1025345/" target="_blank">
        <img src="linkedin-2.gif" alt="Logo" class="logo"> </a>
        <a href="https://x.com/KishanKum7" target="_blank"> 
        <img src="twitter-bird.gif" alt="Logo" class="logo"></a>
        <a href="https://www.instagram.com/kumarkrishna___2_3/" target="_blank"> 
        <img src="instagram-logo.gif" alt="Logo" class="logo"></a>
        <a href="https://www.facebook.com/profile.php?id=61552608502950" target="_blank"> 
        <img src="facebook.gif" alt="Logo" class="logo"></a>
    </div>

    <section id="skills" class="section">
        <h2>Skills</h2>
        <div class="skills-container">
            <div class="skill">prompt expert</div>
            <div class="skill">HTML</div>
            <div class="skill">CSS</div>
            <div class="skill">JavaScript</div>
            <div class="skill">React</div>
            <div class="skill">Node.js</div>
            <div class="skill">MongoDB</div>
            <div class="skill">MySQL</div>
            <div class="road"></div>  
           
        </div>
    </section>

    <section id="projects" class="section">
        <h2>Projects</h2>
        <div class="project">
            <h3>Project 1</h3>
            <p>my portfolio.</p>
            <a href="https://github.com/kumar-2024/my-portfolio" class="btn">View Project</a>
        </div>
        <div class="project">
            <h3>Project 2</h3>
            <p>amazone clone.</p>
            <a href="file:///D:/code/amazon%20site/amazon%20clone/index.html" class="btn">View Project</a>
        </div>
        <div class="project">
            <h3>Project 3</h3>
            <p>currency converter.</p>
            <a href="file:///D:/code/java%20script/currency%20converter/index.html?from=USD&to=INR" class="btn">View Project</a>
        </div>
        <div class="project">
            <h3>Project 4</h3>
            <p>stone paper scissors game.</p>
            <a href="file:///D:/code/java%20script/stone%20paper%20scissors%20game/indexhtml.html" class="btn">View Project</a>
        </div>
       
    </section>
   
    <section id="contact" class="section">
    <h2>Contact Me</h2>
    <form id="contact-form" action="index.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="message">Message:</label>
    <textarea id="message" name="message" rows="5" required></textarea>

    <button type="submit" class="btn">Send Message</button>
</form>
</section>



    <footer>
        <p>&copy; 2025 My Portfolio. All Rights Reserved.</p>
    </footer>
  
</body>

</html>