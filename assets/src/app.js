/*
 *
 * Mobile navigation toggle
 *
 */

let menubtn = document.getElementById('open-menu-btn');
let menu = document.getElementById('menu');

menubtn.addEventListener('click', function () {
    menu.classList.toggle('hidden');
});

/*
 *
 * Tabs
 *
 */

let tab1btn = document.getElementById('tab1-btn');
let tab2btn = document.getElementById('tab2-btn');
let tab1content = document.getElementById('tab1-content');
let tab2content = document.getElementById('tab2-content');
let classes = ['-mb-px', 'border-l', 'border-t', 'border-r', 'text-green-600'];

tab2content.style.display = 'none';

tab1btn.addEventListener('click', function () {
    tab1content.style.display = 'block';
    tab2content.style.display = 'none';
    
    tab1btn.classList.add(...classes);
    tab2btn.classList.remove(...classes);
});

tab2btn.addEventListener('click', function () {
    tab1content.style.display = 'none';
    tab2content.style.display = 'block';
    
    tab1btn.classList.remove(...classes);
    tab2btn.classList.add(...classes);
});
