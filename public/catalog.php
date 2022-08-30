





<!DOCTYPE html>
<html lang="en">
    <? include_once "$path/private/head.php"; ?>
<body>
    <div class="container">
        <? include_once "$path/private/header.php";?>

        <h3>Cтраница: Каталог книг</h3>
            <p>Здесь планируется размещать: Списки книг по темам, книги находящиеся в библиотеке, статус книги (занята ли она читателем), дата когда читатель взял книгу. <br>
                Данную страницу видят только пользователи которые зашли через логин и пароль.
            </p>

            <div>
                <form action="" method="get" id="searchForm" >
                    <input type="text" id="searchProduct" name="searchProduct">
                </form>
            </div>

            <div>
                <?  // поиск книги по названию
                    // if(isset($_GET["searchProduct"])){
                    //     $query = $db -> query("SELECT * FROM library.books WHERE book_name ='$_GET[searchProduct]' ORDER BY book_name ASC"); 

                    //     if($query -> rowCount() > 0){
                    //         echo "<h3>Совпадение по названию</h3>";
                    //         foreach($query as $row){
                    //             echo "<div> $row[book_name] </div>";
                    //         }
                    //     };
                    // }
                    // вывод всех книг на страницу
                ?>
                    
                    
                <div class="catalog__wrapper">
                    <?
                        $result = $db -> prepare("SELECT * FROM library.books ORDER BY book_name"); // запрос на выборку из таблицы книжек по названию
                        $result -> execute();
                        $array = $result -> fetchAll(PDO::FETCH_ASSOC);
                            foreach($array as $row){                  // получаем все строки в цикле по одной выводим данные
                                echo "
                                    <div class='catalog__item'>
                                            <div class='header__wrapper'>
                                                <div class='item__header'>$row[book_name]</div>
                                                <div class='item__img'>
                                                    <img class='book__img'src=/img/books/$row[book_img]>
                                                </div>
                                            </div>
                                            
                                                <p class='item__descr'>$row[book_descr]</p>
                                            <div class='content__wrapper'>
                                                <p class='item__status'>Книга у читателя:$row[book_status]</p>
                                                    <div class='item__buttons'>
                                                        <button>Взять почитать</button>
                                                    </div>
                                            </div>
                                    </div>
                                ";
                            }
                    ?>   
                </div>
            </div>

        <? include_once "$path/private/script.php"; ?>
    </div>
</body>
</html>
