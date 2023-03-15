# WEB CTF 03
 A simple challenge that is based on smtp injection where you need to inject a misc code to get the reset password to your email

--------------------------
## Deployment Docs

### For Linux
- Git clone the repo git clone https://github.com/bugxploitoff/WEB-CTF-03.git
- apt-get install apache2 php mysql php-mysqli
- mv CTF-PLATFORM /var/www/html
- login to mysql import (File:user.php)
- go to file /index.php [ Change the database setting ]
- Chnage /mail.php [ Change SMTP server settings ]

### For Windows
- Git clone the repo git https://github.com/bugxploitoff/WEB-CTF-03.git
- Install Xampp
- mv CTF-PLATFORM htdocs
- login to mysql import (File:database.php)
- go to file /index.php [ Change the database setting ]
- Chnage /mail.php [ Change SMTP server settings ]


---------------------------------

