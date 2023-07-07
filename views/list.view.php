<!DOCTYPE html>
<html lang="en">
<head>
    <title>cal</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<h1>Your Answers</h1>
Hello, <?php echo $_SESSION['login']['email']; ?>
<a href="/logout" class="text-red-500">Logout</a>
<table border="0px">
    <tr>
        <th>first_operator</th>
        <th>operator</th>
        <th>second_operator</th>
        <th>result</th>
        <th>action</th>
    </tr>
    <?php foreach($calc as $calculation):?>
        <form action="/delete" method="post" class="html-form">
            <tr>

                <td><?php echo $calculation->first_operator ?></td>
                <td><?php echo $calculation->operator?></td>
                <td><?php echo $calculation->second_operator?></td>
                <td><?php echo $calculation->result?></td>
                <td><button name="del" type="submit" value="<?=$calculation->id;?>">delete</button></td>
        </form>
        <form action="/edit" method="post" class="html-form">
            <td><button name="edit" type="submit" value="<?=$calculation->id;?>">Edit</button></td>
        </form>
    <?php endforeach;?>
    </tr>
</table>
<button class="btn"><a href="/">Back</a></button>
<?php //foreach($query as $quer):?>
<!--    <h1>--><?php //print_r($quer->operator);?><!--</h1>-->
<?php //endforeach;?>
</body>
</html>
