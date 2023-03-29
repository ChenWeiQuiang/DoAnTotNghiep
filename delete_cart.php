<?php
    session_start();
    if( session_unset() ) {
        echo "True";
    }
    

?>