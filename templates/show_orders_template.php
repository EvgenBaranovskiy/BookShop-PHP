<?php
$title = $user->IsAdmin ? "Orders" : "Orders created by {$user->Login}";
ob_start();

//Розрахунок фрейму для пагініції
$pagination_frame_size = 3;
$current_frame = ceil($page_number / $pagination_frame_size);
$frame_start = $page_number - 1 > 0 ? $page_number - 1 : 1;
$frame_end = ($frame_start + $pagination_frame_size) > $total_page_count ? $total_page_count : $frame_start + $pagination_frame_size;


?>
<div class="container">
    <div class="row mt-5">
        <table class="table text-center align-middle">
            <thead class="table-dark align-middle">
                <tr>
                    <th>ORDER ID</th>
                    <?= $user->IsAdmin ? "<th>USER</th>" : "" ?>
                    <th>NAME</th>
                    <th>PHONE</th>
                    <th>BOOK</th>
                    <th>CREATED DATE</th>
                    <th>CURRENT STATUS</th>
                    <?= $user->IsAdmin ? "<th>Apply</th>" : "" ?>
                    <?= $user->IsAdmin ? "<th>Delete</th>" : "" ?>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                <?php foreach ($orders_on_page as $order) : ?>
                    <tr>
                        <td><?= $order->ID ?></td>
                        <?= $user->IsAdmin ? "<td>{$order->User->Login}</td>" : "" ?>
                        <td><?= $order->BuyerName ?></td>
                        <td><?= $order->BuyerPhone ?></td>
                        <td><?= "<a href='/book/show/{$order->Book->ID}'>{$order->Book->Name} ({$order->Book->Price}$)</a>" ?></td>
                        <td><?= $order->CreatedDate->format('Y-m-d H:i:s') ?></td>
                        <?= $user->IsAdmin ? "" : "<td>{$order->Status->Name}</td>"  ?>
                        <?php if ($user->IsAdmin) : ?>
                            <!--APPLY-BTN-->
                            <form action="/order/apply/<?= $order->ID ?>" method="POST">
                                <td>
                                    <select class="form-select" name="new-order-status">
                                        <?php foreach ($order_statuses as $status) : ?>
                                            <?= "<option value='{$status->ID}' " . ($status->ID == $order->Status->ID ? 'selected' : '') . ">{$status->Name}</option>" ?>
                                        <? endforeach; ?>
                                    </select>
                                </td>
                                <td><button class="btn btn-warning">Apply</button></td>
                            </form>
                            <!--DELETE-BTN-->
                            <td>
                                <a class="btn btn-danger" href="/order/delete/<?= $order->ID ?>">Delete</a>
                            </td>
                        <?php endif ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!--Pagination-->
<div class="d-flex justify-content-center mt-3">
    <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item <?= $page_number == 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="<?= "/order/show/" . ($page_number - 1) ?>">Previous</a>
            </li>

            <?php
            for ($i = $frame_start; $i <= $frame_end; $i++) {
            ?>
                <li class="page-item">
                    <a class="page-link <?= $page_number == $i ? 'active' : '' ?>" href="<?= "/order/show/" . $i ?>"><?= $i ?></a>
                </li>
            <?php } ?>
            <li class="page-item">
                <a class="page-link <?= $page_number == $total_page_count ? 'disabled' : '' ?>" href="<?= "/order/show/" . ($page_number + 1) ?>">Next</a>
            </li>
        </ul>
    </nav>
</div>

<?php
$content = ob_get_clean();
require "base_template.php";
?>