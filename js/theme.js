// The following lines require CODEKIT to work. 
// It's part of my workflow, if it isn't part of yours, 
// you will need to concatenate and minify some other way
//
// @codekit-prepend "../components/typography/_typography.js"
// @codekit-prepend "../components/navigation/_navigation.js"


/* 
 * Accessible focus highlighting
 */

function handleFirstTab(e) {
  if (e.keyCode === 9) { // the "I am a keyboard user" key
    document.body.classList.add('user-is-tabbing');
    window.removeEventListener('keydown', handleFirstTab);
  }
}

window.addEventListener('keydown', handleFirstTab);
 