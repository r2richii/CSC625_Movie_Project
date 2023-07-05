$(document).ready(function (){

    // ########################################################################
    // ########################################################################
    // ACTOR PAGE BUTTON CLICKS
    // ########################################################################
    // ########################################################################

    // To view all actors
    $('#view_all_actors').on('click', function (event) {
        window.open('/movie_project/movie_database_tables/actor/actor_sql_results.php?mode=select');
    });

    // To select a single actor via actor_id from header file
    $('#find_actor').on('click', function (event) {
        window.open('/movie_project/movie_database_tables/actor/actor_sql_results.php?mode=select&header_actor_id=' + $('#header_actor_id').val());
    });
    
});