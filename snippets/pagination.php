
<div class="pagination-row">
    <?php if ($total_pages != 1) : ?>
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <a href="?page=<?=$i?>" class="pagination-a"><?=$i?></a>
        <?endfor;?>
    <?endif;?>
</div>
