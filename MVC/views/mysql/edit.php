<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-9">
        <form action="<?php echo URL; ?>mysql/save/<?php echo $this->car[0]['id']; ?>" method="post">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Mark &nbsp;</span>
                </div>
                <input type="text" class="form-control" name="mark" value="<?php echo $this->car[0]['mark']; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Model</span>
                </div>
                <input type="text" class="form-control" name="model" value="<?php echo $this->car[0]['model']; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Color &nbsp;</span>
                </div>
                <input type="color" class="form-control"  name="color" value="<?php echo $this->car[0]['color']; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Price &nbsp;&nbsp;</span>
                </div>
                <input type="number" class="form-control" name="price" value="<?php echo $this->car[0]['price']; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Year &nbsp; &nbsp;</span>
                </div>
                <input type="date" class="form-control" name="year" value="<?php echo $this->car[0]['year']; ?>-01-01">
            </div>
            <button type="submit" class="btn btn-dark">Update Car</button>
            &nbsp; &nbsp;
            <a href="<?php echo URL; ?>mysql/index/1" role="button" class="btn btn-outline-dark">Back</a>
        </form>
    </div>
    <div class="col-sm-1"></div>
</div>
<br />