<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <!--заполните этот список из массива категорий-->
            <?php foreach ($categories as $category): ?>
                <li class="promo__item promo__item--boards">
                    <a class="promo__link" href="pages/all-lots.html"><?= htmlspecialchars($category) ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
            <!--заполните этот список из массива с товарами-->
            <?php foreach ($all_advt as $advt): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src=<?= $advt['img'] ?> width="350" height="260" alt="Изображение_товара">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?= htmlspecialchars($advt['category']) ?></span>
                    <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?= $advt['title'] ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?= edit_lot_cost($advt['price']); /* Функция */?></span>
                        </div>
                        <div class="lot__timer timer <?= timer_ending($advt['expiration']) ?>">
                            <?= expiration_time($advt['expiration']) ?>
                        </div>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
            <!--Список заполнен товарами из массива-->
        </ul>
    </section>
</main>
