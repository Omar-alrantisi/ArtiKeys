<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Post Added</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dear {{ $emailData['user']['name'] }},

                    We are thrilled to inform you that your application to join Artikeys has been approved! Welcome to our platform, where creativity knows no bounds.
                    Your approval signifies that our team was impressed with your credentials and believes you have the potential to make a significant impact in the world of art. We can't wait to see what you'll create and share with the Artikeys community.

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
