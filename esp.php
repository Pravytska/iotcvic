<!DOCTYPE html>
<html lang="sk">
<head>
    <style>
        body {
            background-image: url("https://images.freeimages.com/images/large-previews/a3b/website-rays-background-pattern-1637863.png");
            font-family: 'Raleway', sans-serif;
        }
        .label {
            display: inline-block;
            width: 100px;
            font-size: 16px;
        }

        .error {
            color: #FF0000;
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
         
        // Выводим информацию из файла
        try {
          echo loadDataFromFile($file);    
        } catch (Exception $e) {
          echo $e->getMessage();
        }
    ?>
    <h1>Smart auto</h1>




</body>
</html>