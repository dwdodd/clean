
const tag = (type, props, ...args) => {
    const children = args.length ? [].concat(...args) : null;
    return { type, props, children }
}

const createElement = node => {
    if(typeof node === 'string') return document.createTextNode(node);
    const element = document.createElement(node.type);
    node.children.map(createElement).forEach(child => element.appendChild(child));
    return element;
}

export {tag, createElement};