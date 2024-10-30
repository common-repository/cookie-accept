// Variables
cookieNotice = document.getElementById('cookie-consent-notice');
cbContain = document.getElementById('cookie_accept_live_preview_title');
cbPreview = document.getElementById('cookie_accept_live_preview');
accColorSets = document.getElementById('accent_color_sets');
boxColorSets = document.getElementById('box_color_sets');
consentModes = document.getElementsByClassName('cookie_a_mode');


// Proof that javascript is loaded by adding specified class (required)
document.getElementById('cookie-accept-wrapper').classList.add('detailed');

// Save current Tab with cookie, and focus function
tabHeads = document.getElementById('tabs-head').children;
for (var i = 0; i < tabHeads.length; i++) {
	tabHeads[i].addEventListener('keydown', function(e) {
		tabBodyFirstContent = this.dataset.focus;
		if (e.key == 'Enter') {
		    e.preventDefault();
		}
		if (e.keyCode == 32) {
		    e.preventDefault();
		}
	});
}


// Save current Tab with cookie, and focus function
autoSkip = document.getElementsByClassName('auto-skip');
for (var i = 0; i < autoSkip.length; i++) {
	autoSkip[i].addEventListener('focus', function() {
		targetFocus = this.dataset.focus;
		document.getElementById(targetFocus).focus();
		console.log("triggered");
	});
}


// Preview connect for Style Position
cookieStylesContainer = document.getElementsByClassName('cookie-accept-style');
cookieStyles = document.getElementsByClassName('cookie_a_style');
boxLayoutSets = document.getElementById('consent-box-layout-settings');
for (var i = 0; i < cookieStyles.length; i++) {
	cookieStyles[i].addEventListener('click', function () {
		for (var j = 0; j < cookieStylesContainer.length; j++) {
			cookieStylesContainer[j].classList.remove('selected');
			cookieNotice.classList.remove("down-left", "down-right", "fullwidth");
			boxLayoutSets.classList.remove("down-left", "down-right", "fullwidth");
		}			
		this.parentElement.parentElement.classList.add('selected');
		thisClass = this.value;
		cookieNotice.classList.add(thisClass);
		boxLayoutSets.classList.add(thisClass);
	});
	
}


// Preview connect for Content Align 
cookieAlignContainer = document.getElementsByClassName('cookie-accept-align');
cookieAlign = document.getElementsByClassName('cookie_a_align');
for (var i = 0; i < cookieAlign.length; i++) {
	cookieAlign[i].addEventListener('click', function () {
		for (var j = 0; j < cookieAlignContainer.length; j++) {
			cookieAlignContainer[j].classList.remove('selected');
			cookieNotice.classList.remove("left", "center", "right");
		}			
		this.parentElement.parentElement.classList.add('selected');
		cookieNotice.classList.add(this.value);
	});
	
}


// Preview connect for Use Content Icon checkbox
optionForm = document.getElementById('cookie-accept-options-form');
useIcon = document.getElementById('cookie_accept_icon_use');
previewIcon = document.getElementById('consent-icon');
useIcon.addEventListener("click", function () {
	if (useIcon.checked) {
		optionForm.classList.add('icon');
		previewIcon.classList.add('on');
	} else {
		optionForm.classList.remove('icon');
		previewIcon.classList.remove('on');
	}
});


// Preview connect for Content Icon 
cookieIconContainer = document.getElementsByClassName('cookie-accept-icon');
cookieIcon = document.getElementsByClassName('cookie_a_icon');
for (var i = 0; i < cookieIcon.length; i++) {
	cookieIcon[i].addEventListener('click', function () {
		for (var j = 0; j < cookieIconContainer.length; j++) {
			cookieIconContainer[j].classList.remove('selected');
		}			
		this.parentElement.parentElement.classList.add('selected');
		previewIcon.innerHTML = this.parentElement.children[1].outerHTML;
	});
	
}


// Preview connect for Style Button 
cookieBtnStylesContainer = document.getElementsByClassName('cookie-accept-btn-style');
cookieBtnStyles = document.getElementsByClassName('cookie_a_btn_style');
cookieBtnAcptId = document.getElementById('accept-cookies');
for (var i = 0; i < cookieBtnStyles.length; i++) {
	cookieBtnStyles[i].addEventListener('click', function () {
		for (var j = 0; j < cookieBtnStylesContainer.length; j++) {
			cookieBtnStylesContainer[j].classList.remove('selected');
			cookieBtnAcptId.classList.remove("boxround", "rounded", "boxed", "plain");
		}			
		this.parentElement.parentElement.classList.add('selected');
		cookieBtnAcptId.classList.add(this.value);
		// console.log(this.value);
	});
	
}


// About Privacy Policy Link
ac_pp_cont = document.getElementById('privacy-policy-link-container'); // this element exist or not exist, onload so ..
if (ac_pp_cont) {
	ac_pp_cont.children[0].addEventListener('click', function(e) {
		e.preventDefault(); // make link does not work. But still there
	});
}

// Preview connect for Color Mode
for (var i = 0; i < consentModes.length; i++) {
	consentModes[i].addEventListener('click', function () {
		thisVal = this.value;
		cookieNotice.classList.remove( "dark", "light" );
		cookieNotice.classList.add(thisVal);
		accColorSets.classList.remove( "dark", "light" );
		accColorSets.classList.add(thisVal);
		boxColorSets.classList.remove( "dark", "light" );
		boxColorSets.classList.add(thisVal);
	});
}

// add class on preview box on first page load.
if (cbPreview.checked == true) {
	cookieNotice.classList.add("preview");
}

// add class on preview box on click.
cbPreview.addEventListener('click', function() {
	// access properties using this keyword
	if ( this.checked ) {
		// Returns true if checked
		cookieNotice.classList.add("preview");
	} else {
	    // Returns false if not checked
		cookieNotice.classList.remove("preview");
	}
});

// accept cookie click
document.getElementById("accept-cookies").addEventListener("click", function () {
	cookieNotice.classList.add("accepted");
	cbContain.classList.add("load");
	setTimeout(function(){ 
		cookieNotice.classList.remove("preview");
		cbPreview.checked = false;
	    cookieNotice.classList.remove("accepted");
	    cbContain.classList.remove("load");
	}, 2000);
});


// Show Hide Privacy Policy Options
ac_pp_show = document.getElementById('cookie_accept_policy_use');
ac_pp_cont_set = document.getElementById('privacy-policy-settings').classList;
ac_pp_show.addEventListener("click", function () {
	if (ac_pp_show.checked) {
		ac_pp_cont_set.add('on');
	} else {
		ac_pp_cont_set.remove('on');
	}
});

