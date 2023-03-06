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

