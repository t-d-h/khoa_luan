FROM ubuntu:20.04

RUN mkdir do-an && cd do-an && \
    ln -fs /usr/share/zoneinfo/UTC /etc/localtime && \
    apt update && \
    DEBIAN_FRONTEND=noninteractive apt install software-properties-common unzip curl git vim tmux -y

RUN add-apt-repository ppa:ondrej/php && \
    apt update && \
    apt install php8.0 libapache2-mod-php8.0 php8.0-mysql php8.0-cli php8.0-cgi php8.0-pgsql php8.0-curl php8.0-xml -y

RUN curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php && \
    php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer

RUN mkdir /khoa_luan
COPY . .
RUN cd khoa_luan && \
    composer install

# tdhoan526/do-an:v2
