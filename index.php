<?php
    include_once('connect.php');
    $title = "BLOG.NET";
    include_once('include/header.php');
    session_start();
?>

<main>
    <article>
        <section id="banner">
           <img class="banner" src="image/banner.jpg">
        </section>

        <section id="entries">
          <div class="container">
            <div class="slogan slogan1">
              <p class="text">Stwórz swój własny blog i dziel się swoją pasją ze światem - <span>z naszą aplikacją to dziecinnie proste!</span></p>
            </div>
            <div class="image image1"></div>
          </div>

          <div class="container">
            <div class="image image2"></div>
            <div class="slogan slogan2">
                <p class="text">Zapomnij o nudnej treści - <span>z naszą aplikacją blogową każdy wpis to fascynująca historia!</span></p>
            </div>
          </div>

          <div class="container">
            <div class="slogan slogan3">
                <p class="text">Bądź na bieżąco z ulubionymi blogami i autorami - <span>z naszą aplikacją blogową nic Cię nie ominie!</span></p>
            </div>
            <div class="image image3"></div>
          </div>

          <div class="container">
            <div class="image image4"></div>
            <div class="slogan slogan4">
                <p class="text" style="background-color: rgba(0,0,0,0.075);">Nie trać czasu na skomplikowane narzędzia - <span>nasza aplikacja blogowa zapewnia prosty i intuicyjny interfejs dla każdego!</span></p>
            </div>
          </div>

          <div class="container">
            <div class="slogan slogan5">
              <p class="text">Zbuduj swoją społeczność i zdobywaj nowych czytelników - <span>z naszą aplikacją blogową Twoje wpisy docierają do szerszej publiczności!</span></p>
            </div>
            <div class="image image5"></div>
          </div>
            
            <script>
                function isScrolledIntoView(element){
                  var rect = element.getBoundingClientRect();
                  var elemTop = rect.top;
                  var elemBottom = rect.bottom;

                  var isVisible = (elemTop >= 0) && (elemBottom <= window.innerHeight);
                  return isVisible;
                }

                function handleScroll(){
                  var slogans = document.querySelectorAll('.slogan');

                  slogans.forEach(function (slogan){
                    if (isScrolledIntoView(slogan)){
                      slogan.classList.add('animation');

                      var textElement = slogan.querySelector('.text');
                      if (textElement && !textElement.classList.contains('visible')){
                        textElement.classList.add('visible');
                      }
                    }
                  });
                }

                function handleResize(){
                  handleScroll();
                }

                function handleInitialAnimation(){
                  handleScroll(); 

                  window.removeEventListener('scroll', handleInitialAnimation);
                }

                window.addEventListener('scroll', handleScroll);
                window.addEventListener('load', handleInitialAnimation);
                window.addEventListener('resize', handleResize);
          </script>
            
        </section>
        <section>
            <div class="info">
                <h1>Dołącz już teraz!</h1>
                
                <p class="content">Nie czekaj dłużej - dołącz do naszej społeczności blogerów i zacznij dzielić się swoim głosem ze światem! Stwórz własny blog na naszej stronie i rozpocznij niezapomnianą podróż pełną odkryć, inspiracji i nowych możliwości.
                Załóż <a class="registration" href="registration.php">konto</a>, by sprawdzić, dlaczego miliony użytkowników piszą tu o swoich pasjach.</p>

                <?php 
                    if(isset($_SESSION['id_users']))
                    {
                        echo '<a href="add_blog.php" class="create_blog">Stwórz Bloga!</a>';   
                    }
                    else
                    {
                        echo '<a class="create_blog" onclick="openModal(); displayAlert(\'Aby dodać bloga, musisz się zalogować.\')">Stwórz Bloga!</a>';
                    }
                ?>

        </div>
        </section>

    </article>
</main>

<?php
    include_once('include/footer.php');
?>
