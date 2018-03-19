<?php
    require("bootstrap.php");
    if( !isset($_REQUEST['name']) || strlen($_REQUEST['name']) <1){
        die("<p style='color:red; margin-left:10px;'>Name parameter missing</p>");
    }
    if(isset($_POST['logout'])){
        header("Location: index.php");
        return;
    }
    $names = array('Rock', 'Paper', 'Scissors');
    $human = isset($_POST['human']) ? $_POST['human']+0 : -1;
    $computer = rand(0,2);

    function check($computer, $human){
        if ( $human == $computer ) {
            return "Tie";
        }
        else if ( ($human == 0 && $computer ==2)  || ($human == 1 && $computer ==0) || ($human == 2 && $computer ==1)) {
            return "You Win";
        }
        else if( ($human == 0 && $computer ==1)  || ($human == 1 && $computer ==2) || ($human == 2 && $computer ==0)) {
            return "You Lose";
        }
        else {
            return false;
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sourabh Agrawal rps</title>
        <style media="screen">
            table{
                width: auto;

            }
            td{
                border-bottom: 1px solid #ddd;
                text-align:left;
                padding: 15px;
            }

            tr:nth-child(odd) {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Rock Paper Scissors</h1>
            <?php
                if(isset($_REQUEST['name'])){
                    echo "<p>Welcome: ".htmlentities($_REQUEST['name'])."</p>";
                }
            ?>
            <form class="" method="post">
                <select class="" name="human">
                    <option value="-1">--Select--</option>
                    <option value="0">Rock</option>
                    <option value="1">Paper</option>
                    <option value="2">Scissors</option>
                    <option value="3">Test</option>
                </select>
                <input type="submit" name="submit" value="Play">
                <input type="submit" name="logout" value="logout">
            </form>
<!-- <pre>
<?php
if ( $human == -1 ) {
    print "Please select a strategy and press Play.\n";
} else if ( $human == 3 ) {
    for($c=0;$c<3;$c++) {
        for($h=0;$h<3;$h++) {
            $r = check($c, $h);
            print "Human=$names[$h] Computer=$names[$c] Result=$r\n";
        }
    }
} else {
    $result = check($computer, $human);
    print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
}
?>
</pre> -->

            <table>
                <?php
                if ( $human == -1 ) {
                    echo "<tr><td>";
                    echo "Please select a strategy and press Play.</td></tr>";
                } else if ( $human == 3 ) {

                    for($c=0; $c<3; $c++) {

                        for($h=0; $h<3; $h++) {

                            $r = check($c, $h);
                            echo "<tr><td>";
                            echo "Human = \"$names[$h]\" Computer = \"$names[$c]\" Result = \"$r\"</td></tr>";
                        }
                    }
                } else {
                    $result = check($computer, $human);
                    echo "<tr><td>";
                    echo "Your Play = \"$names[$human]\" Computer Play = \"$names[$computer]\" Result = \"$result\"</td></tr>";
                }
                ?>
            </table>
        </div>
    </body>
</html>
