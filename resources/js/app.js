import jQuery from "jquery";
window.$ = jQuery;

import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { filterGenres } from './filter/genres';
filterGenres();
import { filterAuthors } from './filter/authors';
filterAuthors();