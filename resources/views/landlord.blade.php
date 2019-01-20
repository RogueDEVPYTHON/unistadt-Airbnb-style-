@extends('layouts.master')
@section('after_style')
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
<link rel="stylesheet" type="text/css" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<style>
    .dropzone {
        background: white;
        border-radius: 5px;
        border: 2px dashed rgb(0, 135, 247);
        border-image: none;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }
</style>
@endsection
@section('content')
<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/contact_background.jpg"></div>
		<div class="home_content">
		</div>
	</div>

	<!-- Contact -->

	<div class="contact_form_section">
		<div class="container">
			<div class="row">
				<div class="col">

					<!-- Contact Form -->
					<div class="contact_form_container">
						<div class="contact_title text-center">Upload your Item</div>
                        <div class="contact_title text-center"><p style="color:white">Help us understand you better and we will guide you to listing your item(s) in no time!</p></div>
                        
                        <SECTION>
                            <DIV id="dropzone">
                                <FORM class="dropzone needsclick" id="demo-upload" action="{{ url('/upload') }}">
                                @csrf
                                    <DIV class="dz-message needsclick">    
                                        Drop files here or click to upload.<BR>
                                        <SPAN class="note needsclick">(This is just a demo dropzone. Selected 
                                        files are <STRONG>not</STRONG> actually uploaded.)</SPAN>
                                    </DIV>
                                </FORM>
                            </DIV>
                        </SECTION>
                        <style>
                            .label-info {
                                background-color: #5bc0de;
                            }

                            .label {
                                float:left;
                                display: inline;
                                padding: .2em .6em .3em;
                                font-size: 10px;
                                font-weight: 700;
                                line-height: 1;
                                color: #fff;
                                text-align: center;
                                white-space: nowrap;
                                vertical-align: baseline;
                                border-radius: .25em;
                            }
                            .bootstrap-tagsinput {
                                width:100%;
                                margin-top: 11px;
                                border-radius:0px;
                                border: none;
                                background: transparent;
                                border-bottom: solid 2px #e1e1e1;
                            }
                        </style>
						<form action="{{ url('insert_description') }}" id="contact_form" class="contact_form text-center" method="POST">
                            @csrf
							<input type="text" id="contact_form_subject1" class="contact_form_subject input_field" placeholder="What do you want your headline to say? (68 Characters Max.)" required="required" data-error="Headline is required." name="headline">
							<textarea id="contact_form_message" class="text_field contact_form_message" name="description" rows="4" placeholder="Describe your item (7000 Characters Max.)" required="required" data-error="Please, write us a message."></textarea>
                            <input type="text" id="contact_form_subject2" class="contact_form_subject input_field" placeholder="Address" required="required" data-error="Address is required." name="address">
                            <input type="text" name="tags" value="" data-role="tagsinput" class="contact_form_subject input_field" placeholder="Insert Tags"/>
							<button type="submit" id="form_submit_button" class="form_submit_button button trans_200">Submit<span></span><span></span><span></span></button>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>


	<!-- Footer -->
@endsection
@section('after_script')
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/contact_custom.js"></script>
<script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
<script>
    var dropzone = new Dropzone('#demo-upload', {
        previewTemplate: document.querySelector('#preview-template').innerHTML,
        parallelUploads: 2,
        thumbnailHeight: 120,
        thumbnailWidth: 120,
        maxFilesize: 3,
        filesizeBase: 1000,
        thumbnail: function(file, dataUrl) {
            if (file.previewElement) {
            file.previewElement.classList.remove("dz-file-preview");
            var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
            for (var i = 0; i < images.length; i++) {
                var thumbnailElement = images[i];
                thumbnailElement.alt = file.name;
                thumbnailElement.src = dataUrl;
            }
            setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 1);
            }
        }

        });


        // Now fake the file upload, since GitHub does not handle file uploads
        // and returns a 404

        var minSteps = 6,
            maxSteps = 60,
            timeBetweenSteps = 100,
            bytesPerStep = 100000;

        dropzone.uploadFiles = function(files) {
        var self = this;

        for (var i = 0; i < files.length; i++) {

            var file = files[i];
            totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

            for (var step = 0; step < totalSteps; step++) {
            var duration = timeBetweenSteps * (step + 1);
            setTimeout(function(file, totalSteps, step) {
                return function() {
                file.upload = {
                    progress: 100 * (step + 1) / totalSteps,
                    total: file.size,
                    bytesSent: (step + 1) * file.size / totalSteps
                };

                self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
                if (file.upload.progress == 100) {
                    file.status = Dropzone.SUCCESS;
                    self.emit("success", file, 'success', null);
                    self.emit("complete", file);
                    self.processQueue();
                    //document.getElementsByClassName("dz-success-mark").style.opacity = "1";
                }
                };
            }(file, totalSteps, step), duration);
            }
        }
        }
</script>
@endsection