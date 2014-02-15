<div>
    <img alt="Under Construction" src="/img/cow.jpg"/>
</div>

<table>
    <?php

        foreach ($positions as $position)
        {
            print("<tr>");
            print("<td>{$position["symbol"]}</td>");
            print("<td>{$position["shares"]}</td>");
            print("<td>{$position["price"]}</td>");
            print("</tr>");
        }

    ?>
</table>

<div>
    <a href="logout.php">Log Out</a>
</div>
