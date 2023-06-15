import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// TODO ici pour ajouter des fichier JS ou CSS pour Vite
export default defineConfig({ plugins: [laravel({ input: ['resources/css/style.css', 'resources/js/app.js', 'resources/js/liste_incidents.js', 'resources/js/register.js',], refresh: true, }),], });











