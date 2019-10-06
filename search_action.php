<?php
session_start();

//$username=$_SESSION['pusername'];
	$keyword=$_REQUEST['key'];
	require('connection.php');
	$result=mysql_query("select * from tb_pocket_item where item_name LIKE '%$keyword%'");
	if(mysql_num_rows($result) > 0){
		
	

?>
<html>
<body>
<table id="user_table2" border="2"  >
			<tr>
            <td align="center" colspan="8"><b>ITEM LIST</b></td>
            </tr>

        	<tr style="background-color:#8DC2C0">
            	<th>ITEM ID</th>
                <th>NAME</th>
                <th>CATEGORY</th>
                <th>ADDED DATE</th>
                <th>PRICE</th>
                <th>IMAGE</th>
                <th colspan="2">OPERATIONS</th>
                
            </tr>
            <?php while($rows=mysql_fetch_array($result)){
			 ?>
             
           <tr>
           <td><?php $current_id=$rows['pocket_id'];
		   echo $current_id; ?></td>
           	<td><?php echo $rows['item_name']; ?></td>
           	<td><?php echo $rows['category']; ?></td>
             <td><?php echo $rows['add_date']; ?></td>
              <td><?php echo $rows['price']; ?></td>
            <td><img src="<?php echo $rows['file_name']; ?>" width="100px" alt="No image !!"></td>
            <td><a href="edit_item.php?id=<?php echo $current_id; ?>">edit</a></td>
     	  	<td><a href="delete_item.php?id=<?php echo $current_id; ?>">delete</a></td>
           </tr>
          
  			<?php 
			}
			} 
			else{
				echo "No items !!!";	
			}?>
          
       
</table>
</body>
</html>