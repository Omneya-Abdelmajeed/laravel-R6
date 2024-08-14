## Discover the risk of not making the root directory of laravel project public path.


### Introduction:

Laravel should always be served out of the root of the "web directory" configured for your web server. You should not attempt to serve a Laravel application out of a subdirectory of the "web directory". Attempting to do so could expose sensitive files present within your application.


## Risks of Incorrect Setup

1. **Security Risks:**\
    Exposing sensitive files that should not be publicly accessible, such as (`app`, `config`, `.env`, `database` ,etc.). this would lead that sensitive files being exposed, such as config. files containing environment variables or database credentials. 

2. **Broken Website Features:**\
    Missing images, CSS, and JavaScript files due to incorrect paths.\
   This could lead to directory traversal attacks, as hackers could access directories and files that shouldn't be exposed .  

3. **Performance Issues:**\
  Slower load times and inefficient handeling of resource requests and potential performance issues if these directories are not optimized for web access..


## How to Fix

1. after setting `public` as the web root; configure your web server (Apache, Nginx, etc.) to serve files from the public directory. This isolates your application’s core files and configuration from public access.

2. Ensure that permissions are correctly set on directories and files, with the web server having only the necessary access rights.

3. Utilize `.htaccess` files in Apache or equivalent configurations in Nginx to restrict access to non-public files and directories.

By following these steps, you can ensure that your Laravel application runs smoothly and securely.
