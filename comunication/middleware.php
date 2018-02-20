<?php

include("../configs/functions.php");
if (isset($_POST['Fn'])) {
    $actionFn = filter_input(INPUT_POST, 'Fn', FILTER_SANITIZE_STRING);
} else {
    $actionFn = filter_input(INPUT_GET, 'Fn', FILTER_SANITIZE_STRING);
}
switch ($actionFn) {
    case "addNewComment":
        $comments= new comments();
        $comments->addNewComment($_POST['IdTerminal'], $_POST['Comments']);
        break;
    case "editComment":
        $comments= new comments();
        $comments->editComment($_POST['IdComment'], $_POST['Comments']);
        break;
    case "deleteComment":
        $comments= new comments();
        $comments->deleteComment($_POST['IdComment']);
        break;

        case "addNewUser":
            $users= new users();
            $users->addNewUser($_POST['IdUser'], $_POST['Comments']);
            break;
        case "editComment":
            $comments= new comments();
            $comments->editComment($_POST['IdComment'], $_POST['Comments']);
            break;
        case "deleteComment":
            $comments= new comments();
            $comments->deleteComment($_POST['IdComment']);
            break;
    default:
        echo "... Middleware ...  Default Error";
}
?>
