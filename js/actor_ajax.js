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
        window.open('/movie_project/movie_database_tables/actor/actor_sql_results.php?mode=single_select&header_actor_id=' + $('#header_actor_id').val());
    });

    // To add a single actor 
    $('#add_actor').on('click', function (event) {
        executeActorSQL('POST','insert');
    });
    
});

    // ########################################################################
    // ACTOR PAGE BUTTON CLICKS
    function executeActorSQL(type, mode) {
        $('#actor_form').on('submit', function (event) {
            // #######################################################################
            // VARIABLES FOR INSERTING INTO DATABASE
            event.stopImmediatePropagation();
            let actorID = $('#input_actor_id').val();
            let actorName = $('#input_actor_name').val();
            let actorAwardID = $('#input_actor_award_id').val();
            actorClearAll();
    
            $.ajax({
                crossOrigin: true,
                url: '/movie_project/movie_database_tables/actor/actor_sql_processor.php' + '?mode=' + mode,
                type: type,
                dataType: 'JSON',
                async: false,
                data: {
                    actorID:actorID,
                    actorName: actorName,
                    actorAwardID: actorAwardID
                },
                success: function (response) {
                location.reload();
                }
            });
        });
    }

    function actorClearAll()
    {
        $('#input_actor_id').val('');
        $('#input_actor_name').val('');
        $('#input_actor_award_id').val('');
    }