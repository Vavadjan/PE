<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "vavadjan@gmail.com";
    $subject = "Order Details";

    // Build the email body
    $message = "Order details:\n";

    // Append selected checkboxes and their quantities to the message
    if(isset($_POST['cables'])) {
        $message .= "Cables:\n";
        foreach($_POST['cables'] as $key => $value){
            $quantity = $_POST['quantity_cable' . ($key + 1)];
            $message .= "- " . $value . " (Quantity: " . $quantity . ")\n";
        }
    }

    if(isset($_POST['items'])) {
        $message .= "Items:\n";
        foreach($_POST['items'] as $key => $value){
            $quantity = $_POST['quantity_item' . ($key + 1)];
            $message .= "- " . $value . " (Quantity: " . $quantity . ")\n";
        }
    }

    // Additional form fields can be added to the email body as needed

    // Send the email
    $headers = "From: vavadjan@google.com" . "\r\n" .
               "Reply-To: vavadjan@gmail.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    mail($to, $subject, $message, $headers);
}
?>
