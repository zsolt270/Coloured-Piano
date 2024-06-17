<?php
require('../private/Core/Requires.php');
//Extracts the url and will require here the right controller
Router::routingTo($_SERVER['REQUEST_URI']);
