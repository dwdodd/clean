import host from '../../../../../assets/js/components/host.js';
import LoadCss from '../../../../../assets/js/components/LoadCss.js';
import hello from '../../../../../assets/js/components/welcome.js';

LoadCss(`${host}app/views/home/helper/assets/css/style.css`);

let h1_body = document.getElementById('body');
    h1_body.innerHTML = hello + ' ' + host;
