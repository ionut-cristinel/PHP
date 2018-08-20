<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <?php if($this->message !== NULL): ?>
            <div class="alert alert-danger">
                <?php echo $this->message; ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo URL; ?>user/save" method="post">
            <div class="form-group">
                <label for="email">Name:</label>
                <input type="text" class="form-control" id="email" name="name">
            </div>
            <div class="form-group">
                <label for="sel1">Gender:</label>
                <select class="form-control" id="sel1" name="gender">
                    <option value="none">None</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="password">
            </div>
            <div class="form-group">
                <label for="sel1">Function:</label>
                <select class="form-control" id="sel1" name="function">
                    <option value="default">Default</option>
                    <option value="admin">Admin</option>
                    <option value="owner">Owner</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Create Account</button>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>
