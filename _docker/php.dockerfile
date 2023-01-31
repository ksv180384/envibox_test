FROM php:7.4-fpm

# Устанавливаем рабочую директорию
WORKDIR /var/www

# Копируем composer.lock и composer.json
COPY composer.lock composer.json /var/www/
#COPY ./backend_admin/composer.json /var/www/admin/composer.json

# Устанавливаем зависимости
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    locales \
    nodejs \
    npm \
    zlib1g-dev \
    libicu-dev \
    supervisor \
    g++ \
    --no-install-recommends \
    && rm -r /var/lib/apt/lists/* \
    && sed -i 's/# ru_RU.UTF-8 UTF-8/ru_RU.UTF-8 UTF-8/' /etc/locale.gen \
    && locale-gen

# Очищаем кэш
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Устанавливаем расширения
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl intl bcmath gd
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install gd

# Устанавливаем composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Устанавливаем NPM
RUN curl -O -L https://www.npmjs.com/install.sh | sh


## Устанавливаем зависимости
#RUN apt-get update && apt-get install -y nodejs npm zlib1g-dev g++ git libicu-dev zip libzip-dev zip \
#    && docker-php-ext-install intl opcache pdo mbstring pdo_mysql\
#    && pecl install apcu \
#    && docker-php-ext-enable apcu \
#    && docker-php-ext-configure zip \
#    && docker-php-ext-install zip \
#    && docker-php-ext-install sockets
#
## Загружаем актуальную версию Composer
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Создаём пользователя и группу www для приложения Laravel
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Копируем содержимое текущего каталога в рабочую директорию
COPY . /var/www/admin
COPY --chown=www:www . /var/www/admin

# Меняем пользователя на www
USER www

# В контейнере открываем 9000 порт и запускаем сервер php-fpm
EXPOSE 9000

CMD ["php-fpm"]
