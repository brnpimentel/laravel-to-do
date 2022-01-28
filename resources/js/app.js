
//Remove notification after show

let not_el = document.getElementById('notification');

not_el && setTimeout(() => not_el.remove(), 3000);