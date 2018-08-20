<?php if(Library\Session::get('function') == 'owner'): ?>
<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#addCar">Add new car</button>
<br /><br />
<?php endif; ?>

<div class="modal" id="addCar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <br />
                <form action="<?php echo URL; ?>text/add" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Mark &nbsp;</span>
                        </div>
                        <input type="text" class="form-control" name="mark">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Model</span>
                        </div>
                        <input type="text" class="form-control" name="model">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Color &nbsp;</span>
                        </div>
                        <input type="color" class="form-control"  name="color">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Price &nbsp;&nbsp;</span>
                        </div>
                        <input type="number" class="form-control" name="price">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Year &nbsp; &nbsp;</span>
                        </div>
                        <input type="date" class="form-control" name="year">
                    </div>
                    <button style="float:right;" type="submit" class="btn btn-dark">Add Car</button>
                </form>
                <br />
            </div>
        </div>
    </div>
</div>

<?php if(count($this->items) > 0): ?>

<table class="table table-hover table-striped">
    <thead class="thead-dark">
      <tr>
        <th>Id</th>
        <th>Mark</th>
        <th>Model</th>
        <th>Year</th>
        <th>Price</th>
        <th>Color</th>
        <?php if (Library\Session::get('function') != 'default' && Library\Session::get('connected') == TRUE): ?>
        <th>Actions</th>
        <?php endif; ?>
      </tr>
    </thead>
    <tbody>
        
    <?php 
    
    for($i = 0; $i < count($this->items); $i++){
        if(isset($this->items[$i][1])):
            echo '<tr>';
            echo '    <td>'.$this->items[$i][0].'</td>';
            echo '    <td>'.ucwords($this->items[$i][1]).'</td>';
            echo '    <td>'.ucwords($this->items[$i][2]).'</td>';
            echo '    <td>'.$this->items[$i][3].'</td>';
            echo '    <td>'.$this->items[$i][4].' €</td>';
            echo '    <td><div style="background:'.$this->items[$i][5].';" class="color"></div></td>';
            if(Library\Session::get('function') != 'default' && Library\Session::get('connected') == TRUE){
                echo '    <td>';
                echo '    <a href="' . URL . 'text/read/' . $this->items[$i][0] . '" class="view"><i class="material-icons">&#xE417;</i></a>';
                echo '    <a href="' . URL . 'text/edit/' . $this->items[$i][0] . '" class="edit"><i class="material-icons">&#xE254;</i></a>';
                echo '    <a href="' . URL . 'text/delete/' . $this->items[$i][0] . '" class="delete"><i class="material-icons">&#xE872;</i></a>';
                echo '    </td>';
            }
            echo '</tr>';
        endif;
    }
    
    ?>

    </tbody>
</table>
<ul class="pagination justify-content-center">
    
    <?php if($this->currentPage > 1): ?>
    <li class="page-item">
        <a class="page-link" href="<?php echo URL; ?>text/index/<?php echo $this->currentPage - 1; ?>">Previous</a>
    </li>
    <?php 
        endif;

        for($i = ($this->currentPage - $this->radius); $i <= ($this->currentPage + $this->radius); $i++){
            if($i > 0 && $i <= $this->totalPages){
                if($i == $this->currentPage){
                    echo '<li class="page-item disabled"><a class="page-link" href="#">' . $i . '</a></li>';
                }
                else{
                    echo '<li class="page-item"><a class="page-link" href="' . URL . 'text/index/' . $i . '">' . $i . '</a></li>';
                }
            }
        }

        if($this->currentPage < $this->totalPages): 
    ?>
    <li class="page-item">
        <a class="page-link" href="<?php echo URL; ?>text/index/<?php echo $this->currentPage + 1; ?>">Next</a>
    </li>
    <?php endif; ?>
</ul>
<?php else: ?>
<div class="alert alert-info">
    The file contains no cars.
</div>
<?php endif; ?>