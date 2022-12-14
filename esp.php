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

    <h1>
        Smart auto
    </h1>
    <h4>
    Toto inteligentné auto má 3 senzory, ako sú fotorezistor, senzor rýchlosti, ultrazvuk a tiež 3 akčné členy, ako sú ledky, servo a motory.<br> 
    Na tejto stránke si môžete pozrieť, ako rýchlo sa toto auto pohybuje, a zistiť, ako určuje, kam môžete odbočiť, ak je cesta pred vami zablokovaná.<br>
    </h4>
     
    <form method="post">
        <input type="submit" name="speed"
                value="speed"/>
    </form>

    <?php
     
        if(isset($_POST['speed'])) {
            echo "Teraz môžeme vidieť rýchlosť, akou sa pohybuje naše auto:<br>";
         // Выводим информацию из файла
            try {
                echo loadDataFromFile($file);    
            } catch (Exception $e) {
                echo $e->getMessage();
            }    
        }
    ?>

    <form method="post">     
        <input type="submit" name="move to"
                value="move to"/>
    </form>

    <?php
        if(isset($_POST['move to'])) {
            echo "Teraz vidíme, kam môže naše auto zabočiť:<br>";
            try {
                echo loadDataFromFile($file);    
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
        }
    ?>

</body>
</html>