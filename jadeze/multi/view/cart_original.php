<div id="products" class="col-12">
<?php $header = false; $actions = false; $count = 0; ?>
    <div id="content" class="col-6">    
   
   <table border = 1>
    
    <thead>
        <tr> 
        <?php foreach($Users as $product): ?>
            <?php foreach($product as $key => $value): ?> 
                <?php if($header === false):
                    $count++;
                    if($count > 5):
                        $header = true;
                    endif;?>
                    <th>
                        <?= $key; ?>
                    </th>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php if($actions === false):
                   $count++;
                   if($count > 0):
                    $actions = true;
                   endif; ?>
                   <th>Actions</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $product['firstname']; ?></td>
            <td><?php echo $product['lastname']; ?></td>
            <td><?php echo $product['password']; ?></td>
            <td><?php echo $product['email']; ?></td>

            <td class='action'>
            <a href='index.php?op=read&product_id=<?php echo $product['product_id']; ?>' class='tableButton' value='read'>Read</a> 
            <a href='index.php?op=update' class='tableButton' value='update'>Update</a> 
            <a href='index.php?op=delete&product_id=<?php echo $product['product_id']; ?>' class='tableButton' value='delete'>Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>

</div>