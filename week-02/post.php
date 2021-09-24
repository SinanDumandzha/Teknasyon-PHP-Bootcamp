<?php

/**
 * post.php
 *
 * Bu betik direk olarak erişilebilir. functions.php'de yaptığınız gibi bir
 * kontrol eklemenize gerek yok.
 *
 * > Dikkat: Bu dosya hem direk çalıştırılabilir hem de `posts.php` dosyasında
 * > 1+ kez içe aktarılmış olabilir.
 *
 * Bu betik dosyası içerisinde functions.php'de yer alan fonksiyonları da kullanarak
 * aşağıdaki işlemleri gerçekleştirmenizi bekliyoruz.
 *
 * - $id değişkeni yoksa "1" değeri ile tanımlanmalı, daha önceden bu değişken
 * tanımlanmışsa değeri değiştirilmemeli. (Kontrol etmek için `isset`
 * (https://www.php.net/manual/en/function.isset.php) kullanılabilir.)
 * - $id için yapılan işlemin aynısı $title ve $type için de yapılmalı. (İstediğiniz
 * değerleri verebilirsiniz)
 * - Bir sonraki adımda ilgili içerik gösterilmeden önce bir div oluşturulmalı ve
 * bu div $type değerine göre arkaplan rengi almalıdır. (urgent=kırmızı,
 * warning=sarı, normal=arkaplan yok)
 * - `getPostDetails` fonksiyonu tetiklenerek ilgili içeriğin çıktısı gösterilmeli.
 */

require_once("./functions.php");
!isset($id) ? $id = 1 : $id = $id; // Check for post id and if not exist an id, set id as 1
!isset($title) ? $title = "Güzel Bir Başlık" : $title = $post["title"]; // Check for post title and if not exist a title, set title as "Güzel Bir Başlık"
!isset($type) ? $type = "normal" : $type = $post["type"]; // Check for post type and if not exist a type, set type as "normal"

$type == "urgent" ? $color = "red" : ($type == "warning" ? $color = "yellow" : $color = "none"); // Check for post' type to set background color

echo "<div style='background-color: {$color} '>"; // Open div with style='background-color: $color
echo getPostDetails($id, $title) . "</div>"; // Close div with post' id & title
