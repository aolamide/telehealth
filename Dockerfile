# Use an official PHP 5.3 Apache base image
FROM php:5.3-apache

# Set the working directory to /var/www/html
WORKDIR /var/www/html


# Set the DocumentRoot to our webroot
RUN sed -i -e 's!/var/www/html!/var/www/html/app/webroot!g' /etc/apache2/sites-available/000-default.conf && \
    sed -i -e 's!/var/www/html!/var/www/html/app/webroot!g' /etc/apache2/apache2.conf

# Copy the CakePHP application files into the container
COPY . .

RUN a2enmod rewrite

#Make cake cli available
RUN export PATH="$PATH:/var/www/html/lib/Cake/Console"

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2ctl", "-D", "FOREGROUND"]
