FROM debian:wheezy

MAINTAINER Albert Lacarta <urodoz@gmail.com>

RUN apt-key adv --keyserver keyserver.ubuntu.com --recv-keys E9C74FEEA2098A6E && \
    echo "deb http://packages.dotdeb.org/ wheezy-php55 all" > /etc/apt/sources.list.d/php.list && \
    echo "deb http://ftp.debian.org/debian wheezy-backports main contrib non-free" >> /etc/apt/sources.list.d/php.list
RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y \
        php5-cli \
        php5-curl \
        php5-mcrypt \
        php5-intl \
        php5-sqlite \
    && rm -rf /var/lib/apt/lists/*

RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y curl git && \
    rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD php-extra.ini /etc/php5/mods-available/extra.ini
RUN php5enmod extra

RUN mkdir -p /code
WORKDIR "/code"

# Supervisor installation
RUN apt-get update && apt-get install -y python-pip python-dev && pip install supervisor
ADD supervisor/supervisord.conf /etc/supervisord.conf

CMD supervisord -c /etc/supervisord.conf

ADD phpunit.phar /usr/local/bin/phpunit
RUN chmod +x /usr/local/bin/phpunit