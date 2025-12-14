FROM nginx:alpine

# Borramos archivos por defecto
RUN rm -rf /usr/share/nginx/html/*

# Página principal
COPY camaraswed /usr/share/nginx/html/index.html

<<<<<<< HEAD
# Páginas de autenticación
COPY login /usr/share/nginx/html/login.html
COPY register /usr/share/nginx/html/register.html

# Copiamos TODAS las carpetas de imágenes
COPY imagen1/ /usr/share/nginx/html/imagen1/
COPY imagen2/ /usr/share/nginx/html/imagen2/
COPY imagen3/ /usr/share/nginx/html/imagen3/
COPY imagen4/ /usr/share/nginx/html/imagen4/
COPY imagen5/ /usr/share/nginx/html/imagen5/
COPY imagen6/ /usr/share/nginx/html/imagen6/
COPY imagen7/ /usr/share/nginx/html/imagen7/
=======
# Copiamos TODA la carpeta de imágenes
COPY Imaguen/ /usr/share/nginx/html/imaguen/
>>>>>>> 72f76638ce6d0016c1c3ef637e747ece0873d1c4

EXPOSE 80
