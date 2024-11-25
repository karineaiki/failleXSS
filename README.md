# XSS Vulnerability Test

This repository demonstrates a simple example of a Cross-Site Scripting (XSS) vulnerability.

The goal is to showcase how an XSS attack can be identified, understood, and mitigated.

Additionally, it provides an opportunity to explore best practices for securing web applications.

## Installation

To set up the server, follow these steps:

1. Build the Docker image:

```bash
docker build -t php-xss-image .
```

2. Run the Docker container:

```bash
docker run -d -p 8080:80 --name php-xss-container php-xss-image
```

Access the application in your browser at `http://localhost:8080`.

## XSS Vulnerability Test

### Step 1: Identifying the Vulnerability

1. Open the application at `http://localhost:8080`.
2. Observe the page behavior. There is already a message in the "guestbook" containing a script that executes an alert.
3. Analyze how the malicious message causes the Cross-Site Scripting vulnerability.

### Step 2: Fixing the Code

Modify the code in `index.php` to prevent the malicious script from executing while ensuring the message content is still visible as plain text.