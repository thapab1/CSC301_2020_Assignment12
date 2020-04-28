<?php 
function jsonToArray(string $file){
	return json_decode(file_get_contents($file),true);
}

function displayList($room, $owner){
    echo '<li class="list-group-item">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-3">
                        <img src="'.$room->picture.'" alt="room-'.$room->id.'" class="img-thumbnail img-responsive" style="max-height: 200px; max-width: 200px;">
                    </div>
                    <div class="col-7 text-left">
                        <p class="lead">'.$room->description.'</p>
                    </div>
                    <div class="col-2">
                        <img src="'.$owner->profilePicture.'"
                            alt="houshold-'.$owner->id.'" class="img-responsive rounded-circle"
                            style="max-height: 50px; max-width: 50px;">
                        <strong>'.$owner->name.'</strong>
                        <br>
                        <small>'.$owner->sex.', '.$owner->age. ' years old'.'</small> 
                        <hr class="small-margin-top">
                    </div>
                </div>
                <hr class="my-4">
                <p class="text-center">Price: '.$room->price.'</p>
                <div class="row">';
    if (is_logged()) {
        echo '<div class="col-md-3">
                    <button class="btn btn-primary btn-lg" onclick="triggerLike('.$room->id.')">
                        <i class="far fa-thumbs-up" style="font-size: 1.2em;"></i>
                    </button> <div id="likeCount-'.$room->id.'">('.$room->likeCount.' Likes)</div>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-primary btn-lg" href="detail.php?id='.$room->id.'" role="button">View</a>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-primary btn-lg" href="edit.php?id='.$room->id.'" role="button">Edit</a>
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-danger btn-lg" href="delete.php?id='.$room->id.'" role="button">Delete</a>
                    </div>
                </div>';
    } else {
        echo '<div class="col-md-5">
                        <a class="btn btn-primary btn-lg" href="detail.php?id='.$room->id.'" role="button">View</a>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-primary btn-lg" href="edit.php?id='.$room->id.'" role="button">Edit</a>
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-danger btn-lg" href="delete.php?id='.$room->id.'" role="button">Delete</a>
                    </div>
                </div>';
    }
    
    echo '</div>
        </li>';
}

function displayDetail($room, $owner){
    echo '<div class="row">
                <div class="col-9">
                    <h4>Description:</h4>
                    '. $room->description .'
                    <br><br>
                    <div class="row">
                        <div class="col-5">
                            <h4>About household:</h4>
                            <ul>
                                <li>Cleanliness: '. $owner->cleanliness .'</li>
                                <li>Food: '. $owner->food .'</li>
                                <li>Bedtime: '. $owner->bedtime .'</li>
                                <li>Price asking: '. $room->price .'</li>
                            </ul>
                            <h4>Flatmate preference:</h4>
                            <p> '. $owner->flatmateExpectation .' </p>
                        </div>
                        <div class="col-7">
                            <img src="'. $room->picture .'" alt="room-'. $room->id .'" class="img-responsive" style="max-height: 400px; max-width: 400px;">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <img src="'. $owner->profilePicture .'" alt="houshold-'. $owner->id .'" class="img-responsive rounded-circle" style="max-height: 100px; max-width: 100px;">
                    <strong>'. $owner->name .'</strong>
                    <br>
                    <small>'. $owner->sex .', '. $owner->age . ' years old'.'</small> 
                    <hr class="small-margin-top">
                    <p>Phone number: '. $owner->phoneNumber .'</p>    
                </div>
            </div>';
}

function displayPageHeader($title){

    echo '<!doctype html>
        <html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
            <title>'. $title .'</title>
        </head>
        <body>
            <div class="container">';
}

function displayPageFooter(){
    echo '</div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
    </html>';
}

?>