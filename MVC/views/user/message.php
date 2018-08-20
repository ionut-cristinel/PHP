

<?php if($this->message !== NULL): ?>
<div class="alert alert-<?php echo $this->messageType; ?>">
        <?php echo $this->message; ?>
</div>
<?php endif; ?>