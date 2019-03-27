# Mini Framework

## Installation
This is to be in virtual host file.located - (/etc/apache2/sites-available/example.com.conf)

```apache
<VirtualHost *:80>
        ServerName example.com
        ServerAlias example.com
        ServerAdmin webmaster@example.com
        DocumentRoot /home/user/www/example/public
        
        # If using https protocol 
        #Protocols h2 h2c HTTP/1.1

        <Directory /home/user/www/example/public>
                Options +FollowSymlinks
                AllowOverride All
                Require all granted
        </Directory>

        ErrorLog /home/user/www/example/error.log
        CustomLog /home/user/www/example/log combined
</VirtualHost>
```

