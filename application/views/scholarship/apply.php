<div class="container-fluid py-5 my-5">

	<div class="row justify-content-center">

		<div class="col-md-6 col-sm-12">

			<form action="<?= site_url('scholarship/applyScholarship');?>" method="POST" enctype="multipart/form-data"
				class="js-validate needs-validation" novalidate>

				<div id="halaman-1">

					<div class="card border mb-4">

						<div class="card-body">

							<div class="mb-4">

								<h2 class="mb-0">Youth Break the Boundaries (YBB) Scholarship</h2>

							</div>

							<div class="mb-5 text-center">

								<p class="text-primary"><b>Perhatian!</b> Kamu dapat melakukan proses pendaftaran
									nanti,<br> jika berkas atau informasi yang dibutuhkan belum lengkap.<br> Untuk
									mengakses halaman ini, login ke akunmu dan mengarah ke menu "Beasiswa".</p>

							</div>
							<hr class="mb-4">
							<div class="mb-3">

								<p>Kami mengapresiasi minat kamu untuk menjadi bagian dari Youth Break the Boundaries (YBB)
									scholarship Program! Semua aplikasi beasiswa akan direview. Jika aplikasimu lolos terpilih untuk program kami, tim kami akan menghubungimu.</p>

								<p>Sebelum mengisi formulir, pastikan kamu sudah membaca semua persyaratan dan pastikan juga kamu masuk dalam kategori penerima beasiswa.
								</p>

								<p>Terima kasih banyak.</p>

								<p>INSIPER THE NEXT!</p>

							</div>

							<div class="border-top d-flex justify-content-between pt-5">

								<a href="<?= site_url('user');?>" class="btn btn-primary"><i
										class="bi bi-person-circle"></i> Kembali ke halaman profil</a>

								<button type="button" class="btn btn-primary" onclick="scholarFormNext(1,2)">Saya
									mengerti <i class="bi bi-vector-pen"></i></button>

							</div>

						</div>

					</div>

				</div>

				<div id="halaman-2" class="d-none">

					<div class="card border mb-4">

						<div class="card-header bg-primary py-3">

							<h4 class="card-header-title text-white">Informasi pendaftaran</h4>

						</div>

						<div class="card-body">

							<div class="mb-3">
								<p>Sebelum mengisi formulir, harap pastikan telah mengikuti akun media sosial dibawah
									ini:

									<ul>

										<li>@youthbreaktheboundaries: <a
												href="https://www.instagram.com/youthbreaktheboundaries/"
												target="_blank">https://www.instagram.com/youthbreaktheboundaries</a>

										</li>

										<li>@ybbedu.id: <a href="https://www.instagram.com/ybbedu.id/"
												target="_blank">https://www.instagram.com/ybbedu.id</a></li>

										<li>@istanbulyouthsummit: <a
												href="https://www.instagram.com/istanbulyouthsummit/"
												target="_blank">https://www.instagram.com/istanbulyouthsummit</a></li>

										<li>@meysummit: <a href="https://www.instagram.com/meysummit/"
												target="_blank">https://www.instagram.com/meysummit</a></li>

										<li>@cairoyouthsummit: <a href="https://www.instagram.com/cairoyouthsummit"
												target="_blank">https://www.instagram.com/cairoyouthsummit</a></li>

										<li>@ybbenglishschool: <a href="https://www.instagram.com/ybbenglishschool"
												target="_blank">https://www.instagram.com/ybbenglishschool/</a></li>

										<li>@ybbturkishschool: <a href="https://www.instagram.com/ybbturkishschool"
												target="_blank">https://www.instagram.com/ybbturkishschool</a></li>

										<li>@ybbarabicschool: <a href="https://www.instagram.com/ybbarabicschool"
												target="_blank">https://www.instagram.com/ybbarabicschool</a></li>

										<li>@ybbkoreanschool: <a href="https://www.instagram.com/ybbkoreanschool"
												target="_blank">https://www.instagram.com/ybbkoreanschool</a></li>

										<li>@ybbstore: <a href="https://www.instagram.com/ybbstore"
												target="_blank">https://www.instagram.com/ybbstore</a></li>

										<li>@dutapelajar.ybb: <a href="https://instagram.com/dutapelajar.ybb"
												target="_blank">https://instagram.com/dutapelajar.ybb</a></li>

									</ul>

								</p>

								<p>Pastikan telah mendaftarkan diri di aplikasi YBB dibawah ini:<br>

									Pengguna android: <a href="https://bit.ly/ybbAndroidApp"
										target="_blank">https://bit.ly/ybbAndroidApp</a><br>

									Pengguna Iphone: <a href="https://bit.ly/YBBiOSApps"
										target="_blank">https://bit.ly/YBBiOSApps</a>

								</p>

								<p>

									Pastikan telah subscribe pada akun youtube YBB kami:<br>

									Youtube: <a href="https://bit.ly/YouTubeYBB">https://bit.ly/YouTubeYBB</a>

								</p>

								<p>

									Pastikan telah bergabung pada group Telegram:<br>

									Telegram: <a
										href="https://t.me/youthbreaktheboundaries">https://t.me/youthbreaktheboundaries</a>

								</p>

								<p>Dan pastikan telah menyebarkan informasi beasiswa ini, terutama pada postingan
									instagram dan status instagram kamu.</p>

								<p>Upload Twibbon di feed dan story Instagram kamu dan jangan lupa tag ig
									@youthbreaktheboundaries dengan caption tujuan kamu "Mengapa Ingin Mendaftar
									Beasiswa YBB". Download twibbon disini: <a href="https://bit.ly/twibbonBeasiswaPemudaYBB" target="_blank">https://bit.ly/twibbonBeasiswaPemudaYBB</a></p>

							</div>

							<div class="border-top d-flex justify-content-between pt-5">

								<button type="button" class="btn btn-primary btn-sm" onclick="scholarFormPrev(2,1)"><i
										class="bi bi-caret-left"></i>

									Sebelumnya</button>

								<button type="button" class="btn btn-primary btn-sm"
									onclick="scholarFormNext(2,3)">Selanjutnya <i
										class="bi bi-caret-right"></i></button>

							</div>

						</div>

					</div>

				</div>

				<div id="halaman-3" class="d-none">

					<div class="card border mb-4">

						<div class="card-header bg-primary py-3">

							<h4 class="card-header-title text-white">Kebijakan YBB</h4>

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

									Sebelumnya</button>

								<button type="button" class="btn btn-primary btn-sm"
									onclick="scholarFormNext(3,4)">Selanjutnya <i
										class="bi bi-caret-right"></i></button>

							</div>

						</div>

					</div>



				</div>

				<div id="halaman-4" class="d-none">

					<div class="card border mb-4">

						<div class="card-header bg-primary py-3">

							<h4 class="card-header-title text-white">Informasi pribadi</h4>

						</div>

						<div class="card-body">

							<div class="alert alert-info">

								Mohon isikan informasi dibawah ini dengan benar

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formFullName">Nama lengkap <small
										class="text-danger">*</small></label>

								<input type="text" id="formFullName" class="form-control form-control-sm"
									name="full_name" value="<?= $this->session->userdata('name');?>" required>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formDateBirth">Tanggal lahir <small
										class="text-danger">*</small></label>
								<div class="input-group mb-3">
									<input type="date" id="formDateBirth" class="form-control form-control-sm"
										name="date_birth" placeholder="Your answer"
										aria-describedby="basic-formDateBirth" required>
									<span class="input-group-text" id="basic-formDateBirth"><i
											class="bi bi-calendar3"></i></span>
								</div>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formWhatsappNumber">WhatsApp <small
										class="text-danger">*</small></label>
								<div class="input-group mb-3">
									<span class="input-group-text" id="basic-formWhatsappNumber">+62</span>
									<input type="text" id="formWhatsappNumber" class="form-control form-control-sm"
										name="whatsapp_number" placeholder="Your answer"
										aria-describedby="basic-formWhatsappNumber" required>
								</div>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formCurrentAddress">Alamat <small
										class="text-danger">*</small></label>

								<textarea type="text" id="formCurrentAddress" class="form-control form-control-sm"
									name="current_address" rows="3" placeholder="Your answer" required></textarea>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formFieldOfStudy">Jurusan/Prodi/Fakultas <small
										class="text-danger">*</small></label>

								<input type="text" id="formFieldOfStudy" class="form-control form-control-sm"
									name="field_study" placeholder="Your answer" required>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formSchoolCollage">Sekolah / Universitas<small
										class="text-danger">*</small></label>

								<input type="text" id="formSchoolCollage" class="form-control form-control-sm"
									name="school" placeholder="Your answer" required>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formCurrentGPA">GPA Saat ini <small
										class="text-danger">*</small></label>

								<input type="text" id="formCurrentGPA"
									class="js-input-mask form-control form-control-sm" name="current_gpa"
									placeholder="Your answer" required data-hs-mask-options='{ "mask": "0.00" }'>
								<small class="text-danger">Format GPA 0.00 (3.98)</small>
							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formSemester">Semester <small
										class="text-danger">*</small></label>

								<!-- <input type="number" id="formSemester" class="form-control form-control-sm"
									name="semester" placeholder="Your answer" required> -->
								<!-- Quantity -->
								<div class="quantity-counter">
									<div class="js-quantity-counter row align-items-center">
										<div class="col">
											<!-- <span class="d-block small">Select quantity</span> -->
											<input class="js-result form-control form-control-quantity-counter"
												id="formSemester" name="semester" type="text" value="1">
										</div>
										<!-- End Col -->

										<div class="col-auto">
											<a class="js-minus btn btn-outline-secondary btn-xs btn-icon rounded-circle"
												href="javascript:;">
												<svg width="8" height="2" viewBox="0 0 8 2" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M0 1C0 0.723858 0.223858 0.5 0.5 0.5H7.5C7.77614 0.5 8 0.723858 8 1C8 1.27614 7.77614 1.5 7.5 1.5H0.5C0.223858 1.5 0 1.27614 0 1Z"
														fill="currentColor" />
												</svg>
											</a>
											<a class="js-plus btn btn-outline-secondary btn-xs btn-icon rounded-circle"
												href="javascript:;">
												<svg width="8" height="8" viewBox="0 0 8 8" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M4 0C4.27614 0 4.5 0.223858 4.5 0.5V3.5H7.5C7.77614 3.5 8 3.72386 8 4C8 4.27614 7.77614 4.5 7.5 4.5H4.5V7.5C4.5 7.77614 4.27614 8 4 8C3.72386 8 3.5 7.77614 3.5 7.5V4.5H0.5C0.223858 4.5 0 4.27614 0 4C0 3.72386 0.223858 3.5 0.5 3.5H3.5V0.5C3.5 0.223858 3.72386 0 4 0Z"
														fill="currentColor" />
												</svg>
											</a>
										</div>
										<!-- End Col -->
									</div>
									<!-- End Row -->
								</div>
								<!-- End Quantity -->

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formAboutYourself">Ceritakan tentang dirimu <small
										class="text-danger">*</small></label>

								<textarea type="text" id="formAboutYourself" class="form-control form-control-sm"
									name="about" rows="3" placeholder="Your answer" required></textarea>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formDreamComeTrue">Apa mimpi terbesarmu dan bagaimana
									caramu untuk mewujudkannya? <small class="text-danger">*</small></label>

								<textarea type="text" id="formDreamComeTrue" class="form-control form-control-sm"
									name="dream_come" rows="3" placeholder="Your answer" required></textarea>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label class="form-label" for="formVolunteer">Apakah kamu mempunyai pengalaman
									organisasi atau relawan? jika iya, ceritakan. <small
										class="text-danger">*</small></label>

								<textarea type="text" id="formVolunteer" class="form-control form-control-sm"
									name="volunteer" rows="3" placeholder="Your answer" required></textarea>

							</div>

							<div class="border-top d-flex justify-content-between pt-5">

								<button type="button" class="btn btn-primary btn-sm" onclick="scholarFormPrev(4,3)"><i
										class="bi bi-caret-left"></i>

									Sebelumnya</button>

								<button type="button" class="btn btn-primary btn-sm"
									onclick="scholarFormNext(4,5)">Selanjutnya <i
										class="bi bi-caret-right"></i></button>

							</div>

						</div>

					</div>



				</div>

				<div id="halaman-5" class="d-none">

					<div class="card border mb-4">

						<div class="card-header bg-primary py-3">

							<h4 class="card-header-title text-white">Berkas kebutuhan</h4>

						</div>

						<div class="card-body">

							<div class="mb-3 pb-4 border-bottom">

								<p>Sebelum mengisi formulir, harap pastikan telah mengikuti akun media sosial dibawah
									ini:

									<ul>

										<li>@youthbreaktheboundaries: <a
												href="https://www.instagram.com/youthbreaktheboundaries/"
												target="_blank">https://www.instagram.com/youthbreaktheboundaries</a>

										</li>

										<li>@ybbedu.id: <a href="https://www.instagram.com/ybbedu.id/"
												target="_blank">https://www.instagram.com/ybbedu.id</a></li>

										<li>@istanbulyouthsummit: <a
												href="https://www.instagram.com/istanbulyouthsummit/"
												target="_blank">https://www.instagram.com/istanbulyouthsummit</a></li>

										<li>@meysummit: <a href="https://www.instagram.com/meysummit/"
												target="_blank">https://www.instagram.com/meysummit</a></li>

										<li>@cairoyouthsummit: <a href="https://www.instagram.com/cairoyouthsummit"
												target="_blank">https://www.instagram.com/cairoyouthsummit</a></li>

										<li>@ybbenglishschool: <a href="https://www.instagram.com/ybbenglishschool"
												target="_blank">https://www.instagram.com/ybbenglishschool/</a></li>

										<li>@ybbturkishschool: <a href="https://www.instagram.com/ybbturkishschool"
												target="_blank">https://www.instagram.com/ybbturkishschool</a></li>

										<li>@ybbarabicschool: <a href="https://www.instagram.com/ybbarabicschool"
												target="_blank">https://www.instagram.com/ybbarabicschool</a></li>

										<li>@ybbkoreanschool: <a href="https://www.instagram.com/ybbkoreanschool"
												target="_blank">https://www.instagram.com/ybbkoreanschool</a></li>

										<li>@ybbstore: <a href="https://www.instagram.com/ybbstore"
												target="_blank">https://www.instagram.com/ybbstore</a></li>

										<li>@dutapelajar.ybb: <a href="https://instagram.com/dutapelajar.ybb"
												target="_blank">https://instagram.com/dutapelajar.ybb</a></li>

									</ul>

								</p>

								<p>Pastikan telah mendaftarkan diri di aplikasi YBB dibawah ini:<br>

									Pengguna android: <a href="https://bit.ly/ybbAndroidApp"
										target="_blank">https://bit.ly/ybbAndroidApp</a><br>

									Pengguna Iphone: <a href="https://bit.ly/YBBiOSApps"
										target="_blank">https://bit.ly/YBBiOSApps</a>

								</p>

								<p>

									Pastikan telah subscribed pada akun youtube YBB kami:<br>

									Youtube: <a href="https://bit.ly/YouTubeYBB">https://bit.ly/YouTubeYBB</a>

								</p>

								<p>

									Pastikan telah bergabung pada group Telegram:<br>

									Telegram: <a
										href="https://t.me/youthbreaktheboundaries">https://t.me/youthbreaktheboundaries</a>

								</p>

								<p>Dan pastikan telah menyebarkan informasi beasiswa ini, terutama pada postingan
									instagram dan status instagram kamu</p>

								<p>Upload Twibbon di feed dan story Instagram kamu dan jangan lupa tag ig
									@youthbreaktheboundaries dengan caption tujuan kamu "Mengapa Ingin Mendaftar
									Beasiswa YBB". Download twibbon disini: <a href="https://bit.ly/twibbonBeasiswaPemudaYBB" target="_blank">https://bit.ly/twibbonBeasiswaPemudaYBB</a></p>

							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label for="followedAccount" class="js-file-attach form-label"
									data-hs-file-attach-options='{"textTarget": "[for=\"customFile\"]", "allowTypes": [".png", ".jpeg", ".jpg"]}'>Bukti
									telah mengikuti sosial media kami <small class="text-danger">*</small></label>

								<input class="form-control form-control-sm" type="file" id="followedAccount"
									name="upload_follow" accept="image/*" required>
								<small class="text-secondary">Unggah jpg, png, or jpeg file</small>
							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label for="registerApp" class="js-file-attach form-label"
									data-hs-file-attach-options='{"textTarget": "[for=\"customFile\"]", "allowTypes": [".png", ".jpeg", ".jpg"]}'>Bukti
									telah mempunyai akun di aplikasi YBB <small class="text-danger">*</small></label>

								<input class="form-control form-control-sm" type="file" id="registerApp"
									name="upload_apps" accept="image/*" required>
								<small class="text-secondary">Unggah jpg, png, or jpeg file</small>
							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label for="subscribedYoutube" class="js-file-attach form-label"
									data-hs-file-attach-options='{"textTarget": "[for=\"customFile\"]", "allowTypes": [".png", ".jpeg", ".jpg"]}'>Bukti
									telah subscribed akun youtube official YBB <small
										class="text-danger">*</small></label>

								<input class="form-control form-control-sm" type="file" id="subscribedYoutube"
									name="upload_youtube" accept="image/*" required>
								<small class="text-secondary">Unggah jpg, png, or jpeg file</small>
							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label for="joinedTelegram" class="js-file-attach form-label"
									data-hs-file-attach-options='{"textTarget": "[for=\"customFile\"]", "allowTypes": [".png", ".jpeg", ".jpg"]}'>Bukti
									telah bergabung dalam grup Telegram YBB<small class="text-danger">*</small></label>

								<input class="form-control form-control-sm" type="file" id="joinedTelegram"
									name="upload_telegram" accept="image/*" required>
								<small class="text-secondary">Unggah jpg, png, or jpeg file</small>
							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label for="sharedInstagram" class="js-file-attach form-label"
									data-hs-file-attach-options='{"textTarget": "[for=\"customFile\"]", "allowTypes": [".png", ".jpeg", ".jpg"]}'>Bukti
									telah membagikan informasi via status instagram atau postingan instagram <small
										class="text-danger">*</small></label>

								<input class="form-control form-control-sm" type="file" id="sharedInstagram"
									name="upload_story" accept="image/*" required>
								<small class="text-secondary">Unggah jpg, png, or jpeg file</small>
							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label for="taggedFriends" class="js-file-attach form-label"
									data-hs-file-attach-options='{"textTarget": "[for=\"customFile\"]", "allowTypes": [".png", ".jpeg", ".jpg"]}'>Bukti
									telah menandai 5 teman pada postingan instagram <small
										class="text-danger">*</small></label>

								<input class="form-control form-control-sm" type="file" id="taggedFriends"
									name="upload_tags" accept="image/*" required>
								<small class="text-secondary">Unggah jpg, png, or jpeg file</small>
							</div>

							<div class="mb-3 pb-4 border-bottom">

								<label for="twibbonUpload" class="js-file-attach form-label"
									data-hs-file-attach-options='{"textTarget": "[for=\"customFile\"]", "allowTypes": [".png", ".jpeg", ".jpg"]}'>Bukti
									telah memposting Twibbon<small
										class="text-danger">*</small></label>

								<input class="form-control form-control-sm" type="file" id="twibbonUpload"
									name="upload_twibbon" accept="image/*" required>
								<small class="text-secondary">Unggah jpg, png, or jpeg file</small>
							</div>

							<div class="border-top d-flex justify-content-between pt-5">

								<button type="button" class="btn btn-primary btn-sm" onclick="scholarFormPrev(5,4)"><i
										class="bi bi-caret-left"></i>

									Sebelumnya</button>

								<button type="submit" class="btn btn-primary btn-sm">Kirimkan pendaftaran <i
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
