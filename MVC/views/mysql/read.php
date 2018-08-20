
<div class="btn-group" style="float: right;">
  <a href="<?php echo URL; ?>mysql/index/1" role="button" class="btn btn-primary">Back</a>
  <a href="<?php echo URL; ?>mysql/edit/<?php echo $this->car[0]['id']; ?>" role="button" class="btn btn-primary">Edit</a>
  <a href="<?php echo URL; ?>mysql/delete/<?php echo $this->car[0]['id']; ?>" role="button" class="btn btn-primary">Delete</a>
</div>
<br /><br />
<table class="table">
    <tbody>
        <tr>
            <td style="width: 5%;"></td>
            <th style="width: 15%;">Id</th>
            <td><?php echo $this->car[0]['id']; ?></td>
        </tr>
        <tr>
            <td></td>
            <th>Mark</th>
            <td><?php echo $this->car[0]['mark']; ?></td>
        </tr>
        <tr>
            <td></td>
            <th>Model</th>
            <td><?php echo $this->car[0]['model']; ?></td>
        </tr>
        <tr>
            <td></td>
            <th>Year</th>
            <td><?php echo $this->car[0]['year']; ?></td>
        </tr>
        <tr>
            <td></td>
            <th>Price</th>
            <td><?php echo $this->car[0]['price']; ?></td>
        </tr>
        <tr>
            <td></td>
            <th>Color</th>
            <td><div style="background:<?php echo $this->car[0]['color']; ?>;" class="color"></div></td>
        </tr>
    </tbody>
</table>
