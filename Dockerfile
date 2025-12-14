FROM nginx:alpine

# Borramos archivos por defecto
RUN rm -rf /usr/share/nginx/html/*

# Copiamos los archivos HTML
COPY camaraswed.html /usr/share/nginx/html/index.html
COPY login.html /usr/share/nginx/html/login.html
COPY register.html /usr/share/nginx/html/register.html

# Copiamos TODA la carpeta de imágenes
COPY Imaguen/ /usr/share/nginx/html/imaguen/

EXPOSE 80
