<?php if (isset($_SESSION['message'])) { ?>
    <div class="clear"></div>
<div class="notices">

    <?php if (isset($_SESSION['message']['ok'])) { ?>

        <div id="message" class="notice notice-success is-dismissible">
            <p><?php echo $_SESSION['message']['ok']; ?></p>

            <button type="button" class="notice-dismiss">
                <span class="screen-reader-text">Dismiss this notice.</span>
            </button>
        </div>

    <?php } ?>

    <?php if (isset($_SESSION['message']['error'])) { ?>

        <div id="message" class="notice notice-error is-dismissible">
            <p><?php echo $_SESSION['message']['error']; ?></p>

            <button type="button" class="notice-dismiss">
                <span class="screen-reader-text">Dismiss this notice.</span>
            </button>
        </div>

    <?php } ?>

</div>
    <div class="clear"></div>
<?php unset($_SESSION['message']); } ?>