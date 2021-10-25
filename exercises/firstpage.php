<html>

<head>
  <title>first php page</title>    
</head>
    <body>
     <p>This is my php page</p>
        <?php
        //this is a one line comment
        /*this is a multi-line comment*/
          echo "Hello world!";
          echo 'Hello world!';
          print "Hello world!";
          print 'Hello world!';
        echo "<br/>";
        $text = "Hello world!";
        $x = 5;
        $y = 10;
        $z = $x+$y;
        echo $text;
        echo "<br/>";
        echo $x;
        echo "<br/>";
        echo $y;
        echo "<br/>";
        echo $z;
        echo "<br/>";
        $txt = "i love school";
        echo "Today is tuesday";
        echo "<br/>";
        echo "Today is Tuesday" .$txt. "and i pass all my units.";
        echo "<br/>";
        $RegNo = "N61/30123/2014";
        $f_Name = "mary";
        $l_Name = "onyango";
        echo $studentdatails = $RegNo .' '. $f_Name .','. $l_Name;
        $x=20;
        var_dump($x);
        echo"<br/>";
        echo $x;
        $y=10.5;
        var_dump($y);
        echo "<br/>";
        echo $y;
        echo "<br/>";
        $item=55;
        $item_price=20;
        $tax_rate=0.16;
        $gross_total=$item*$item_price;
        $net_total=($gross_total*$tax_rate)+$gross_total;
        echo 'Dear customer thankyou for purchasing' .$item. 'pens at a cost of' .$item_price. 'each. The total inclusive of tax comes to' .$net_total. '.';  
        
        echo "<br/>";
        $x=1;
        while ($x<=5){
            echo $x; 
            $x++;
        }
       echo  "<br/>";
        $x=1;
        do{
            echo $x;
            $x++;
        } while ($x<=5);
        ?>
        
        
    </body>
</html>