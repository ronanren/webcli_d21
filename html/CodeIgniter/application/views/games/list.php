<table>
  <thead align="left" style="display: table-header-group">
  <tr>
     <th>col 1 </th>
     <th>col 2 </th>
     <th>col 3 </th>
     <th>col 4 </th>
     <th>col 5 </th>
     <th>col 6 </th>
  </tr>
  </thead>
<tbody>
<?php 
$total = 0;
foreach ($games as $game) :?>
    
  <tr class="item_row">
        <td><?php echo ++$total; ?></td>
        <td> <?php echo $game['guid']; ?></td>
        <td> <?php echo $game['titre']; ?></td>
        <td> <?php echo $game['sortie']; ?></td>
        <td> <?php echo $game['description']; ?></td>
        <td> <img width="100px" src="<?php echo $game['couverture']; ?>"/></td>
  </tr>
</tbody>
</table>
<?php endforeach;?>