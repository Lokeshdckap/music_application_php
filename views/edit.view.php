<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<a href="/logout" class="text-red-500">Logout</a>
Hello, <?php echo $_SESSION['login']['email']; ?>
    <h1>Edit Your Details</h1>
    <?php foreach($calc as $calculation):?>
    <form action="/update" method="post" class="html-form">
        <input type="number" name="num3" value="<?=$calculation->first_operator;?>">
        <select name="cal">
            <option name="add" value="+">+</option>
            <option name="sub" value="-">-</option>
            <option name="mul" value="*">*</option>
            <option name="div" value="/">/</option>
        </select>
        <input type="number" name="num4" value="<?=$calculation->second_operator;?>">
        <button type="submit" value="<?=$calculation->id;?>" name="update">Edit</button>
        <button><a href="/list">Back</a></button>
    <?php endforeach;?>
    </form>
</body>
</html>
