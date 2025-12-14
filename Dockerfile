FROM nginx:alpine

# Borrar archivos por defecto de Nginx
RUN rm -rf /usr/share/nginx/html/*

# Página principal
COPY camaraswed.html /usr/share/nginx/html/index.html

# Login y Register
COPY login.html /usr/share/nginx/html/login.html
COPY register.html /usr/share/nginx/html/register.html

# Imágenes
COPY imagen1.jpg /usr/share/nginx/html/imagen1.jpg
COPY imagen2.jpg /usr/share/nginx/html/imagen2.jpg
COPY imagen3.jpg /usr/share/nginx/html/imagen3.jpg
COPY imagen4.jpg /usr/share/nginx/html/imagen4.jpg
COPY imagen5.jpg /usr/share/nginx/html/imagen5.jpg
COPY imagen6.jpg /usr/share/nginx/html/imagen6.jpg
COPY imagen7.jpg /usr/share/nginx/html/imagen7.jpg

# Exponer puerto 80
EXPOSE 80
