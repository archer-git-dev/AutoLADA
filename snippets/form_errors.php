<?php if (isset($_SESSION['errors'])) :  ?>
    <ul class="alerts">
        <?php foreach ($_SESSION['errors'] as $error) : ?>
            <li class="alert alert__danger">
                <?= $error; ?>
            </li>
        <?php endforeach; ?>

        <?php unset($_SESSION['errors']) ?>
    </ul>
<?php endif; ?>