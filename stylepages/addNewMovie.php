<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
    if(empty($_POST["title"]))   
        $error = "<label class='text-danger'>Bitte den Titel angeben</label>";   
    else if(empty($_POST["genre"]))    
        $error = "<label class='text-danger'>Bitte ein Genre angeben</label>";    
    else if(empty($_POST["year"]))   
        $error = "<label class='text-danger'>Bitte das Erscheinungsjahr angeben</label>";
    else if(empty($_POST["regie"]))   
        $error = "<label class='text-danger'>Bitte einen Regiseeur angeben</label>";
    else if(empty($_POST["actors"]))   
        $error = "<label class='text-danger'>Bitte min. einen Schauspieler angeben</label>";

    else  
    {  
        if(file_exists('../json/movielist.json'))  
        {  
            $current_data = file_get_contents('../json/movielist.json');  
            $array_data = json_decode($current_data, true);
            $actorsArray = explode(",", $_POST['actors']);
            $extra = array(  
                'titel'        =>   $_POST['title'],
                'regie'        =>   $_POST['regie'],
                'genre'        =>   $_POST['genre'],
                'jahr'         =>   $_POST['year'],
                'schauspieler' =>   $actorsArray 
            );  
            $array_data[] = $extra;  
            $final_data = json_encode($array_data);  
            if(file_put_contents('../json/movielist.json', $final_data))  
            {  
                $message = "<label class='text-success'>Film erfolgreich hinzugefügt</p>";  
            }  
        }  
        else  
        {  
            $error = 'JSON File not exits';  
        }  
    }  
}  
?>  
<!DOCTYPE html>  
<html>  
<head>
    <meta charset="utf-8">
    <title>Webslesson Tutorial | Append Data to JSON File using PHP</title>
    <link href="../css/layout.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  -->
</head>  
<body>  
    <br />  
    <div class="container" style="width:500px;">                 
        <form method="post">  
            <?php   
            if(isset($error))  
            {  
                echo $error;  
            }  
            ?>  
            <br />  
            <label>Titel</label>  
            <input type="text" name="title" class="form-control" /><br />  
            <label>Genre</label>  
            <input type="text" name="genre" class="form-control" /><br />  
            <label>Jahr</label>  
            <input type="text" name="year" class="form-control" /><br />
            <label>Regisseur</label>  
            <input type="text" name="regie" class="form-control" /><br /> 
            <label>Schauspieler (mehrere durch Kommata trennen)</label>  
            <input type="text" name="actors" class="form-control" /><br /> 
            <input type="submit" name="submit" value="Abschicken" class="gbtn gbtn-info" /><br />                      
            <?php  
            if(isset($message))  
            {  
                echo $message;  
            }  
            ?>  
        </form>  
    </div>  
    <br />  
</body>  
</html>
