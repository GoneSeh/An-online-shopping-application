<!DOCTYPE html>
<html>
  <head>
    <title>UTARBABA E-SHOPPING </title>
    <link rel="stylesheet" href="../style/homeStyle.css">

  </head>
  <body>
    <br>
    <?php require "../includes/env.php" ?>
    <?php include("../includes/header.php"); ?>
    <?php include("../includes/navigation.php"); ?>

    <div class="homePage">
      <div class="slideshow"> <!--images for slideshow-->
        <img src="../images/1.png" alt="UTARBABA Poster 1" />
        <img src="../images/2.png" alt="UTARBABA Poster 2" />
        <img src="../images/3.png" alt="UTARBABA Poster 3" />
        <img src="../images/4.png" alt="UTARBABA Poster 4" />
      </div>

      <script>
        // Activate the slideshow using JavaScript
        const slideshow = document.querySelector('.slideshow');
        let slideIndex = 0;
        showSlides();

        function showSlides() {
          const slides = slideshow.getElementsByTagName('img');
          for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = 'none';
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}    
          slides[slideIndex-1].style.display = 'block';  
          setTimeout(showSlides, 3000); // Change image every 3 seconds
        }
      </script>

  <article>  <!--overview and intro to UTARBABA-->
  <h1>🛒 Welcome to UTARBABA E-SHOPPING!</h1>
  <p>✨ Discover a whole new way to shop with <strong>UTARBABA E-SHOPPING</strong> — your one-stop destination for effortless, exciting, and affordable online shopping. Whether you're looking for the latest fashion trends 👗, everyday essentials 🧴, or unique finds 🎁, we’ve got something for everyone — right at your fingertips 📱.</p>

  <p>🌐 At UTARBABA, we’re more than just an online store — we’re a digital marketplace built to bring convenience, variety, and quality to your screen. From must-have gadgets 🔌 to lifestyle products 🏠 and student-friendly bundles 🎓, our diverse range ensures you’ll find exactly what you need — anytime, anywhere ⏰.</p>

  <p>🚀 We aim to simplify your shopping journey while keeping it fun and personalized. With easy navigation 🧭, secure checkouts 🔒, and fast delivery 🚚, UTARBABA E-SHOPPING is designed with you in mind — whether you're shopping from campus 🏫 or relaxing at home 🛋️.</p>

  <p>🙌 Join a growing community of smart shoppers who choose UTARBABA for affordability 💸, accessibility 🌍, and assurance ✅. Start exploring today and enjoy the freedom of shopping smarter, faster, and better 🌟.</p>

  <p>💼 Welcome to <strong>UTARBABA</strong> — where smart shopping begins! 🎉</p>
</article>

    
      <br><br>
    </div>
    <?php include('../includes/footer.php'); ?>

  </body>
</html>
