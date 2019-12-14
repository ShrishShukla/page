
<?php
include('config.php');
if(isset($_POST['username'])){
    $user=$_POST['username'];
    $passw=$_POST['password']; 
    echo "hello";
    $sql="SELECT * FROM `userdata` where user='".$user."' AND passw='".$passw."'  limit 1";
    $result=mysql_query($sql);
    if(mysql_num_rows($result)==1){ //$result
        echo "sucess logging in";
        exit();
    }
    else{
        echo "failed";
    }
}
//first section above is intended for user login check name in form class div
?>

<?php //although this is using name of sports but it is for the tap condition
$status = '';
if (!empty($_POST['taps'])){
if (is_array($_POST['taps'])) {
$status = "<strong>You selected the below Tap:</strong><br />";
foreach($_POST['taps'] as $id){
$query = link_query
    (
    $mysqli,
    "SELECT * FROM taps WHERE `id`='$id'"
    );
$row = mysqli_fetch_assoc($query);
$status .= $row['location'] . "<br />";//refers to the tap name
   } 
  } 
} 
?>
<html>
    <head>
        <title>
            Water Management
        </title>
    </head>
    <style type="text/css">
        .b1 {
            width:250px;
            margin-top:20px; 
            height: 72px;
            text-align: center; 
            font-weight:bolder;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            border: 0px solid red;
            color: white;
            background:rgba(10, 185, 185, 0.774);
        }
        .b1:hover {
            color:rgb(138, 0, 0);
            background:rgb(43, 253, 253);
        }
        label {
            color: maroon;
        }
        .i1 {
            width: 300px;
            height: 60px;
            border: 0px solid blue;
            font-size: 18px;
        }
        .i1:hover {
            background:whitesmoke;
            border: 0px solid blue;
        }
        .i1:focus {
            color:gold;
        }
        .b2 {
            width:95%; 
            font-size: 18px; 
            border: 0px solid blue; 
            height: 40px; 
            color: floralwhite; 
            background: indigo;
            margin-bottom: 5px;
        }
        .b2:hover {
            opacity: 0.8;
        }
    </style>
    <body>
        <h1 style="text-align: center; color:darkblue;">Water Management</h1><hr>
        <table style="position: absolute; left:5px; height: 200px; width:100px; border: 1 px solid blue;">
            <tr>
                <th>
                    <button class="b1">Home</button>
                </th>
            </tr>
            <tr>
                <th>
                    <button class="b1" id="r2" onclick="document.getElementById('g2').style.display = 'block';">Login</button>
                </th>
            </tr>
            <tr>
                <th>
                    <button class="b1">Graph</button>
                </th>
            </tr>
            <tr>
                <th>
                    <button class="b1">Rain Pattern</button>
                </th>
            </tr>
            <tr>
                <th>
                    <button class="b1">Tap Condition</button>   
                    <form name="form" method="post" action="">
                    <label><strong>Select Tap location:</strong></label><br />
                    <table border="0" width="60%">
                    <tr>
                    <?php
                    $count = 0; //the locations would be fetched dynamically with flow used 
                    $query = mysqli_query($link,"SELECT * FROM taps");
                    foreach($query as $row){
                    $count++;
                    ?>
                     <td width="3%">
                    <input type="checkbox" name="taps[]" 
value="<?php echo $row["id"]; ?>">
</td>
<td width="30%">
<?php echo $row["location"]; ?>
</td>
<?php
if($count == 3) { // three items in a row
        echo '</tr><tr>';
        $count = 0;
    }
} ?></tr>
</table>
<input type="submit" name="submit" value="Submit">
</form>

                </th>
            </tr>
            <tr>
                <th>
                    <button class="b1">Advisory</button>
                </th>
            </tr>
        </table>
        <form method="GET" id="g2" style="display: none;">
            <table style="position: absolute; margin: 6px; padding: 5px; left: 33%; border: 1px solid darkblue; width:500px; height: 130px; ">
                <tr>
                    <th>
                        <label>User Name</label>
                    </th>
                    <th>
                        <input class="i1" type="text" name="username" minlength="6" maxlength="6"  placeholder="User Name" required/>
                    </th>
                </tr>
                <tr>
                    <th>
                        <label>Password</label>
                    </th>
                    <th>
                        <input class="i1" type="password" name="password" minlength="6"  placeholder="Password" required/>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">
                        <input class="b2" type="submit" value="Login"/>
                    </th>
                </tr>
            </table>
        </form>
        

    </body>
</html>