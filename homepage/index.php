<?php 
include('../config.php');

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($_POST['name'])
    $description = mysqli_real_escape_string($_POST['description']);
    $image = mysqli_real_escape_string($_POST['file'])


    $sql = 'insert into events_list(name, desciption,image) values(.'$name', .'$description', .'$image' )';

    $result = mysqli_query($conn, $sql);

    if($result = true){
        echo "a data foi insirida";
    }else{
        die(mysqli_error($conn));
    }
}
?>
<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Events</title>
</head>

<body>

    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Nome do Evento</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nome" name="name">
            </div>

            <div class="form-group">
                <label>Descrição do evento</label>
                <input type="text" class="form-control" placeholder="Descrição" name="description">
            </div>

            <div class="form-group">
                <label>Digite o nome do ficheiro</label>
                <input type="text" class="form-control" placeholder="file" name="file">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>