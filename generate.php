<?php
// Replace with your Hugging Face API Key
$apiKey = getenv('API_KEY');;
$topic = $_POST['topic'];

// API URL (Hugging Face)
$url = "https://api-inference.huggingface.co/models/google/gemma-2b";

// Customizing the Prompt for a More Detailed Response
$data = [
    "inputs" => "Write a detailed blog post about: " . $topic . " covering key points, examples, and a conclusion.",
    "parameters" => [
        "max_new_tokens" => 800,  // Increase response length
        "temperature" => 0.7,      // Adjust creativity (0.7 is balanced)
        "top_p" => 0.9
    ]
];

// cURL Request
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $apiKey",
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
curl_close($ch);

$response = json_decode($response, true);

// Debugging: Print API Response
echo "<pre>";
print_r($response);
echo "</pre>";

// Extract and Display AI Response
if (isset($response[0]['generated_text'])) {
    $content = $response[0]['generated_text'];
} else {
    $content = "Sorry, the AI couldn't generate content at this time.";
}

// Store in Database
include 'C:\xampp\htdocs\ai-blog-generator\db\db.php';
$stmt = $conn->prepare("INSERT INTO blogs (title, content) VALUES (?, ?)");
$stmt->bind_param("ss", $topic, $content);
$stmt->execute();
$stmt->close();
$conn->close();

// Redirect to View Page
header("Location: view.php");
exit();
?>
