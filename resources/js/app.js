import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

if (document.querySelector("#dropzone")) {
    const dropzone = new Dropzone("#dropzone", {
        dictDefaultMessage: "Drop files here to upload",
        acceptedFiles: ".jpg,.png,.jpeg,.gif",
        addRemoveLinks: true,
        dictRemoveFile: "Remove",
        maxFilesize: 1,
        uploadMultiple: false,

        init: function () {
            if (document.querySelector('[name="image"]').value.trim()) {
                const publishImage = {};
                publishImage.size = 1234;
                publishImage.name =
                    document.querySelector('[name="image"]').value;

                this.options.addedfile.call(this, publishImage);
                this.options.thumbnail.call(
                    this,
                    publishImage,
                    `/uploads/${publishImage.name}`
                );

                publishImage.previewElement.classList.add(
                    "dz-success dz-complete"
                );
            }
        },
    });

    dropzone.on("success", function (file, response) {
        document.querySelector('[name="image"]').value = response.image;
    });

    dropzone.on("removedfile", function () {
        document.querySelector('[name="image"]').value = "";
    });
}
