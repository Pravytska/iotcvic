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
        
    <h1>Smart auto</h1>
    <h4>
        How to call PHP function
        on the click of a Button ?
    </h4>
 
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
     
    <form method="post">
        <input type="submit" name="button1"
                value="Button1"/>
         
        <input type="submit" name="button2"
                value="Button2"/>
    </form>

    




</body>
</html>