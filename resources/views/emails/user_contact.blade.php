<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Message Received</title>
    <style>
		.container {
        	background-color: #8FBC8F;
            padding: 20px;
            border-radius: 8px;
            max-width: 500px;
        }
        .footer {
            font-size: 12px; 
            color: #FAEBD7;
            opacity: 0.7; 
        }

    </style>
</head>
<body>
<p>Hello, Omneya. <br> You have received a new message from the Contact Us form on your website. <br> Below are the details of the message:</p>
    
    <div class="container">
       <center><p><strong>Name:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>About:</strong> {{ $data['subject'] }}</p>
        <p><strong>Message:</strong></p>
        <p class="message-content">{{ $data['message'] }}</p></center>
        
        <div class="footer">
            <center><p>Thanks for contacting with us.</p>
            <p>Have a Nice Day 😉!</p></center>
        </div>
    </div>
</body>
</html>