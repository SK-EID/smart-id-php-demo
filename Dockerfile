FROM mattrayner/lamp:latest

COPY ./ /app

COPY run.sh /run.sh

COPY makeAppTables.sh /makeAppTables.sh

RUN chmod +x /run.sh
RUN chmod +x /makeAppTables.sh

RUN wget https://get.symfony.com/cli/installer -O - | bash

CMD ["/run.sh"]