<div class="error">
    <?php if(!isset(session()->get('error')){ ?>

        {{ session()->get('error') }}

    <?php }else{ ?>

        {{ session()->get('errordb') }}
    <? } ?>
</div>
