;A linha com "die('Acesso Negado')" logo abaixo garante segurança ao sistema, já que impede o acesso direto pelo navegador, se bem que isso já não seria possível pelo sitema de rotas e do .htaccess, mas é uma forma de reforçar a segurança
;Lembrem de sempre gitignore esses arquivos que guardam senha
;<?php die('Acesso Negado'); ?>
[mysql]
mysql_host     = localhost
mysql_dbname   = PW2
mysql_username = root
mysql_password = ""