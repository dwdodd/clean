let host = window.location.hostname == 'localhost' ? `${window.location.origin}${window.location.pathname}` : '/';
export default host;