<?php if (isset($_SESSION['msg'])) { ?>
    <div id="sys_msg"><?= $_SESSION['msg']; ?></div>
<?
    unset($_SESSION['msg']);
}
?>
