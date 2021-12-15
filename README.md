### Opens shell for php

>docker exec -ti symfony-rabbit-mq-playground-php /bin/sh

### Runs message consumer with details

>php bin/console messenger:consume async -vv
