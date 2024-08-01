<?php

// Define an associative array where keys are banned user IDs and values are details of the ban
$bannedUsers = [
    1001 => [
        "violation" => "Rules Violation",
        "longReason" => "You violated the rules of the platform, leading to your ban."
    ],
    2003 => [
        "violation" => "Inappropriate Behavior",
        "longReason" => "You used the platform for inappropriate behavior, resulting in a ban."
    ],
    3005 => [
        "violation" => "Terms of Service Violation",
        "longReason" => "You have violated the terms of service, which led to your ban."
    ],
    4007 => [
        "violation" => "Repeated Offenses",
        "longReason" => "Repeated offenses were detected, leading to your account being banned."
    ],
    5009 => [
        "violation" => "Harassment",
        "longReason" => "Harassment was reported, resulting in a ban from the platform."
    ]
];

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Check if the userID parameter exists in the POST request
    if (isset($_POST['userID'])) {

        // Get the user ID from the POST request
        $userID = intval($_POST['userID']); // Use intval to ensure the userID is an integer

        // Check if the user ID is in the array of banned user IDs
        if (array_key_exists($userID, $bannedUsers)) {
            // If the user ID is banned, return the detailed ban information
            $response = [
                "banned" => true,
                "violation" => $bannedUsers[$userID]['violation'],
                "longReason" => $bannedUsers[$userID]['longReason']
            ];
        } else {
            // If the user ID is not banned, return false and empty details
            $response = [
                "banned" => false,
                "violation" => "",
                "longReason" => "No ban found for this user ID."
            ];
        }

        // Return the response as JSON
        echo json_encode($response);

    } else {
        // If the userID parameter is missing, return an error message
        echo json_encode([
            "error" => "Missing userID parameter."
        ]);
    }

} else {
    // If the request method is not POST, return an error message
    echo json_encode([
        "error" => "Invalid request method. Use POST."
    ]);
}

?>
