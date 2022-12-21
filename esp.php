<!DOCTYPE html>
<html lang="sk">
<head>
    <style>
        body {
            background-image: url("https://images.freeimages.com/images/large-previews/a3b/website-rays-background-pattern-1637863.png");
            font-family: 'Raleway', sans-serif;
            text-align:center;
        }
        .label {
            display: inline-block;
            width: 100px;
            font-size: 16px;
        }

        .error {
            color: #FF0000;
        }
        h1 {
            color: green;
        }
        $colors: #F2385A, #F5A503, #E9F1DF, #56D9CD, #3AA1BF;
$max: length($colors);
$dash: 70;
$dash-gap: 10;
$dash-space: $dash * ($max - 1) + $dash-gap * $max;
$time: 6s;
$time-step: $time/$max;

/* Main styles */
@import url(https://fonts.googleapis.com/css?family=Open+Sans:800);

.text {
  fill: none;
  stroke-width: 3;
  stroke-linejoin: round;
  stroke-dasharray: $dash $dash-space;
  stroke-dashoffset: 0;
  -webkit-animation: stroke $time infinite linear;
  animation: stroke $time infinite linear;
  
  @for $item from 1 through $max {
    &:nth-child(#{$max}n + #{$item}) {
      $color: nth($colors, $item);
      stroke: $color;
      -webkit-animation-delay: -($time-step * $item);
      animation-delay: -($time-step * $item);
    }
  }
}

@-webkit-keyframes stroke {
  100% {
    stroke-dashoffset: -($dash + $dash-gap) * $max;
  }
}

@keyframes stroke {
  100% {
    stroke-dashoffset: -($dash + $dash-gap) * $max;
  }
}

/* Other styles */
html, body {
  height: 100%;
}

body {
  background: #111;
  background-size: .2em 100%;
  font: 5em/1 Open Sans, Impact;
  text-transform: uppercase;
  margin: 0;
}

svg {
  position: absolute;
  width: 100%;
  height: 100%;
}
    </style>
</head>
<body>
    <?php
        function loadDataFromFile($file)
        {
          if (!file_exists($file))
              throw new Exception("Ошибка: файл $file не существует!");
          if (!filesize($file))
              throw new Exception("Файл $file пустой!");
          // Открываем поток и получаем его дескриптор
          $f = fopen($file, "r");
          // В переменную $content запишем то, что прочитали из файла
          $content = fread($f, filesize ($file));
          // Заменяем переносы строки в файле на тег BR. Заменить можно что угодно
          //$content = str_replace("\r\n","<br>", $content);
          // Закрываем поток
          fclose ($f);
          // Возвращаем содержимое
          return $content;
        }
         
        // Файл, с которым работаем
        $file = __DIR__.'/file.txt';
        ?>
        
        svg(viewBox="0 0 600 300")
        // Symbol
        symbol#s-text
        text(text-anchor="middle", x="50%", y="50%", dy=".35em")
            | Smart auto 
        // Duplicate symbols
        use.text(xlink:href="#s-text")
        use.text(xlink:href="#s-text")
        use.text(xlink:href="#s-text")
        use.text(xlink:href="#s-text")
        use.text(xlink:href="#s-text")

    <h4>
    Toto inteligentné auto má 3 senzory, ako sú fotorezistor, senzor rýchlosti, ultrazvuk a tiež 3 akčné členy, ako sú ledky, servo a motory.<br> 
    Na tejto stránke si môžete pozrieť, ako rýchlo sa toto auto pohybuje, a zistiť, ako určuje, kam môžete odbočiť, ak je cesta pred vami zablokovaná.<br>
    </h4>
     
    <form method="post">
        <input type="submit" name="button1"
                value="Button1"/>
         
        <input type="submit" name="button2"
                value="Button2"/>
    </form>
    <?php
     
        if(isset($_POST['button1'])) {
            echo "This is Button1 that is selected<br>";
         // Выводим информацию из файла
            try {
                echo loadDataFromFile($file);    
            } catch (Exception $e) {
                echo $e->getMessage();
            }    
        }
     if(isset($_POST['button2'])) {
         echo "This is Button2 that is selected";
     }
    ?>

    




</body>
</html>