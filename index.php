<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $fullName = isset($_POST['fullName']) ? htmlspecialchars(trim($_POST['fullName'])) : '';
        $email    = isset($_POST['email'])    ? htmlspecialchars(trim($_POST['email']))    : '';
        $phone    = isset($_POST['phone'])    ? htmlspecialchars(trim($_POST['phone']))    : '';
        $course   = isset($_POST['course'])   ? htmlspecialchars(trim($_POST['course']))   : '';
        $comments = isset($_POST['comments']) ? htmlspecialchars(trim($_POST['comments'])) : '';

        $errors = [];

        if ($fullName === '') {
            $errors[] = "Full Name is required.";
        }
        if ($email === '') {
            $errors[] = "Email is required.";
        }
        if ($phone === '') {
            $errors[] = "Phone Number is required.";
        }
        if ($course === '') {
            $errors[] = "Course selection is required.";
        }

        if (!empty($errors)) {
            echo "<h1>There were some problems:</h1>
            <ul class='error-list'>";
            foreach ($errors as $err) {
                echo "<li>" . $err . "</li>";
            }
            echo "</ul>
            <div style='margin-top: 1.5rem; text-align: center;'>
                <a href='index.php' class='muted-link'>Go Back to Form</a>
            </div>";
        } else {
            echo "<h1>Registration Successful!</h1>
            <div class='result-container'>
            <h2>Submitted Details:</h2>
            <div class='result-item'><span class='result-label'>Full Name:</span> <span>$fullName</span></div>
            <div class='result-item'><span class='result-label'>Email:</span> <span>$email</span></div>
            <div class='result-item'><span class='result-label'>Phone:</span> <span>$phone</span></div>
            <div class='result-item'><span class='result-label'>Course:</span> <span>$course</span></div>";
            if ($comments !== '') {
                echo "<div class='result-item'><span class='result-label'>Comments:</span> <span>$comments</span></div>";
            }
            echo "</div>
            <div style='margin-top: 1.5rem; text-align: center;'><a href='index.php' class='muted-link'>Register Another Student</a></div>";
        }
    } else {
    ?>
        <h1>Registration Form</h1>
        <form id="registrationForm" action="index.php" method="POST">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" id="fullName" name="fullName" placeholder="Enter name" required>
                <div class="error-message"></div>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter email" required>
                <div class="error-message"></div>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="1234567890" required>
                <div class="error-message"></div>
            </div>

            <div class="form-group">
                <label for="course">Select Course</label>
                <select id="course" name="course" required>
                    <option value="" selected>Select a course</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Data Science">Data Science</option>
                    <option value="Digital Marketing">Digital Marketing</option>
                    <option value="Graphic Design">Graphic Design</option>
                </select>
                <div class="error-message"></div>
            </div>

            <div class="form-group">
                <label for="comments">Comments (Optional)</label>
                <textarea id="comments" name="comments" rows="3" placeholder="Any additional information..."></textarea>
            </div>

            <button type="submit">Register Now</button>
        </form>
    <?php
    }
    ?>
</div>

<script src="script.js"></script>
</body>
</html>
