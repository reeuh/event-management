<?php

function validate_client($POST){
    if(!isset($POST['client'])){
        return false;
    }else if(strlen(trim($POST['client']))<1){
        return false;
    }
    return true;
}

function validate_address($POST){
    if(!isset($POST['address'])){
        return false;
    }else if(strcmp($POST['address'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_phone_no($POST){
    if(!isset($POST['phone_no'])){
        return false;
    }
    return true;
}

function validate_event_id($POST){
    if(!isset($POST['event_id'])){
        return false;
    }
    return true;
}

function validate_event($POST){
    if(!isset($POST['event'])){
        return false;
    }
    return true;
}

function validate_schedule($POST){
    if(!isset($POST['schedule'])){
        return false;
    }
    return true;
}

function validate_type($POST){
    if(!isset($POST['type'])){
        return false;
    }
    return true;
}

function validate_audience_capacity($POST){
    if(!isset($POST['audience_capacity'])){
        return false;
    }
    return true;
}

function validate_payment_type($POST){
    if(!isset($POST['payment_type'])){
        return false;
    }
    return true;
}

function validate_amount($POST){
    if(!isset($POST['amount'])){
        return false;
    }
    return true;
}

function validate_status($POST){
    if(!isset($POST['status'])){
        return false;
    }
    return true;
}

function validate_add_event($POST){
    if(!validate_client($POST) || !validate_address($POST) || !validate_phone_no($POST) ||
     !validate_event($POST) || !validate_schedule($POST) || !validate_type($POST) ||
     !validate_audience_capacity($POST) || !validate_payment_type($POST) || !validate_amount($POST) || 
     !validate_status($POST)){
        return false;
     }
    return true;
}

?>