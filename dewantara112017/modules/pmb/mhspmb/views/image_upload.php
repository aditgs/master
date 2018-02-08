<!DOCTYPE html>
<html>
<head>
	<title>Belajar Upload Image</title>
	<style type="text/css">
		::selection { background-color: #E13300; color: white; }
            ::-moz-selection { background-color: #E13300; color: white; }

            body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
            }            

            #body {
                margin: 0 15px 0 15px;
            }

            #container {
                margin: 10px;
                border: 1px solid #D0D0D0;
                box-shadow: 0 0 8px #D0D0D0;
            }

            .error {
                color: #E13300;
            }

            .success {
                color: darkgreen;
            }
	</style>
</head>
<body>

	<div id="container">
		<h1>belajar Upload Image</h1>

		<div id="body">
			<p>Pilih file untuk di resize</p>
			<?php
			if (isset($success) && strlen($success)) {
				echo '<div class="success">';
				echo '<p>' . $success . '</p>';
				echo '</div>';
			}
			if (isset($errors) && strlen($errors)) {
				echo '<div class="error">';
				echo '<p>' . $errors . '</p>';
				echo '</div>';
			}
			if (validation_errors()) {
                    echo validation_errors('<div class="error">', '</div>');
                }
                if (isset($resize_img)) {
                    echo img($resize_img);
                }
                ?>
                <?php
                $attributes = array('name' => 'image_upload_form', 'id' => 'image_upload_form');
                echo form_open_multipart($this->uri->uri_string(), $attributes);
                ?>
                <img id="blah" alt="your image" width="150" height="150" />

                <p><input name="image_name" id="image_name" readonly="readonly" type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" /></p>
                <p><input name="image_upload" value="Upload Image" type="submit" /></p>
                <?php
                echo form_close();
                ?>
			
		</div>
		
	</div>

</body>
</html>