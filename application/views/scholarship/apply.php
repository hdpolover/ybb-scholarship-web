<div class="container-fluid py-5 my-5">

	<div class="row justify-content-center">

		<div class="col-md-6 col-sm-12">

			<form action="<?= site_url('scholarship/applyScholarship');?>" method="POST" enctype="multipart/form-data">

				<div id="halaman-1">

					<div class="card border mb-4">

						<div class="card-body">

							<div class="mb-4">

								<h2 class="mb-0">Youth Break the Boundaries (YBB) Scholarship</h2>

							</div>

							<div class="mb-5 text-center">

								<p class="text-primary"><b>Remember !</b> You can do this process later,<br>if you still need to prepare the requirement data to apply scholarship program.<br>To access this form again, just login to your account and head to "scholarship" menu on your user page.</p>

							</div>
							<hr class="mb-4">
							<div class="mb-3">

								<p>We appreciate your interest in being a apart of Youth Break the Boundaries (YBB)
									scholarship Program! All applications will be reviewed. If your application is
									selected for the program, our team will be in contact with you.</p>

								<p>Before filling the form, make sure that you have read all the requirements and make
									sure that you are eligible for the scholarship. Read here <a
										href="https://bit.ly/jobdeskinterniys23-1"
										target="_blank">https://bit.ly/jobdeskinterniys23-1</a>
								</p>

								<p>Thank you very much for signifying your interest in joining the program.</p>

								<p>INSIPER THE NEXT!</p>

							</div>

							<div class="border-top d-flex justify-content-between pt-5">

								<a href="<?= site_url('user');?>" class="btn btn-primary"><i class="bi bi-person-circle"></i> Go to profile page</a>

								<button type="button" class="btn btn-primary" onclick="scholarFormNext(1,2)">I
									understand <i class="bi bi-vector-pen"></i></button>

							</div>

						</div>

					</div>

				</div>

				<div id="halaman-2" class="d-none">

					<div class="card border mb-4">

						<div class="card-header bg-primary py-3">

							<h4 class="card-header-title text-white">Registration Information</h4>

						</div>

						<div class="card-body">

							<div class="mb-3">
								<p>BEfore filling the form, please make sure that you will not miss any single

									information of Yout Break the Boundaries by following some accounts below:

									<ul>

										<li>@youtbreaktheboundaries: <a
												href="https://www.instagram.com/youthbreaktheboundaries/"
												target="_blank">https://www.instagram.com/youthbreaktheboundaries/</a>

										</li>

										<li>@ybbedu.id: <a href="https://www.instagram.com/ybbedu.id"
												target="_blank">https://www.instagram.com/ybbedu.id</a></li>

										<li>@istanbulyouthsummit: <a
												href="https://www.instagram.com/istanbulyouthsummit"
												target="_blank">https://www.instagram.com/istanbulyouthsummit</a></li>

										<li>@ybbkoreanschool: <a href="https://www.instagram.com/meysummit"
												target="_blank">https://www.instagram.com/meysummit</a></li>

										<li>@ybbturkishschool: <a href="https://www.instagram.com/cairoyouthsummit"
												target="_blank">https://www.instagram.com/turkishyouthsummit</a></li>

										<li>@ybbarabicschool: <a href="https://www.instagram.com/ybbarabicschool"
												target="_blank">https://www.instagram.com/ybbarabicschool</a></li>

										<li>@ybbenglishschool: <a href="https://www.instagram.com/ybbschool"
												target="_blank">https://www.instagram.com/ybbschool</a></li>

										<li>@ybbstore: <a href="https://www.instagram.com/ybbstore"
												target="_blank">https://www.instagram.com/ybbstore</a></li>

									</ul>

								</p>

								<p>Make sure you already have an account on YBB Apps:<br>

									For Android User: <a href="https://bit.ly/ybbAndroidApp"
										target="_blank">https://bit.ly/ybbAndroidApp</a><br>

									For Android User: <a href="https://bit.ly/YBBIOSApp"
										target="_blank">https://bit.ly/YBBIOSApp</a>

								</p>

								<p>

									Make sure that you have subscribed YBB Youtube official account:<br>

									Youtube: <a href="https://bit.ly/YouTUbeYBB">https://bit.ly/YouTUbeYBB</a>

								</p>

								<p>

									Make sure that you have joined YBB telegram official account:<br>

									Youtube: <a
										href="https://t.me/youthbreaktheboundaries">https://t.me/youthbreaktheboundaries</a>

								</p>

								<p>And don't yout surrondings miss this opportunity, then you have posted on your

									account (can be on your instagram story or instagram post or both</p>

							</div>

							<div class="border-top d-flex justify-content-between pt-5">

								<button type="button" class="btn btn-primary btn-sm" onclick="scholarFormPrev(2,1)"><i
										class="bi bi-caret-left"></i>

									Previous</button>

								<button type="button" class="btn btn-primary btn-sm"
									onclick="scholarFormNext(2,3)">Continue <i class="bi bi-caret-right"></i></button>

							</div>

						</div>

					</div>

				</div>

				<div id="halaman-3" class="d-none">

					<div class="card border mb-4">

						<div class="card-header bg-primary py-3">

							<h4 class="card-header-title text-white">Privacy Notice</h4>

						</div>

						<div class="card-body">

							<p>Youth Break the Boundaries (YBB) Internship Program is Organizing Committee respect the

								individual's right for privacy. YBB is committed to protecting the confidentiality of

								your personal information and it is bound to comply with the Data Privacy Rules.</p>

							<p>By using this online form, you are consenting to the collection and using the information

								in accordance with the Privacy Notice.</p>

							<p>In this online form, you will be required to input the data needed for your application

								as an applicant for YBB Internship program. This mayu include personal and/or sesitive

								personal information. YBB will not disclose the information stated of inofrmation you

								may wish to update.</p>

							<p>THis site has reasonable administrative, physical, and technical securty measures in

								place to help protect against the loss, misuse, and alteration of the onformation on our

								pssession. However, no method of transmission over the Internet or method of electronic

								storage is 100% secure.</p>

							<p>Inquires and complaint can be directed to admin of YBB at

								admin@youthbreaktheboundaries.com</p>

							<div class="border-top d-flex justify-content-between pt-5">

								<button type="button" class="btn btn-primary btn-sm" onclick="scholarFormPrev(3,2)"><i
										class="bi bi-caret-left"></i>

									Previous</button>

								<button type="button" class="btn btn-primary btn-sm"
									onclick="scholarFormNext(3,4)">Continue <i class="bi bi-caret-right"></i></button>

							</div>

						</div>

					</div>



				</div>

				<div id="halaman-4" class="d-none">

					<div class="card border mb-4">

						<div class="card-header bg-primary py-3">

							<h4 class="card-header-title text-white">Personal Information</h4>

						</div>

						<div class="card-body">

							<div class="alert alert-info">

								Please fill your personal information on this form honestly

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formFullName">Full Name <small
										class="text-danger">*</small></label>

								<input type="text" id="formFullName" class="form-control form-control-sm" name="full_name"
									value="<?= $this->session->userdata('name');?>" required>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formDateBirth">Date of Birth <small
										class="text-danger">*</small></label>
								<div class="input-group mb-3">
									<input type="date" id="formDateBirth" class="form-control form-control-sm" name="date_birth"
										placeholder="Your answer" aria-describedby="basic-formDateBirth" required>
									<span class="input-group-text" id="basic-formDateBirth"><i
											class="bi bi-calendar3"></i></span>
								</div>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formWhatsappNumber">Whatsapp Number <small
										class="text-danger">*</small></label>
								<div class="input-group mb-3">
									<span class="input-group-text" id="basic-formWhatsappNumber">+62</span>
									<input type="text" id="formWhatsappNumber" class="form-control form-control-sm"
										name="whatsapp_number" placeholder="Your answer"
										aria-describedby="basic-formWhatsappNumber" required>
								</div>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formCurrentAddress">Current Address <small
										class="text-danger">*</small></label>

								<textarea type="text" id="formCurrentAddress" class="form-control form-control-sm"
									name="current_address" rows="3" placeholder="Your answer" required></textarea>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formFieldOfStudy">Field of study <small
										class="text-danger">*</small></label>

								<input type="text" id="formFieldOfStudy" class="form-control form-control-sm" name="field_study"
									placeholder="Your answer" required>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formSchoolCollage">School or Collage <small
										class="text-danger">*</small></label>

								<input type="text" id="formSchoolCollage" class="form-control form-control-sm" name="school"
									placeholder="Your answer" required>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formCurrentGPA">Current GPA <small
										class="text-danger">*</small></label>

								<input type="text" id="formCurrentGPA" class="form-control form-control-sm" name="current_gpa"
									maxlength="4" placeholder="Your answer" required>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formSemester">Semester <small
										class="text-danger">*</small></label>

								<input type="text" id="formSemester" class="form-control form-control-sm" name="semester"
									placeholder="Your answer" required>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formAboutYourself">Tell us about yourself <small
										class="text-danger">*</small></label>

								<textarea type="text" id="formAboutYourself" class="form-control form-control-sm" name="about" rows="3"
									placeholder="Your answer" required></textarea>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formDreamComeTrue">What is your biggest dream and how
									will you make it come true? <small class="text-danger">*</small></label>

								<textarea type="text" id="formDreamComeTrue" class="form-control form-control-sm" name="dream_come"
									rows="3" placeholder="Your answer" required></textarea>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formVolunteer">Do you have any volunteering or
									organizational experiences? If yes, what are they? <small
										class="text-danger">*</small></label>

								<textarea type="text" id="formVolunteer" class="form-control form-control-sm" name="volunteer" rows="3"
									placeholder="Your answer" required></textarea>

							</div>

							<div class="border-top d-flex justify-content-between pt-5">

								<button type="button" class="btn btn-primary btn-sm" onclick="scholarFormPrev(4,3)"><i
										class="bi bi-caret-left"></i>

									Previous</button>

								<button type="button" class="btn btn-primary btn-sm"
									onclick="scholarFormNext(4,5)">Continue <i class="bi bi-caret-right"></i></button>

							</div>

						</div>

					</div>



				</div>

				<div id="halaman-5" class="d-none">

					<div class="card border mb-4">

						<div class="card-header bg-primary py-3">

							<h4 class="card-header-title text-white">Approval Section</h4>

						</div>

						<div class="card-body">

							<div class="mb-3 pb-4 border-bottom">

								<p>BEfore filling the form, please make sure that you will not miss any single

									information of Yout Break the Boundaries by following some accounts below:

									<ul>

										<li>@youtbreaktheboundaries: <a
												href="https://www.instagram.com/youthbreaktheboundaries/"
												target="_blank">https://www.instagram.com/youthbreaktheboundaries/</a>

										</li>

										<li>@ybbedu.id: <a href="https://www.instagram.com/ybbedu.id"
												target="_blank">https://www.instagram.com/ybbedu.id</a></li>

										<li>@istanbulyouthsummit: <a
												href="https://www.instagram.com/istanbulyouthsummit"
												target="_blank">https://www.instagram.com/istanbulyouthsummit</a></li>

										<li>@ybbkoreanschool: <a href="https://www.instagram.com/meysummit"
												target="_blank">https://www.instagram.com/meysummit</a></li>

										<li>@ybbturkishschool: <a href="https://www.instagram.com/cairoyouthsummit"
												target="_blank">https://www.instagram.com/turkishyouthsummit</a></li>

										<li>@ybbarabicschool: <a href="https://www.instagram.com/ybbarabicschool"
												target="_blank">https://www.instagram.com/ybbarabicschool</a></li>

										<li>@ybbenglishschool: <a href="https://www.instagram.com/ybbschool"
												target="_blank">https://www.instagram.com/ybbschool</a></li>

										<li>@ybbstore: <a href="https://www.instagram.com/ybbstore"
												target="_blank">https://www.instagram.com/ybbstore</a></li>

									</ul>

								</p>

								<p>Make sure you already have an account on YBB Apps:<br>

									For Android User: <a href="https://bit.ly/ybbAndroidApp"
										target="_blank">https://bit.ly/ybbAndroidApp</a><br>

									For Android User: <a href="https://bit.ly/YBBIOSApp"
										target="_blank">https://bit.ly/YBBIOSApp</a>

								</p>

								<p>

									Make sure that you have subscribed YBB Youtube official account:<br>

									Youtube: <a href="https://bit.ly/YouTUbeYBB">https://bit.ly/YouTUbeYBB</a>

								</p>

								<p>

									Make sure that you have joined YBB telegram official account:<br>

									Youtube: <a
										href="https://t.me/youthbreaktheboundaries">https://t.me/youthbreaktheboundaries</a>

								</p>

								<p>And don't yout surrondings miss this opportunity, then you have posted on your

									account (can be on your instagram story or instagram post or both</p>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label for="followedAccount" class="js-file-attach form-label"
									data-hs-file-attach-options='{"textTarget": "[for=\"customFile\"]", "allowTypes": [".png", ".jpeg", ".jpg"]}'>Upload

									the proof that you already have followed those accounts <small
										class="text-danger">*</small></label>

								<input class="form-control form-control-sm" type="file" id="followedAccount" name="upload_follow"
									accept="image/*" required>
								<small class="text-secondary">Upload jpg, png, or jpeg file</small>
							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label for="registerApp" class="js-file-attach form-label"
									data-hs-file-attach-options='{"textTarget": "[for=\"customFile\"]", "allowTypes": [".png", ".jpeg", ".jpg"]}'>Upload

									the proof that you already have an account on YBB Apps <small
										class="text-danger">*</small></label>

								<input class="form-control form-control-sm" type="file" id="registerApp" name="upload_apps"
									accept="image/*" required>
								<small class="text-secondary">Upload jpg, png, or jpeg file</small>
							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label for="subscribedYoutube" class="js-file-attach form-label"
									data-hs-file-attach-options='{"textTarget": "[for=\"customFile\"]", "allowTypes": [".png", ".jpeg", ".jpg"]}'>Upload

									the proof that you have subscribed YBB Youtube official account <small
										class="text-danger">*</small></label>

								<input class="form-control form-control-sm" type="file" id="subscribedYoutube" name="upload_youtube"
									accept="image/*" required>
								<small class="text-secondary">Upload jpg, png, or jpeg file</small>
							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label for="joinedTelegram" class="js-file-attach form-label"
									data-hs-file-attach-options='{"textTarget": "[for=\"customFile\"]", "allowTypes": [".png", ".jpeg", ".jpg"]}'>Upload

									the proof that you have joined YBB telegram official account <small
										class="text-danger">*</small></label>

								<input class="form-control form-control-sm" type="file" id="joinedTelegram" name="upload_telegram"
									accept="image/*" required>
								<small class="text-secondary">Upload jpg, png, or jpeg file</small>
							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label for="sharedInstagram" class="js-file-attach form-label"
									data-hs-file-attach-options='{"textTarget": "[for=\"customFile\"]", "allowTypes": [".png", ".jpeg", ".jpg"]}'>Upload

									the proof that you have shared this information on your instagram story or instagram

									post or both <small class="text-danger">*</small></label>

								<input class="form-control form-control-sm" type="file" id="sharedInstagram" name="upload_story"
									accept="image/*" required>
								<small class="text-secondary">Upload jpg, png, or jpeg file</small>
							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label for="taggedFriends" class="js-file-attach form-label"
									data-hs-file-attach-options='{"textTarget": "[for=\"customFile\"]", "allowTypes": [".png", ".jpeg", ".jpg"]}'>Upload

									the proof that you have tagged 5 of your friends on the post <small
										class="text-danger">*</small></label>

								<input class="form-control form-control-sm" type="file" id="taggedFriends" name="upload_tags"
									accept="image/*" required>
								<small class="text-secondary">Upload jpg, png, or jpeg file</small>
							</div>

							<div class="mb-3">

								<!-- Checkbox -->

								<div class="form-check mb-3">

									<input type="checkbox" id="haveRead" class="form-check-input" required>

									<label class="form-check-label" for="haveRead">i have read and agree <small class="text-danger">*</small></label>

								</div>

								<!-- End Checkbox -->

								<!-- Checkbox -->

								<div class="form-check mb-3">

									<input type="checkbox" id="haveTagged" class="form-check-input" required>

									<label class="form-check-label" for="haveTagged">i have tagged and mentioned 5 of

										my friends on YBB instagram post <small class="text-danger">*</small></label>

								</div>

								<!-- End Checkbox -->

							</div>

							<div class="border-top d-flex justify-content-between pt-5">

								<button type="button" class="btn btn-primary btn-sm" onclick="scholarFormPrev(5,4)"><i
										class="bi bi-caret-left"></i>

									Previous</button>

								<button type="submit" class="btn btn-primary btn-sm">Submit <i
										class="bi bi-caret-right"></i></button>

							</div>

						</div>

					</div>

				</div>

			</form>

		</div>

	</div>

</div>





<script>
	function scholarFormNext(cur, to) {
		if (cur == 4) {
			var formFullName = document.getElementById('formFullName').value;
			var formDateBirth = document.getElementById('formDateBirth').value;
			var formWhatsappNumber = document.getElementById('formWhatsappNumber').value;
			var formCurrentAddress = document.getElementById('formCurrentAddress').value;
			var formFieldOfStudy = document.getElementById('formFieldOfStudy').value;
			var formSchoolCollage = document.getElementById('formSchoolCollage').value;
			var formCurrentGPA = document.getElementById('formCurrentGPA').value;
			var formSemester = document.getElementById('formSemester').value;
			var formAboutYourself = document.getElementById('formAboutYourself').value;
			var formDreamComeTrue = document.getElementById('formDreamComeTrue').value;
			var formVolunteer = document.getElementById('formVolunteer').value;

			if (formFullName == '' || formDateBirth == '' || formWhatsappNumber == '' || formCurrentAddress == '' ||
				formFieldOfStudy == '' || formSchoolCollage == '' || formCurrentGPA == '' || formSemester == '' ||
				formAboutYourself == '' || formDreamComeTrue == '' || formVolunteer == '') {

				Swal.fire({
					text: 'Please complete form on this page first !',
					icon: 'warning',
				})
			} else {
				$('#halaman-' + to).removeClass('d-none');
				$('#halaman-' + cur).addClass('d-none');
			}
		} else {
			$('#halaman-' + to).removeClass('d-none');
			$('#halaman-' + cur).addClass('d-none');
		}

	}



	function scholarFormPrev(cur, to) {

		$('#halaman-' + to).removeClass('d-none');
		$('#halaman-' + cur).addClass('d-none');

	}

	$(document).ready(function () {
		$("#formFullName,#formFieldOfStudy").keydown(function (event) {
			var inputValue = event.which;
			// allow letters and whitespaces only.
			if (!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0 &&
					inputValue != 8 && inputValue != 37 && inputValue != 39)) {
				event.preventDefault();
			}
		});
	});

	$("#formWhatsappNumber").keyup(function () {
		var value = $(this).val();
		value = value.replace(/^(0*)/, "");
		$(this).val(value);
	});

	// Restricts input for the given textbox to the given inputFilter.
	function setInputFilter(textbox, inputFilter) {
		["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function (
			event) {
			textbox.addEventListener(event, function () {
				if (inputFilter(this.value)) {
					this.oldValue = this.value;
					this.oldSelectionStart = this.selectionStart;
					this.oldSelectionEnd = this.selectionEnd;
				} else if (this.hasOwnProperty("oldValue")) {
					this.value = this.oldValue;
					this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
				} else {
					this.value = "";
				}
			});
		});
	}

	// Install input filters Tambah Hp Pegawai.
	setInputFilter(document.getElementById("formWhatsappNumber"), function (value) {
		return /^\d*$/.test(value);
	});

</script>
