This project is a Laravel-based OAuth resource server designed to handle requests to protected resources by verifying and validating OAuth2 tokens. It works in conjunction with an OAuth authorization server, typically using Laravel Passport for token issuance.


Features
OAuth2 token validation
Secure API endpoint protection
Easy integration with existing Laravel applications
Works seamlessly with Laravel Passport


Requirements
PHP >= 7.4
Composer
Laravel >= 8.0
MySQL or PostgreSQL
Installation
Clone the repository:

bash
Copy code
git clone
cd laravel-oauth-resource-server
Install dependencies:

bash
Copy code
composer install
paste the public key from the authorzation server to the storage folder
