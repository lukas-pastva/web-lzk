function color (a, color) {
  a.style.background=color;
  //a.style.border=5px;
}

function vis (sub1, sub2, sub3, hod1, hod2, hod3) {

  if (hod1 == 1) { hod1 = "visible" } else { hod1 = "hidden" }
  if (hod2 == 1) { hod2 = "visible" } else { hod2 = "hidden" }
  if (hod3 == 1) { hod3 = "visible" } else { hod3 = "hidden" }

  sub1.style.visibility=hod1;
  sub2.style.visibility=hod2;
  sub3.style.visibility=hod3;
  
}


// Staticky web: triedenie galerie v prehliadaci (povodne POST order_by na server).
// 1 = autor A-Z, 2 = autor Z-A, 3 = datum vzostupne, 4 = datum zostupne (predvolene poradie z DB).
function zoradGaleriu(sposob) {
  var g = document.querySelector('.galeria');
  if (!g) return;
  var items = Array.prototype.slice.call(g.querySelectorAll('.galeria-polozka'));
  var key = function (el) {
    var i = parseInt(el.getAttribute('data-i'), 10);
    var a = (el.getAttribute('data-author') || '').toLowerCase();
    var d = el.getAttribute('data-date') || '';
    if (sposob == '1') return [a, i];
    if (sposob == '2') return [a, -i];
    if (sposob == '3') return [d, -i];
    return [d, i];
  };
  var desc = (sposob == '2' || sposob == '4');
  items.sort(function (x, y) {
    var kx = key(x), ky = key(y);
    if (kx[0] < ky[0]) return desc ? 1 : -1;
    if (kx[0] > ky[0]) return desc ? -1 : 1;
    return kx[1] - ky[1];
  });
  var n = items.length;
  items.forEach(function (el, idx) {
    var d = el.getAttribute('data-description') || '';
    el.setAttribute('data-description', d.replace(/\d+\/\d+$/, (idx + 1) + '/' + n));
    g.appendChild(el);
  });
  if (window.GLightbox) { GLightbox({selector: '.glightbox', touchNavigation: true, loop: true, zoomable: false, draggable: true, closeOnOutsideClick: false, moreLength: 0}); }
}
