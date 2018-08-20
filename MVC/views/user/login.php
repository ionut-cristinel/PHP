<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <?php if($this->message !== NULL): ?>
            <div class="alert alert-danger">
                <?php echo $this->message; ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo URL; ?>user/logged" method="post">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="password">
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Login</button>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>
