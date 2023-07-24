"use strict";

// Class Definition
var KTAddUser = function () {
	// Private Variables
	var _wizardEl;
	var _formEl;
	var _wizard;
	var _avatar;
	var _validations = [];

	// Private Functions
	var _initWizard = function () {
		// Initialize form wizard
		_wizard = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: true  // allow step clicking
		});

		// Validation before going to next page
		_wizard.on('beforeNext', function (wizard) {
			_validations[wizard.getStep() - 1].validate().then(function(status) {
		        if (status == 'Valid') {
					_wizard.goNext();
					KTUtil.scrollTop();
				} else {
					Swal.fire({
		                text: "عذرا الحقول غير ممتلئة بشكل صحيح",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "طيب ، حصلت عليه!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-light"
						}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}
		    });

			_wizard.stop();  // Don't go to the next step
		});

		// Change Event
		_wizard.on('change', function (wizard) {
			KTUtil.scrollTop();
		});
	}

	var _initValidations = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/

		// Validation Rules For Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					name: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					},
					asker_id: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					},
					bod: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					},
					phone: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					},
					address_home: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					},
					address_state: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					},	building_type: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					},	leading_license: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					},	type: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					}
					,	password: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					}
					,	cpassword: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					},	identity: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					// Step 2
					marital_status: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					},
					boys_count: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					},
					family_count: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					},
					illness_state: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					},
					illness_description: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					mosq_name: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					},
					invitation_degree: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					},
					date_biaa: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					},
					katiba: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					},
					asker_degree: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					},
					spesific_invitation: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					},
					grand_phone: {
						validators: {
							notEmpty: {
								message: 'هذا الحقل مطلوب  '
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));
	}

	var _initAvatar = function () {
		_avatar = new KTImageInput('kt_user_add_avatar');
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard');
			_formEl = KTUtil.getById('kt_form');

			_initWizard();
			_initValidations();
			_initAvatar();
		}
	};
}();

jQuery(document).ready(function () {
	KTAddUser.init();
});
