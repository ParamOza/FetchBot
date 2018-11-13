// Can also be included with a regular script tag
import Typed from 'typed.js';

var options = {
  strings: ["<i>First</i> sentence.", "&amp; a second sentence."],
  typeSpeed: 40
}

var typed = new Typed('#questionOutput', {
    strings: ['quetsion1', 'quetsion2', 'quetsion3'],
    typeSpeed: 0,
    backSpeed: 0,
    attr: 'placeholder',
    bindInputFocusEvents: true,
    loop: true
});
