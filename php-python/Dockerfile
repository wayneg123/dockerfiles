FROM php:7.2-fpm

# persistent / runtime deps
RUN curl -fs https://www.python.org/ftp/python/3.6.6/Python-3.6.6.tar.xz -o Python-3.6.6.tar.xz \
    && tar xvf Python-3.6.6.tar.xz && rm Python-3.6.6.tar.xz && cd Python-3.6.6 \
    && ./configure --enable-optimizations && make -j8 && make altinstall
