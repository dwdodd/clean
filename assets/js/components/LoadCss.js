const LoadCss = path => {
    let cssId = 'dinamicCss';
    if (!document.getElementById(cssId)){
        let head  = document.getElementsByTagName('head')[0];
        let link  = document.createElement('link');
        link.id   = cssId;
        link.rel  = 'stylesheet';
        link.type = 'text/css';
        link.href = path;
        link.media = 'all';
        head.appendChild(link);
    }
}

export default LoadCss;