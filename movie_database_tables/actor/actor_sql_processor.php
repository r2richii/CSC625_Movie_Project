    <?php 

    session_start();
    require($_SERVER['DOCUMENT_ROOT'].'/movie_project/mssql_connection.php');
    global $MSSQL_CONNECTION;

    // GETS
    if(isset($_GET['header_actor_id'])){ $header_actor_id = $_GET['header_actor_id']; }
    if(isset($_GET['mode'])){ $mode = $_GET['mode']; }

    // POSTS
    (isset($_POST['actorID']))      ? $actor_id       = $_POST['actorID']      : $actor_id = '';
    (isset($_POST['actorName']))    ? $actor_name     = $_POST['actorName']    : $actor_name = '';
    (isset($_POST['actorAwardID'])) ? $actor_award_id = $_POST['actorAwardID'] : $actor_award_id = '';

    // #########################################################################################
    // POST Variables

    if(isset($mode))
    {
        switch($mode)
        {
            case 'insert':
                
        }
    }
    
    ?>