<?php

// Define an associative array where keys are banned user IDs and values are reasons for the ban
$bannedUsers = [
    1001 => "Cheating",
    2003 => "Inappropriate behavior",
    3005 => "Violating terms of service",
    4007 => "Repeated offenses",
    5009 => "Harassment"
];

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    
    // Get the user ID from the POST request
    $userID = $_POST['userID'];
    
    // Check if the user ID is in the array of banned user IDs
    if (array_key_exists($userID, $bannedUsers)) {
        // If the user ID is banned, return true and the reason for the ban
        $response = [
            "banned" => true,
            "reason" => $bannedUsers[$userID]
        ];
    } else {
        // If the user ID is not banned, return false and an empty reason
        $response = [
            "banned" => false,
            "reason" => ""
        ];
    }
    
    // Return the response as JSON
    echo json_encode($response);
    
} 
else 
{
    // If the request method is not POST, return an error message
    echo "Invalid Request";
}

?>