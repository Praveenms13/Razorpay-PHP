# PHP Razorpay Payment Gateway Integration

This repository demonstrates a sample implementation of the Razorpay payment gateway in PHP using the test mode.

### Demo: https://payments.praveenms.site/

## Getting Started

1. Clone this repository to your local machine:
```
git clone https://github.com/yourusername/razorpay-php-sample.git
```

2. Navigate to the project directory:

```
cd razorpay-php
``````


3. Open the `config.json` file and update your Razorpay API key and secret and also the database records:

```json
{
    "Key_Id": "",
    "Key_Secret": "",
    "displayCurrency": "",
    "dbname": "",
    "dbuser": "",
    "dbpass": "",
    "dbhost": ""
  }
``````  
##### Run a local development server, for example using PHP's built-in server:

```bash
php -S localhost:8000
```

#####Access the payment gateway example in your browser:


```bash
http://localhost:8000/index.php

```

##### Usage
1. The index.php file contains the sample payment form that collects customer information and initiates the payment process.

2. The payment processing logic is handled in the payment.php file, which creates a Razorpay order and redirects the user to the Razorpay payment page.

3. Once the payment is successfully completed, the user is redirected to the success.php page.