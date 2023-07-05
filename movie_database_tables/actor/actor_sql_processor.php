    <?php 

    session_start();
    require($_SERVER['DOCUMENT_ROOT'].'/movie_project/mssql_connection.php');
    global $MSSQL_CONNECTION;

    // Get the actor id for SQL lookup
    if(isset($_GET['header_actor_id'])){ $header_actor_id = $_GET['header_actor_id']; }
    if(isset($_GET['mode'])){ $mode = $_GET['mode']; }

    // #########################################################################################
    // POST Variables

    if(isset($mode))
    {


        
    }
    
    ?>