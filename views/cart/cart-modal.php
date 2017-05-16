<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php if (!empty($session['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Количество</th>
                    <th>Цена</th>
                    <th><span class="glyphicon glyphicon-remove"></span></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($session['cart'] as $id => $item): ?>
                    <tr>
                        <td><a href="<?= Url::to(['product/view', 'id' => $id]) ?>"><?= Html::img($item['img'], ['alt' => $item['name'], 'height' => '50']) ?></a></td>
                        <td><a href="<?= Url::to(['product/view', 'id' => $id]) ?>"><?= $item['name'] ?></a></td>
                        <td><?= $item['qty'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item"></span></td>
                    </tr>
                <?php endforeach; ?>
                    <tr>
                        <td colspan="4">Общее количество товаров: </td>
                        <td><?= $session['cart.qty'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">На сумму: </td>
                        <td><?= $session['cart.sum'] ?></td>
                    </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
<h3 class="container">Корзина пуста</h3>
<?php endif; ?>