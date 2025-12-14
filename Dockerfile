FROM nginx:alpine

# Borramos archivos por defecto
RUN rm -rf /usr/share/nginx/html/*

# Copiamos SOLO lo que importa
COPY camaraswed.html /usr/share/nginx/html/index.html
COPY Imagen1.jpg /usr/share/nginx/html/Imagen1.jpg
COPY Imagen2.jpg /usr/share/nginx/html/Imagen2.jpg
COPY login.html /usr/share/nginx/html/login.html
COPY register.html /usr/share/nginx/html/register.html

EXPOSE 80
