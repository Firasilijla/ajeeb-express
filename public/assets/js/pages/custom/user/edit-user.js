"use strict";

// Class definition
var KTUserEdit = function () {
	// Base elements
	var avatar;
	var avatar2;
	var avatar3;
	var avatar4;
	var avatar5;
	var avatar6;
	var initUserForm = function () {
		avatar = new KTImageInput('kt_user_edit_avatar');
		avatar2 = new KTImageInput('kt_user_edit_avatar2');
		avatar3 = new KTImageInput('kt_user_edit_avatar3');
		avatar4 = new KTImageInput('kt_user_edit_avatar4');
		avatar5 = new KTImageInput('kt_user_edit_avatar5');
		avatar6 = new KTImageInput('kt_user_edit_avatar6');
	}

	return {
		// public functions
		init: function () {
			initUserForm();
		}
	};
}();

jQuery(document).ready(function () {
	KTUserEdit.init();
});
