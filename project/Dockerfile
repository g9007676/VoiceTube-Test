FROM php:7.2-fpm

WORKDIR /code/project
ADD ./ /code/project

#####################################
# Non-Root User:
#####################################

RUN groupadd -g 1000 Zheyu && \
    useradd -u 1000 -g Zheyu -m Zheyu && \
    apt-get update -yqq

RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
	&& docker-php-ext-install -j$(nproc) iconv \
	&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
	&& docker-php-ext-install -j$(nproc) gd pdo pdo_mysql mbstring json

RUN apt-get install -y git

RUN pecl install xdebug-2.6.0 \
	&& docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --filename=composer --install-dir=/bin
ENV PATH /root/.composer/vendor/bin:$PATH

EXPOSE 9000

CMD php-fpm
