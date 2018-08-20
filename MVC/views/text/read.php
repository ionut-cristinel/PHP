
<div class="btn-group" style="float: right;">
  <a href="<?php echo URL; ?>text/index/1" role="button" class="btn btn-primary">Back</a>
  <a href="<?php echo URL; ?>text/edit/<?php echo $this->car[0]; ?>" role="button" class="btn btn-primary">Edit</a>
  <a href="<?php echo URL; ?>text/delete/<?php echo $this->car[0]; ?>" role="button" class="btn btn-primary">Delete</a>
</div>
<br /><br />
<table class="table">
    <tbody>
        <tr>
            <td style="width: 5%;"></td>
            <th style="width: 15%;">Id</th>
            <td><?php echo $this->car[0]; ?></td>
        </tr>
        <tr>
            <td></td>
            <th>Mark</th>
            <td><?php echo $this->car[1]; ?></td>
        </tr>
        <tr>
            <td></td>
            <th>Model</th>
            <td><?php echo $this->car[2]; ?></td>
        </tr>
        <tr>
            <td></td>
            <th>Year</th>
            <td><?php echo $this->car[3]; ?></td>
        </tr>
        <tr>
            <td></td>
            <th>Price</th>
            <td><?php echo $this->car[4]; ?></td>
        </tr>
        <tr>
            <td></td>
            <th>Color</th>
            <td><div style="background:<?php echo $this->car[5]; ?>;" class="color"></div></td>
        </tr>
    </tbody>
</table>
