# Glottos Admin

This repo is a **Proof of Concept** administration interface for the [Glottos Online Translator Package](https://github.com/antonioribeiro/glottos) for Laravel Web Artisans.

### Installation

- Clone the repository `https://github.com/antonioribeiro/glottosAdmin.git`.

- Configure your database in `app/config/database.php`.

- Execute `php artisan migrate`. It will migrate and add an admin user.

- Configure your webserver and .htaccess and you should be good to go.

### A Home Page

This is basically the Laravel PHP home page, to be translated online using Glottos

![home](http://puu.sh/5Co50.jpg)

### A Login Page

Use `admin` for login and password

![login](http://puu.sh/5CofI.png)

### A List of All (300+) Available Languages

You can enable and disable languages using this form.

![home](http://puu.sh/5Cohr.png)

### A Messages and Translations Statistics Page

A way to see what languages still need translations.

![home](http://puu.sh/5ConB.png)

### A List of Translated and Untranslated Messages

You can click a message to edit it.

![messages](http://puu.sh/5CorD.png)

### A Translation Form

Here you can change the source language while translating and you can just hit ctrl+enter to submit your translation.

![translation](http://puu.sh/5Cova.png)
