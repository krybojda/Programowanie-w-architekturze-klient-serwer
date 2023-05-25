<!DOCTYPE html>
<html>
  <head>
    <title>Strona Główna</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <header>
      <h1>Nasz Lekarz</h1>
    </header>
    <nav>
      <ul>
        <li><a href="#">Strona główna</a></li>
        <li><a href="rezerwacje.php">Rezerwacja wizyty</a></li>
        <li><a href="NasiLekarze.php">Nasi Lekarze</a></li>
        <li><a href="opinie.php">Opinie</a></li>
        <li><a href="kontakt.php">Kontakt</a></li>
        <li><a href='user.php'>Użytkownik</a></li>
        <li><a href="wyloguj.php">Wyloguj</a></li>
      </ul>
    </nav>
    <?php
	include 'connect.php';
    session_start();
      if(isSet($_SESSION["login"])){
        $user = $_SESSION["login"];
      }
      else{
        echo '<script type="text/javascript">
              window.location = "login.html";
              </script>';
      }
    if(isSet($_SESSION["login"])){
      $query = mysqli_query($con,"SELECT * FROM user WHERE login=\"$user\"");
      if (mysqli_num_rows($query) > 0) {
          while($row = mysqli_fetch_assoc($query)) {
            if($row["typ"]==1){
              echo "<a href='admin.php'>Admin</a>";
              $_SESSION["typkonta"] = "1";
            }
          }
        }

    }
    ?>
    <main>
      <h1 id="duzy">Strona główna</h1>
<p>
  Witaj na stronie Nasz Lekarz! Jesteśmy dumnymi dostawcami wysokiej jakości usług medycznych, które są dostępne dla Ciebie i Twojej rodziny. Naszym celem jest zapewnienie kompleksowej opieki zdrowotnej, która jest oparta na najlepszych praktykach medycznych i nowoczesnej technologii. Dzięki Naszemu Lekarzowi, możesz czuć się pewnie wiedząc, że jesteś w troskliwych rękach doświadczonych specjalistów.

Nasz zespół składa się z lekarzy specjalistów o szerokim zakresie kompetencji. Niezależnie od Twoich potrzeb medycznych, znajdziesz u nas ekspertów w dziedzinach takich jak pediatria, medycyna rodzinna, chirurgia, ginekologia, dermatologia, kardiologia i wiele innych. Każdy lekarz w naszym centrum medycznym ma bogate doświadczenie i jest zaangażowany w zapewnienie indywidualnego podejścia do pacjenta, aby skutecznie diagnozować i leczyć wszelkie schorzenia.

Na naszej stronie znajdziesz wiele przydatnych informacji. Możesz zapoznać się z profilami naszych lekarzy, dowiedzieć się więcej o naszych usługach i zaplanować wizytę w dogodnym dla Ciebie terminie. Oferujemy również teleporady online, które umożliwiają skonsultowanie się z lekarzem bez konieczności wychodzenia z domu. Nasz Lekarz jest skoncentrowany na zapewnieniu wygodnej i dostępnej opieki medycznej dla naszych pacjentów.
      </p>
      <div style="text-align: center;">
      <img src="klinika.jpg" />
      </div>
      <p>
        Dbamy również o to, aby nasze centrum medyczne było przyjazne i komfortowe. Nasza nowoczesna infrastruktura i sprzęt medyczny są zgodne z najwyższymi standardami. Chcemy, abyś czuł się spokojnie i pewnie podczas wizyty u nas, dlatego stawiamy na komfort pacjenta i bezpieczne środowisko.

Nasz Lekarz to więcej niż tylko centrum medyczne - to miejsce, w którym możesz liczyć na pełne wsparcie w utrzymaniu zdrowia i dobrej kondycji. Z nami będziesz mieć dostęp do kompleksowej opieki, diagnostyki, leczenia i porad medycznych.

Zapraszamy do odwiedzenia naszej strony i skorzystania z usług Naszego Lekarza. Jesteśmy gotowi służyć Ci najlepszą opieką medyczną i pomóc Ci w osiągnięciu pełni zdrowia i dobrej jakości życia.
      </p>
    </main>
  </body>
</html>
