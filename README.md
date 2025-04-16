# PHP Mailer Contact Form

This project demonstrates a simple contact form using PHP and PHPMailer to send emails through SMTP. It validates user input and displays success or error messages without redirecting to different pages.

## Features

- User input validation (name, email, subject, and message fields)
- Sends emails using PHPMailer
- Displays success/error messages on the same form after submission
- Utilizes SMTP for secure email communication

## Requirements

- PHP 7.2 or higher
- Composer for dependency management (optional, if you prefer manual installation)
- PHPMailer library

## Installation

1. **Clone the Repository**:

   ```bash
   git clone https://github.com/ssantoshhhhh/phpmailer.git

 2. **Install PHPMailer**:

You can install PHPMailer via Composer. If you don't have Composer installed, you can manually download the library.

Using Composer:


composer require phpmailer/phpmailer
Or download it manually from the PHPMailer GitHub repository.

Update SMTP Credentials:

Open the contact_form.php file and replace the SMTP credentials:

$mail->Username   = 'your_email@gmail.com'; // Your SMTP username (email)
$mail->Password   = 'your_app_password';     // Your SMTP password (use app password)
Note: For Gmail, it’s recommended to use an App Password instead of your actual account password. You can create one in your Google Account settings.

## Usage
Set Up Your Web Server:

Ensure you're running a local or remote web server that supports PHP. Commonly used servers include:

XAMPP
MAMP
WAMP
LAMP
Access the Contact Form:

Open a web browser and navigate to the contact_form.php file through your web server (e.g., http://localhost/your-repo-name/contact_form.php).

Fill Out the Form:

Complete the contact form fields (name, email, subject, message) and click "Send".

Check for Success/Error Messages:

After submission, either a success message will be displayed, or an error message will indicate what went wrong.

License
This project is licensed under the MIT License - see the LICENSE file for details.

Contributing
Contributions are welcome! Feel free to submit a pull request or open an issue for bug reports and feature requests.

Acknowledgments
PHPMailer - For providing a robust email sending library.
Gmail - For demonstrating SMTP email sending capabilities.
Contact
If you have any questions, feel free to reach out to me at [santoshkumar90101s@gmail.com].

 
