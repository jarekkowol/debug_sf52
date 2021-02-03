###
Please 
```composer install``` 
and run
```vendor/bin/phpunit```
This should reproduce:

Set in .env.test
```
MAILER_DSN=null://default
```

```
1) App\RegistrationTest::testRegister
   A client must have Mailer enabled to make email assertions. Did you forget to require symfony/mailer?

/debug_sf52/vendor/symfony/framework-bundle/Test/MailerAssertionsTrait.php:129
/debug_sf52/vendor/symfony/framework-bundle/Test/MailerAssertionsTrait.php:25
/debug_sf52/tests/App/RegistrationControllerTest.php:22
```
