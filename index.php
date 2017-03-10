<?php
/*Database Connection*/
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'menu';
Global $dbconfig;
$dbconfig = mysqli_connect($host,$username,$password,$database) or die("An Error occured while connecting to the database");
?>

<?php 
$result=mysqli_query($dbconfig,"SELECT * FROM menu_items");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <script
  src="http://code.jquery.com/ui/1.12.0/jquery-ui.js"
  integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
  crossorigin="anonymous"></script>
  <script src="jquery.mjs.nestedSortable.js"></script>
</head>
<body>
  <ol class="sortable" style="display: inline-block;">
    <?php 
      $parents = getParents();
        while($res= mysqli_fetch_array($parents)){
        if ($res['parent_id']==0) {//for parent menu
            if (countChildren($res['id'])<1) {// if has no children
              echo "<li class='level-1' order='".$res['menu_order']."' id='".$res['id']."'><div>".$res['menu_name']."</div></li>";
            }
            else{//level 2
              $children_1= getChildren($res['id']);
              echo "<li class='level-1' order='".$res['menu_order']."' id='".$res['id']."'><div>".$res['menu_name']."</div><ol>";
            while ($res_1 = mysqli_fetch_assoc($children_1)) {
                if (countChildren($res['id'])<1) {// if has no children
                  echo "<li class='level-2' order='".$res_1['menu_order']."' id='".$res_1['id']."'><div>".$res['menu_name']."</div></li>";
                }
                else{//level 3
                  $children_2= getChildren($res_1['id']);
                  echo "<li class='level-2' order='".$res_1['menu_order']."' id='".$res_1['id']."'><div>".$res_1['menu_name']."</div><ol>";
                  while ($res_2 = mysqli_fetch_assoc($children_2)) {
                      echo "<li class='level-3' order='".$res_2['menu_order']."' id='".$res_2['id']."'><div>".$res_2['menu_name']."</div></li>";           
                  }
                  echo "</ol></li>";
                }           
              }

             echo "</ol></li>";
          }
        }
      }

      function countChildren($parent_id){
        global $dbconfig;
        $result= mysqli_query($dbconfig,"SELECT * FROM menu_items WHERE parent_id= $parent_id");
        return mysqli_num_rows($result);
      }

      function getParents(){
        global $dbconfig;
        $result= mysqli_query($dbconfig,"SELECT * FROM menu_items WHERE parent_id= 0");
        return $result;
      }

      function getChildren($parent_id){
        global $dbconfig;
        $result= mysqli_query($dbconfig,"SELECT * FROM menu_items WHERE parent_id= $parent_id");
        return $result;
      }
     ?>
  </ol>
  <hr>
  <input type="submit" value="Save Changes" name="btnSave" onclick="saveMenu();">
<!-- <hr>
<ol class="sortable" style="display: inline-block;">
    <li><div>Heading 1</div></li>
    <li>
        <div>Heading 2</div>
        <ol>
            <li><div>Sub Menu 1</div></li>
            <li><div>Sub Menu 2</div></li>
            <li><div>Sub Menu 3</div></li>
            <li><div>Sub Menu 4</div></li>
            <li><div>Sub Menu 5</div></li>
            <li><div>Sub Menu 6</div></li>
        </ol>
    </li>
    <li><div>Heading 3</div></li>
    <li><div>Heading 4</div></li>
    <li><div>Heading 5</div></li>
</ol> -->
  <script>
    function saveMenu(){
      console.log("Save changes button clicked");
    }
  </script>
	<script>
	 $(document).ready(function(){

	        $('.sortable').nestedSortable({
	            handle: 'div',
	            items: 'li',
	            toleranceElement: '> div'
	        });

	    });
    </script>

    <script>

    $(".level-1 li").click(function() {
        var id=  $(this).attr('id');
      });

    $(".level-1 li").click(function() {
        var id=  $(this).attr('id');
      });

    $(".level-1 li").click(function() {
        var id=  $(this).attr('id');
      });

    console.log(id);
    //if leve-2 item is clicked
      // $(".level-1 li").click(function() {
      //   var id=  $(this).attr('id');
      //   console.log(id);
      // });
    
    

    //if leve-3 item is clicked
     // $(".level-3 li").click(function() {
     //    var id=  $(this).attr('id');
     //    console.log(id);
     //  });
    </script>
</body>
</html>

<style>
ol {
  list-style: none;
  padding: 0;
}

li {
  background: #eee;
  margin: 1px;
  padding: 5px 30px;
}
</style>

<h1
