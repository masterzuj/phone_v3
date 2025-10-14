<?php session_start(); ?>
<meta charset="UTF-8">

<script src="jquery-3.7.1.js"></script>

<div id="dropzone" style="width: 430px; height: 100px; border: 2px dashed #ccc; text-align: center; line-height: 50px;">
    Drop advertisement image files here or click to upload
</div>

<input type="file" id="text_input" style="display: none;">
<div id="werbung_container">
		<?php
		if (isset($_SESSION['uploaded_image_path'])) {
            $imgPath = htmlspecialchars($_SESSION['uploaded_image_path'], ENT_QUOTES, 'UTF-8');
            echo "<div id='out'><img src='./img/$imgPath' style='max-width:450px;max-height:100%;'/></div>";
        }
		?>
</div>
<script>

$(document).ready(function() {
    $("#dropzone").on("click", function() {
        $("#text_input").trigger("click");
    });

    // Enable dragover and drop events
    $("#dropzone").on("dragover", function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).css("border-color", "#333");
    });

    $("#dropzone").on("dragleave", function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).css("border-color", "#ccc");
    });

    $("#dropzone").on("drop", function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).css("border-color", "#ccc");
        var files = e.originalEvent.dataTransfer.files;
        if (files.length > 0) {
            handleFile(files[0]);
        }
    });

    $("#text_input").on("change", function() {
        var file = this.files[0];
        if (file) {
            handleFile(file);
        }
    });

    function handleFile(file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            if (file.type.startsWith("image/")) {
                $("#werbung_container").prepend("<div id='out'><img src='" + e.target.result + "' style='max-width:100%;max-height:200px;'/></div>");

                // Prepare the FormData object for AJAX upload
                if (file.size > 5 * 1024 * 1024) {
                    alert("Das Bild ist größer als 5 MB und kann nicht hochgeladen werden.");
                    return;
                }
                var formData = new FormData();
                formData.append("image", file);

                $.ajax({
                    url: "upload.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log("Upload success:", response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Upload failed:", textStatus, errorThrown);
                    }
                });

            } else {
                //$("#werbung_container").prepend("<div id='out'>" + e.target.result + "</div>");
            }
        };
        if (file.type.startsWith("image/")) {
            reader.readAsDataURL(file);
        } else {
           // reader.readAsText(file);
        }
    }
});


</script>



